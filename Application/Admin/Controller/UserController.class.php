<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 用户管理函数
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class UserController extends AuthController{
	
	public function _initialize(){
		$class = session("class");	
		if($class != 1){
			$this->error("非最高管理员无法访问本模块!",0,0);
		}
	}
	
	public function userAdd(){
		$this->assign("user","active open");
		$this->assign("useradd","class='active'");
		$this->display();
	}
	
	public function userAddH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$tmp = D('User')->addH();
			if(is_array($tmp))
				$data = array("error"=>1,"msg"=>"用户名已存在!");
			elseif($tmp)
				$data = array("error"=>0,"msg"=>"添加用户完成!");
			else
				$data = array("error"=>1,"msg"=>"添加时发生错误!");			
		}
		$this->ajaxReturn($data);
	}	
	
	public function userList(){
		$this->assign("user","active open");
		$this->assign("userlist","class='active'");
		$User	= M('User'); 
		$count	= $User->count();
		$this->assign("num",$count);
		$Page	= new \Think\Page($count,10);
		$show	= $Page->show();
		$list	= $User->order('u_class')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function userEdit(){
		$this->assign("user","active open");
		$this->assign("userlist","class='active'");
		$info = M('user')->where(array("u_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display('userAdd');
		}
	}
	
	public function userEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}elseif(I('post.u_password')){
			$tmp = D('User')->editH();
			if(is_array($tmp))
				$data = array("error"=>1,"msg"=>"用户名已存在!");
			elseif($tmp)
				$data = array("error"=>0,"msg"=>"修改用户完成!");
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误!");			
		}else{
			if(M('user')->save(I('post.')))
				$data = array("error"=>0,"msg"=>"修改用户完成!");	
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误1!");		
		}
		$this->ajaxReturn($data);
	}	
	
	public function userDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('user')->where(array("u_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
}
