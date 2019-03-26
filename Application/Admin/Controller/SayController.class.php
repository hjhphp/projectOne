<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 说说管理
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class SayController extends AuthController{
	
	public function index(){
		$this->assign("add","active open");
		$this->assign("say","class='active'");
		$this->display();
	}
	
	public function sayAdd(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Say')->addH())
				$data = array("error"=>0,"msg"=>"添加说说完成!");
			else
				$data = array("error"=>1,"msg"=>"添加时发生错误!");			
		}
		$this->ajaxReturn($data);		
	}
	
	public function sayList(){
		$this->assign("list","active open");
		$this->assign("saylist","class='active'");
		$Say	= M('Say'); 
		$count	= $Say->count();
		$this->assign("num",$count);
		$Page	= new \Think\Page($count,15);
		$show	= $Page->show();
		$list	= $Say->order('s_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('List',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function sayEdit(){
		$this->assign("list","active open");
		$this->assign("saylist","class='active'");
		$info = M('say')->where(array("s_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display('index');
		}
	}
	
	public function sayEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Say')->editH())
				$data = array("error"=>0,"msg"=>"修改说说完成!");
			else
				$data = array("error"=>1,"msg"=>"修改时发生错误!");			
		}
		$this->ajaxReturn($data);			
	}
	
	public function sayDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('say')->where(array("s_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
	
	//-----------------------------------------------------------------------------------------------------
	public function sayContentList(){
		$this->assign("content","active open");
		$this->assign("saycontent","class='active'");
		$Sayc	= M('Say_c'); 
		$count	= $Sayc->count();
		$this->assign("num",$count);
		$Page	= new \Think\Page($count,15);
		$show	= $Page->show();
		$list	= $Sayc->order('sc_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('List',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function sayContentEdit(){
		$this->assign("content","active open");
		$this->assign("saycontent","class='active'");
		$info = M('say_c')->where(array("sc_id"=>I('get.id')))->find();
		if(!$info)
			$this->error('参数错误!',0,0);
		else{
			$this->assign("info",$info);
			$this->display();
		}
	}
	
	public function sayContentEditH(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(D('Say_c')->editH()){
				if(I('post.send')){
			$content = "<div style='background-color:#d0d0d0;text-align:center;padding:40px;'>
			<div class='mmsgLetter' style='width:580px;margin:0 auto;padding:10px;color:#333;background-color:#fff;border:0px solid #aaa;border-radius:5px;-webkit-box-shadow:3px 3px 10px #999;-moz-box-shadow:3px 3px 10px #999;box-shadow:3px 3px 10px #999;font-family:Verdana, sans-serif; '>
			<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'>
			</div>
			<div class='mmsgLetterContent' style='text-align:left;padding:30px;font-size:14px;line-height:1.5;background:url(".C('SITE_URL')."/Public/Img/email/mark.png) no-repeat top right;'>
			<div>
				<p>".I('post.sc_name').",你好!</p>
				<p>你在".C('NAME')."上的说说留言 </p>
				<p style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'>".reFace(I('post.sc_content'))."</p>
				<p>博主给你回复到：</p>
				<p style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'><a href='".C('SITE_URL')."/feel-".I('post.sc_pid')."' target='_blank'>".reFace(I('post.sc_rcontent'))."</a></p>
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
					sendEmail(I('post.sc_email'),'您在'.C('NAME').'上的说说有了回复',$content);
				}
				$data = array("error"=>0,"msg"=>"回复说说评论完成!");}
			else
				$data = array("error"=>1,"msg"=>"回复时发生错误!");			
		}
		$this->ajaxReturn($data);			
	}
	
	public function sayContentDel(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('say_c')->where(array("sc_id"=>I('post.id')))->delete())
				$data = array("error"=>0,"msg"=>"删除完成!");
			else
				$data = array("error"=>1,"msg"=>"删除时发生错误!");
		}
		$this->ajaxReturn($data);
	}
	
}
