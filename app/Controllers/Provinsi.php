<?php

namespace App\Controllers;

use App\Models\ProvinsiModel;

class Provinsi extends BaseController
{
    protected $provinsi;
    public function __construct()
    {
        $this->provinsi = new ProvinsiModel();
    }
    public function index()
    {    
        $p = $this->provinsi->findAll();
        $data = ['p' => $p] ;
        return view('provinsi',$data);
    }

    public function tambah()
    {
        $this->provinsi->save([
            'nama' => $this->request->getVar('nama_provinsi'),
        ]);
        return redirect()->to('/provinsi');
    }

    public function cari()
    {   
        $keyword=$this->request->getVar('keyword');
        $p = $this->provinsi->cari($keyword);
        $data = [
            'p' => $p,
            ] ;
        return view('provinsi',$data);
    }
}
