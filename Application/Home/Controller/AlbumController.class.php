<?php
namespace Home\Controller;
use Think\Controller;
/**
* 前端相册
* @date: 2015年10月31日
* @author: Administrator
* @return:
*/
class AlbumController extends CommonController {
    
	public function index(){
	    $this->assign('album','active');  
	    $count = M('album')->where('al_view = 1')->count();
	    $this->assign('count',$count);
	    $Page  = new \Think\PageHome($count,5);
	    $show  = $Page->show();
	    $album = M('album')->where('al_view = 1')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $this->assign('albumList',$album);
	    $this->assign('page',$show);
	    $this->display();
	}
	  	 
		 
	public function _before_look(){
        $id = I('get.id');
        if(!M('album')->where(array("al_id"=>$id))->where("al_view != 0")->find()){
			$this->error("不存在或者不显示的相册!");	
		}
    }
     
	public function look(){
	    $this->assign('album','active');
		$id = I('get.id');
		if(!$albums=S("albums".$id)){
	    	$albums = M('album')->where(array('al_id'=>$id))->find();
			setS("albums".$id,$albums);
		}
	    $this->albums = $albums;
		if(!$pictureList=S('pictureList'.$id)){
	    	$pictureList= M('picture')->where(array('p_pid'=>$id))->select();
			setS("pictureList".$id,$pictureList);
		}
	    $this->assign('pictureList',$pictureList);
		if(!$al_content=S("al_content".$id)){
			$al_content = M('album_c')->where(array("alc_pid"=>$id))->where("alc_rtime >0")->select();
			$newIp = new \Org\Util\IP();
            for ($i=0; $i < count($al_content); $i++) {
              $al_content[$i]['ip'] = getIp($al_content[$i]['alc_ip'],$newIp);
            }
			setS("al_content".$id,$al_content);
		}
	    $this->assign('al_content',$al_content);
	    $this->display();
	  }
	  
    public function addAlbumContent(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(check_verify(I('post.txt_check')) == false){
        		$this->ajaxReturn(array("att"=>1,"msg"=>"验证码错误！"));
        	}
			// 判断是否是QQ登陆
			if($_SESSION['nickimg']){
				$data = array(
					'alc_pid'		=>	I('post.alc_pid'),
					'alc_name'		=>	I('post.alc_name'),
					'alc_email'		=>	I('post.alc_email'),
					'alc_url'		=>	I('post.alc_url'),
					'alc_content'	=>	I('post.alc_content'),
					'alc_img'		=>	session('nickimg'),
					'alc_ip'		=>	get_client_ip(),
					'alc_time'		=>	time(),
					'alc_from'		=>	getOs(),	
				);
				$static = M('album_c')->add($data);
			}else{
				$static = D('Admin/AlbumC')->addH();
			}
			
			if(I('post.send')=='on'){
				$content = "
				<div style='background-color:#d0d0d0;text-align:center;padding:40px;'>
				<div class='mmsgLetter' style='width:580px;margin:0 auto;padding:10px;color:#333;background-color:#fff;border:0px solid #aaa;border-radius:5px;-webkit-box-shadow:3px 3px 10px #999;-moz-box-shadow:3px 3px 10px #999;box-shadow:3px 3px 10px #999;font-family:Verdana, sans-serif; '>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				<div class='mmsgLetterContent' style='text-align:left;padding:30px;font-size:14px;line-height:1.5;background:url(".C('SITE_URL')."/Public/Img/email/mark.png) no-repeat top right;'>
				<div>
				<p>亲爱的管理员，你好!</p>
				<p>您".C('NAME')."的相册：《".I('post.alname')."》有新的评论</p>
				<p> 用户 [ <a> ".I('post.alc_name')." </a> ] <small> ( ".I('post.alc_email')." ) </smaill>给您评论到：</p>
				<p style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'><a href='".C('SITE_URL')."/album-".I('post.alc_pid')."' target='_blank'>".reFace(I('post.alc_content'))."</a></p>
				<p>此邮件为系统自动发出，请勿直接回复</p>
				</div>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				</div></div></div>";				
				sendEmail(C('MAIL_USERNAME'),'您的'.C("NAME").'上的相册有了新的评论',$content);
			}
			if(I('post.rember')=='on'){
				cookie('name',I('post.alc_name'),3600); 
				cookie('email',I('post.alc_email'),3600); 
				cookie('url',I('post.alc_url'),3600); 
			}
			if($static)
				$data = array("error"=>0,"msg"=>"评论完成!");
			else
				$data = array("error"=>1,"msg"=>"评论时发生错误!");			
		}		
		$this->ajaxReturn($data);	
    } 
}
?>