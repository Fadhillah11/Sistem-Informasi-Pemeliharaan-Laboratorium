<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $user = [
        'username'     => 'required',
        'password'     => 'required',
        'nama'     => 'required',
        'jabatan'     => 'required',
        'no_tlp'     => 'required',
        'alamat'     => 'required',
        'jenis_kelamin'     => 'required',
        'status'     => 'required'
    ];
    public $user_errors = [
        'username' => [
            'required'    => ' username wajib diisi.',
        ],
        'password'    => [
            'required' => 'password wajib diisi.'
        ],
        'nama'    => [
            'required' => 'nama wajib diisi.'
        ],
        'jabatan'    => [
            'required' => 'jabatan wajib diisi.'
        ],
        'no_tlp'    => [
            'required' => 'no_tlp wajib diisi.'
        ],
        'alamat'    => [
            'required' => 'alamat wajib diisi.'
        ],
        'password'    => [
            'required' => 'password wajib diisi.'
        ],
        'jenis_kelamin'    => [
            'required' => 'jenis_kelamin wajib diisi.'
        ],
        'status'    => [
            'required' => 'status wajib diisi.'
        ]
    ];
    public $lab = [
        'nama_lab'     => 'required',
        'kapro'     => 'required'
    ];
    public $lab_errors = [
        'nama_lab' => [
            'required'    => ' nama lab wajib diisi.',
        ],
        'kapro'    => [
            'required' => 'wajib diisi.'
        ]
    ];
    public $komputer = [
        'label'     => 'required',
        'tahun'     => 'required'
    ];
    public $komputer_errors = [
        'label' => [
            'required'    => 'label wajib diisi.',
        ],
       
        'tahun'    => [
            'required' => 'tahun wajib diisi.'
        ]
    ];
}