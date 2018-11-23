<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
        // return $this->fetch('login');
    }

    public function login()
    {
        return $this->fetch('login');
        
    }

    public function test()
    {
        return 'test';
        
    }



}
