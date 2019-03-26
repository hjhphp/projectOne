<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 图片管理函数
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class PictureController extends AuthController{

	public function index(){
		$this->album = M('album')->where(array("al_view"=>1))->select();
		$this->assign("picture","active open");
		$this->assign("pictureadd","class='active'");
		$this->display();
	}
	
	public function pictureAdd(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Picture')->addH())
				$data = array("error"=>0,"msg"=>"添加图片完成!");
			else
				$data = array("error"=>1,"msg"=>"添加时发生错误!");			
		}
		$this->ajaxReturn($data);	
	}
	
	public function pictureList(){
		$this->assign("picture","active open");
		$this->assign("picturelist","class='active'");
		$this->List = M('picture')->select();
		$this->display();
	}
	
	public function pictureEdit(){
		$this->assign("picture","active open");
		$this->assign("picturelist","class='active'");	
		$this->album = M('album')->where(array("al_view"=>1))->select();
		$info = M('picture')->where(array("p_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display('index');
		}	
	}
	
	public function pictureEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$url = M('picture')->field("p_img,p_thumb")->where(array("p_id"=>I('post.p_id')))->find();
			unlink('.'.$url['p_img']);
			unlink('.'.$url['p_thumb']);
			if(D('picture')->editH())
				$data = array("error"=>0,"msg"=>"修改图片完成!");
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误!");			
		}
		$this->ajaxReturn($data);			
	}
	
	public function pictureDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$url = M('picture')->field("p_img,p_thumb")->where(array("p_id"=>I('post.id')))->find();
			unlink('.'.$url['p_img']);
			unlink('.'.$url['p_thumb']);
			if(M('picture')->where(array("p_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
}