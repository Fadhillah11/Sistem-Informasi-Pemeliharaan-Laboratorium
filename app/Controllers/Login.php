<?php
namespace App\Controllers;
use App\Models\Login_model;
use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $user = new Login_model();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $dataUser = $user->where('username', $username)->first();

        if ($dataUser && $dataUser->password == $password && $dataUser->status == 'active') {
            session()->set([
                'username' => $dataUser->username,
                'id_user' => $dataUser->id_user,
                'nama' => $dataUser->nama,
                'jabatan' => $dataUser->jabatan,
                'logged_in' => TRUE
            ]);

            if ($dataUser->jabatan == "KALAB") {
                return redirect()->to(base_url('home/index_kalab'));
            } else if ($dataUser->jabatan == "KAPRO") {
                return redirect()->to(base_url('home/index_kapro'));
            } else {
                return redirect()->to(base_url('home/index_petugas'));
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    // FORM LUPA PASSWORD
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    // PROSES MENGIRIM TOKEN
    public function processForgotPassword()
    {
        $username = $this->request->getPost('username');
        $userModel = new Login_model();
        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }

        // Generate token reset
        $token = bin2hex(random_bytes(16));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token berlaku 1 jam

        // Simpan token ke database
        $userModel->update($user->username, [
            'reset_token' => $token,
            'token_expiry' => $expiry
        ]);

        // Tampilkan token kepada pengguna
        return redirect()->to('/login/showToken')->with('token', $token);
    }

    // HALAMAN UNTUK MENAMPILKAN TOKEN
    public function showToken()
    {
        return view('auth/show_token');
    }

    // FORM RESET PASSWORD
    public function resetPassword($token)
    {
        $userModel = new Login_model();
        $user = $userModel->where('reset_token', $token)
                          ->where('token_expiry >=', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            return redirect()->to('/login/forgotPassword')->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    // PROSES RESET PASSWORD
    public function processResetPassword()
    {
        $token = $this->request->getPost('token');
        $newPassword = trim($this->request->getPost('new_password'));  // Mengambil password yang sesuai dengan name di form
        $confirmPassword = trim($this->request->getPost('confirm_password'));  // Mengambil confirm password
        
        if (empty($newPassword)) {
            echo "⚠️ Password yang dimasukkan kosong!<br>";
            exit();
        }
        
        // Cek apakah password dan konfirmasi password cocok
        if ($newPassword !== $confirmPassword) {
            echo "⚠️ Password dan konfirmasi password tidak cocok!<br>";
            exit();
        }
        
        $hashedPassword = md5($newPassword);  // Hash dengan MD5
        
        $userModel = new Login_model();
        $user = $userModel->where('reset_token', $token)
                          ->where('token_expiry >=', date('Y-m-d H:i:s'))
                          ->first();
        
        if (!$user) {
            echo "⚠️ Token tidak valid atau sudah kedaluwarsa!<br>";
            exit();
        }
        
        // Debugging sebelum update
        echo "✅ Password Baru (Plain): " . $newPassword . "<br>";
        echo "✅ Password Baru (MD5): " . $hashedPassword . "<br>";
        
        // Update password dan hapus token
        $userModel->update($user->username, [
            'password' => $hashedPassword,
            'reset_token' => null,
            'token_expiry' => null
        ]);
        
        // Debug setelah update
        $updatedUser = $userModel->where('username', $user->username)->first();
        echo "✅ Password di Database Setelah Update: " . $updatedUser->password . "<br>";
    
        // Setelah password diubah, arahkan pengguna ke halaman login dengan pesan sukses
        session()->setFlashdata('success', 'Password berhasil direset. Silakan login dengan password baru.');
        return redirect()->to('/login');  // Redirect ke halaman login
    }
    
}