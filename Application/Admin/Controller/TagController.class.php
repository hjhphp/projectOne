<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 栏目管理
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class TagController extends AuthController{
	
	public function index(){
		$this->assign("tag","active open");
		$this->assign("tagadd","class='active'");
		$this->display();
	}
	
	public function tagAdd(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Tag')->addH())
				$data = array("error"=>0,"msg"=>"添加栏目完成!");
			else
				$data = array("error"=>1,"msg"=>"添加栏目时发生错误!");			
		}
		$this->ajaxReturn($data);		
	}
	
	public function tagList(){
		$this->assign("tag","active open");
		$this->assign("taglist","class='active'");
		$Tag	= M('tag'); 
		$count	= $Tag->count();
		$this->assign("num",$count);
		$Page	= new \Think\Page($count,15);
		$show	= $Page->show();
		$list	= $Tag->order('t_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function tagEdit(){
		$this->assign("list","active open");
		$this->assign("taglist","class='active'");
		$info = M('tag')->where(array("t_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display('index');
		}
	}
	
	public function tagEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Tag')->editH())
				$data = array("error"=>0,"msg"=>"修改说说完成!");
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误!");			
		}
		$this->ajaxReturn($data);			
	}
	
	public function tagDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('tag')->where(array("t_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
	
}
