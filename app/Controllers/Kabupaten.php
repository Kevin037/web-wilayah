<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\ProvinsiModel;

class Kabupaten extends BaseController
{
    protected $kabupaten;
    public function __construct()
    {
        $this->kabupaten = new KabupatenModel();
        $this->provinsi = new ProvinsiModel();
    }
    public function index()
    {   
        $p = $this->provinsi->findAll();
        $data = [
            'k' => $this->kabupaten->getkabupaten(),
            'p' => $p,
            ] ;
        return view('kabupaten',$data);
    }

    public function tambah()
    {
        $this->kabupaten->save([
            'nama' => $this->request->getVar('nama_kabupaten'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'provinsi_id' => $this->request->getVar('provinsi_id')
        ]);
        return redirect()->to('/kabupaten');
    }

    public function cari()
    {   
        $keyword=$this->request->getVar('keyword');
        $k = $this->kabupaten->cari($keyword);
        $p = $this->provinsi->findAll();
        $data = [
            'k' => $k,
            'p' => $p,
            ] ;
        return view('kabupaten',$data);
    }

    public function filter($id)
    {   
        $k = $this->kabupaten->filter($id);
        $p = $this->provinsi->findAll();
        $data = [
            'k' => $k,
            'p' => $p,
            ] ;
        return view('kabupaten',$data);
    }
    public function rekap()
    {   
        $k = $this->kabupaten->provinsi_rekap();
        $p = $this->provinsi->findAll();
        $data = [
            'k' => $k,
            'p' => $p,
            ] ;
        return view('rekap',$data);
    }
}

