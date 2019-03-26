<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 链接管理
* @date: 2015年10月24日
* @author: Administrator
* @return:
*/
class LinkController extends AuthController{

	public function index(){
		$this->assign("link","active open");
		$this->assign("linkadd","class='active'");
		$this->display();
	}
	
	public function linkAdd(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$tmp = D('Link')->addH();
			if(is_array($tmp))
				$data = array("error"=>1,"msg"=>"链接名已存在!");
			elseif($tmp)
				$data = array("error"=>0,"msg"=>"添加用户完成!");
			else
				$data = array("error"=>1,"msg"=>"添加时发生错误!");			
		}
		$this->ajaxReturn($data);	
	}	

	public function linkList(){
		$this->assign("link","active open");
		$this->assign("linklist","class='active'");
		$Link	= M('link'); 
		$count	= $Link->count();
		$this->assign("num",$count);
		$Page	= new \Think\Page($count,5);
		$show	= $Page->show();
		$list	= $Link->order('l_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('List',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function linkEdit(){
		$this->assign("link","active open");
		$this->assign("linklist","class='active'");
		$info = M('link')->where(array("l_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display('index');
		}
	}
	
	public function linkEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(I('post.send')==1){
				$title = "您申请的友情链接有了新的回复";
				$content = "<div style='background-color:#d0d0d0;text-align:center;padding:40px;'>
						<div class='mmsgLetter' style='width:580px;margin:0 auto;padding:10px;color:#333;background-color:#fff;border:0px solid #aaa;border-radius:5px;-webkit-box-shadow:3px 3px 10px #999;-moz-box-shadow:3px 3px 10px #999;box-shadow:3px 3px 10px #999;font-family:Verdana, sans-serif; '>
						<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
						<div class='mmsgLetterContent' style='text-align:left;padding:30px;font-size:14px;line-height:1.5;background:url(".C('SITE_URL')."/Public/Img/email/mark.png) no-repeat top right;'>
						<div>
						<p>你好!</p>
						<p>感谢你对".C('SITE')."的支持。 <br>你申请的友情链接为：[".I('post.l_name')."]。".C('SITE')."给你回复到：</p>
						<p  style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'>".I('post.l_rcontent')."</p>
						<p><small stylle='color:#333'>以上内容为系统自动发出，请勿直接回复。谢谢</small></p>
						</div>	
						<div class='mmsgLetterInscribe' style='padding:40px 0 0;'>
							<img class='mmsgAvatar' src='".C('SITE_URL')."/Public/Img/icon/admin.jpg' style='float: left; width: 48px; height:48px;'  diffpixels='32px'>
						<div class='mmsgSender' style='margin:0 0 0 54px;'>
							<p class='mmsgName' style='margin:0 0 10px;'>".C('AUTHOR')."</p>
							<p class='mmsgInfo' style='font-size:12px;margin:0;line-height:1.2;'>".C('NAME')."博主</p>
						</div>
						</div>
						</div>
						<div class='mmsgLetterbottom' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'>
						</div>
						</div>
						</div>";
				$email = I('post.l_email');
				sendEmail($email,$title,$content);
			}
			if(D('link')->editH())
				$data = array("error"=>0,"msg"=>"修改链接完成!");
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误!");			
		}
		$this->ajaxReturn($data);			
	}
	
	public function linkDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('link')->where(array("l_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
}