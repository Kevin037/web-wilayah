<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $table = 'kabupaten';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama','jumlah_penduduk','provinsi_id'];

    public function getkabupaten(){
        return $this->db->table('kabupaten')
        ->join('provinsi','provinsi.id = kabupaten.provinsi_id')
        ->get()->getResultArray();
    }

    public function cari($keyword){
        return $this->table('kabupaten')
        ->like('nama',$keyword)
        ->join('provinsi','provinsi.id = kabupaten.provinsi_id')
        ->get()->getResultArray();
    }

    public function filter($id){
        return $this->table('kabupaten')
        ->where('provinsi_id',$id)
        ->join('provinsi','provinsi.id = kabupaten.provinsi_id')
        ->get()->getResultArray();
    }

    public function provinsi_rekap(){
        return $this->table('kabupaten')
        ->join('provinsi','provinsi.id = kabupaten.provinsi_id')
        ->select('kabupaten.*,provinsi.*,SUM(jumlah_penduduk) as total')
        ->groupby('provinsi_id')
        ->get()->getResultArray();
    }
}