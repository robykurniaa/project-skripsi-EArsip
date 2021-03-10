<?php

namespace App\Controllers;

use App\Models\Model_user;

class User extends BaseController
{
    public function __construct()
    {
        $this->Model_user = new Model_user();
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
}