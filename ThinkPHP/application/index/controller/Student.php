<?php
namespace app\index\controller;

use think\Controller;

class Student extends Controller
{
    public function index()
    {
        return $this->fetch('index');
        // return $this->fetch('login');
    }

    public function test()
    {
        return 'test';
        // return $this->fetch('index');
        // return $this->fetch('login');
    }

    

}
