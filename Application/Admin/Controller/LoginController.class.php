<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 登陆
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class LoginController extends Controller{
	
	public function index(){
		$this->display();
	}
	
	public function in(){
		$info = D('User')->in(I('post.user'),I('post.password'));
		if($info)
			$this->ajaxReturn(array("error"=>0,"msg"=>session("uname")));
		else
			$this->ajaxReturn(array("error"=>1,"msg"=>"用户名或者密码错误!"));
	}
}
