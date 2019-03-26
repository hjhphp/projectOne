<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 后台登陆权限验证
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class AuthController extends Controller{
	public function _initialize(){
		if(!session("uid")){
			$this->redirect("/Login/index");
		}
	}
}
