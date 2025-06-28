<?php echo view('petugas/_partials/header'); ?>
<?php echo view('petugas/_partials/sidebar'); ?>
<div class="content-wrapper">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border border-light">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">
                                Detail Pemeliharaan
                            </h5>
                        </div>
                        <div class="card-body">
                            <br>
                            <?php if (session()->getFlashdata('error_message')): ?>
                            <div class="alert alert-danger">
                                <?php echo session()->getFlashdata('error_message'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td><?php echo $pemeliharaan[0]['tgl'] ?? 'Data tidak tersedia'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Petugas</th>
                                            <td><?php echo $pemeliharaan[0]['nama_petugas'] ?? 'Data tidak tersedia'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Label Komputer</th>
                                            <td><?php echo $pemeliharaan[0]['label'] ?? 'Data tidak tersedia'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lab</th>
                                            <td><?php echo $pemeliharaan[0]['nama_lab'] ?? 'Data tidak tersedia'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kondisi</th>
                                            <td><?php echo $pemeliharaan[0]['hasil'] ?? 'Data tidak tersedia'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kerusakan</th>
                                            <td><?php echo $pemeliharaan[0]['kerusakan'] ?? 'Data tidak tersedia'; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread" style="background-color: #007bff; color: white;">
                                <tr>
                                    <th>Data SOP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($sop && !empty($sop)): ?>
                                <?php foreach ($sop as $sop_item): ?>
                                <tr>
                                    <td><?php echo $sop_item['nama_sop']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td>Data SOP tidak ditemukan</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('pemeliharaan/update/' . $pemeliharaan[0]['id_pemeliharaan']); ?>"
                method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Detail Pemeliharaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id_pemeliharaan"
                        value="<?php echo $pemeliharaan[0]['id_pemeliharaan']; ?>">
                    <div class="form-group">
                        <label for="hasil">Kondisi</label>
                        <select name="hasil" id="hasil" class="form-control">
                            <option value="NORMAL"
                                <?php echo ($pemeliharaan[0]['hasil'] === 'NORMAL') ? 'selected' : ''; ?>>NORMAL
                            </option>
                            <option value="PERBAIKAN"
                                <?php echo ($pemeliharaan[0]['hasil'] === 'PERBAIKAN') ? 'selected' : ''; ?>>PERBAIKAN
                            </option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kerusakan">Kerusakan</label>
                        <textarea name="kerusakan" id="kerusakan" class="form-control"
                            rows="3"><?php echo $pemeliharaan[0]['kerusakan'] ?? ''; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan library Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>