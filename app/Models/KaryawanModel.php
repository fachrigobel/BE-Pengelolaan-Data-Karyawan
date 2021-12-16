<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'karyawan';
    protected $primaryKey       = 'nip';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'alamat', 'nohp', 'role', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nip' => 'required|is_unique[karyawan.nip]',
        'nama' => 'required',
        'alamat' => 'required',
        'nohp' => 'required',
        'role' => 'required',
        'status' => 'required'
    ];
    protected $validationMessages   = [
        'nip' => [
            'required' => 'NIP Tidak Boleh Kosong!',
            'is_unique' => 'NIP Telah Digunakan!'
        ],
        'nama' => [
            'required' => 'Nama Tidak Boleh Kosong!'
        ],
        'alamat' => [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ],
        'nohp' => [
            'required' => 'Nomor HP Tidak Boleh Kosong!'
        ],
        'role' => [
            'required' => 'Role Tidak Boleh Kosong!'
        ],
        'status' => [
            'required' => 'Status Tidak Boleh Kosong!'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
