<?php

namespace App\Controllers;

class Freedelivery extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index(){
        $table = DB()->table('products');
        $data['products'] = $table->where('status','Active')->get()->getResult();

        $data['keywords'] = get_lebel_by_value_in_settings('meta_keyword');
        $data['description'] = get_lebel_by_value_in_settings('meta_description');
        $data['title'] = 'Free delivery';

        $data['page_title'] = 'Free delivery';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Home/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
}
