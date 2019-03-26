<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 版本函数
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class VersionController extends AuthController{
	
	public function index(){
		$this->now = M('version')->order('v_id desc')->find();
		$this->assign("add","active open");
		$this->assign("version","class='active'");
		$this->display();
	}
	
	public function versionAdd(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Version')->addH())
				$data = array("error"=>0,"msg"=>"添加新版本完成!");
			else
				$data = array("error"=>1,"msg"=>"添加时发生错误!");			
		}
		$this->ajaxReturn($data);		
	}
	
	public function versionList(){
		$this->assign("list","active open");
		$this->assign("versionlist","class='active'");
		$this->List = M('version')->order("v_id desc")->limit(4)->select();
		$this->display();
	}
}
