<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinsiModel extends Model
{
    protected $table = 'provinsi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama'];

    public function cari($keyword){
        return $this->table('provinsi')
        ->like('nama_provinsi',$keyword)
        ->get()->getResultArray();
    }
}