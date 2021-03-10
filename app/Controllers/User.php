<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'User',
            'isi' => 'user/v_index'

        );
        return view('layout/v_wrapper', $data);
    }
}