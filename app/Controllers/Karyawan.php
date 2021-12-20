<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Karyawan extends ResourceController
{
    protected $karyawanModel;

    use ResponseTrait;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $res = $this->karyawanModel->findAll();
        return $this->respond($res, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($nip = null)
    {

        $res = $this->karyawanModel->find($nip);
        if ($res == null) {
            return $this->failNotFound("$nip Tidak Ditemukan!");
        } else {
            return $this->respond($res, 200);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            "nip" =>  $this->request->getVar('nip'),
            "nama" => $this->request->getVar('nama'),
            "alamat" => $this->request->getVar('alamat'),
            "nohp" => $this->request->getVar('nohp'),
            "role" => $this->request->getVar('role'),
            "status" => $this->request->getVar('status')
        ];

        if ($this->karyawanModel->insert($data) === false) {
            return $this->fail($this->karyawanModel->errors());
        } else {
            return $this->respond([
                "status" => 200,
                "message" => "Data Berhasil Ditambahkan!"
            ], 200);
        }
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($nip = null)
    {
        $res = $this->karyawanModel->find($nip);
        if ($res === null) {
            return $this->failResourceGone('NIP: ' . $nip . ' Tidak Ditemukan');
        } else {
            $data = [
                "nama" => $this->request->getVar('nama'),
                "alamat" => $this->request->getVar('alamat'),
                "nohp" => $this->request->getVar('nohp'),
                "role" => $this->request->getVar('role'),
                "status" => $this->request->getVar('status')
            ];

            if ($this->karyawanModel->update($nip, $data) === false) {
                return $this->fail($this->karyawanModel->errors());
            } else {
                return $this->respond([
                    "status" => 200,
                    "message" => "Data Berhasil Diubah!"
                ], 200);
            }
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($nip = null)
    {
        $res = $this->karyawanModel->find($nip);
        if ($res === null) {
            return $this->failResourceGone('NIP: ' . $nip . ' Tidak Ditemukan');
        } else {
            $this->karyawanModel->delete($nip);
            return $this->respond([
                "status" => 200,
                "message" => "Data Berhasil Dihapus!"
            ], 200);
        }
    }

    public function groupBy($keyword = null)
    {
        $res = $this->karyawanModel
            ->groupStart()
            ->where("role", $keyword)
            ->orGroupStart()
            ->where("status", $keyword)
            ->groupEnd()
            ->groupEnd()
            ->findAll();
        return $this->respond($res, 200);
    }
}
