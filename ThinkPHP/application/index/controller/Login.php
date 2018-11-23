<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Cookie;
// use think\Validate;

class Login extends Controller
{

    public function login()
    {
        // return $this->fetch('login');

        $param = input('post.');
    	if(empty($param['userName'])){
    		
    		$this->error('用户名不能为空');
    	}
    	
    	if(empty($param['password'])){
    		
    		$this->error('密码不能为空');
    	}
    	
    	// 验证用户名
		$has = Db::table('user')->where('userName', $param['userName'])->find();
		// dump($has);

    	if(empty($has)){
    		
    		$this->error('用户名或密码错误');
    	}
    	
    	// 验证密码
    	if($has['password'] != md5($param['password'])){
    		
    		$this->error('用户名或密码错误');
		}
		

		// 记录用户登录信息
		// cookie初始化
		Cookie::init(['prefix'=>'think_','expire'=>3600,'path'=>'/']);
    	Cookie::set('userNo', $has['userNo']);  // 一个小时有效期
    	Cookie::set('userName', $has['userName']);

		$strlen = strlen($has['userName']);
		dump($has['userName']);
		dump($strlen);

		if($strlen == 7) {
			$this->redirect(url('index/index'));
		}
		else if($strlen == 12) {
			$this->redirect(url('student/index'));
		}
		else {
			$this->redirect(url('index/index'));
		}

    	// $this->redirect(url('index/index'));
        
		// return 'success';
	}

	
}
