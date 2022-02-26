<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_dep;

class User extends BaseController
{
    public function __construct()
    {
        $this->Model_user = new Model_user();
        $this->Model_dep = new Model_dep();
        helper('form');
    }
    public function index()
    {
        $data = array(
            'title' => 'User',
            'user' => $this->Model_user->all_data(),
            'isi' => 'user/v_index'

        );
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Add User',
            'dep' => $this->Model_dep->all_data(),
            'isi' => 'user/v_add'

        );
        return view('layout/v_wrapper', $data);
    }
    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => ' {field} Wajib Diisi !!!'
                ]
            ],
            'email' => [
                'label'  => 'E-mail',
                'rules'  => 'required|is_unique[tbl_user.email]|valid_email',
                'errors' => [
                    'required' => ' {field} Wajib Diisi !!!',
                    'is_unique' => ' {field} Sudah Ada, Input {field} lain !!!',
                    'valid_email' => ' Masukkan format {field} Yang benar',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required' => ' {field} Wajib Diisi !!!',
                    'min_length' => ' {field} Minimal 6 Huruf !!!',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => ' {field} Wajib Diisi !!!',
                ]
            ],
            'id_dep' => [
                'label'  => 'Departement',
                'rules'  => 'required',
                'errors' => [
                    'required' => ' {field} Wajib Diisi !!!',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => ' {field} Wajib Diisi !!!',
                    'max_size' => ' Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => ' Format {field} Wajib PNG,JPG,JPEG !!!',
                ]
            ]

        ])) {
            //ambil file foto
            $foto = $this->request->getfile('foto');
            //random nama file foto
            $nama_file = $foto->getRandomName();
            // jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => md5($this->request->getPost('password')),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $nama_file,

            );

            $foto->move('foto', $nama_file); //dir file
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }
}