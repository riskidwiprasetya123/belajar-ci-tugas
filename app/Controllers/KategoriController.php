<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class KategoriController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data['category'] = $this->category->findAll();
        return view('v_kategori', $data);
    }

    public function create()
    {
        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->category->insert($dataForm);
        return redirect()->to('kategori')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
    $dataKategori = $this->category->find($id);
    
    if (!$dataKategori) {
        return redirect()->to('kategori')->with('failed', 'Data tidak ditemukan');
    }

    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'updated_at' => date("Y-m-d H:i:s")
    ];

    $this->category->update($id, $dataForm);

    return redirect()->to('kategori')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {

    $dataKategori = $this->category->find($id);

    if (!$dataKategori) {
        return redirect()->to('kategori')->with('failed', 'Data tidak ditemukan');
    }

    $this->category->delete($id);

    return redirect()->to('kategori')->with('success', 'Data Berhasil Dihapus');
    }
}
