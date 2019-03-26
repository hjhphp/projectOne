<?php
namespace Home\Controller;
use Think\Controller;
class GustController extends CommonController {
    public function index(){    
	    $this->assign('gust','active');
        $count = M('gust')->where('g_rtime > 0')->count();
        $Page  = new \Think\PageHome($count,5);
        $Page->url = 'gust';
        $show  = $Page->show();
        $content = M('gust')->where('g_rtime > 0')->order('g_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $newIp = new \Org\Util\IP();
        for ($i=0; $i < count($content); $i++) {
          $content[$i]['ip'] = getIp($content[$i]['g_ip'],$newIp);
        }
        $this->assign('contents',$content);
        $this->assign('page',$show);
        $this->display();
    }
          
    public function addContent(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(check_verify(I('post.txt_check')) == false){
        		$this->ajaxReturn(array("att"=>1,"msg"=>"验证码错误！"));
        	}
			// 判断是否是QQ登陆
			if($_SESSION['nickimg']){
				$data = array(
					'g_name'	=>	I('post.g_name'),
					'g_email'	=>	I('post.g_email'),
					'g_url'		=>	I('post.g_url'),
					'g_content'	=>	I('post.g_content'),
					'g_img'		=>	session('nickimg'),
					'g_ip'		=>	get_client_ip(),
					'g_time'	=>	time(),
					'g_from'	=>	getOs(),	
				);
				$static = M('gust')->add($data);
			}else{
				$static = D('Admin/Gust')->addH();
			}
			
			if(I('post.send')=='on'){
				$content = "
				<div style='background-color:#d0d0d0;text-align:center;padding:40px;'>
				<div class='mmsgLetter' style='width:580px;margin:0 auto;padding:10px;color:#333;background-color:#fff;border:0px solid #aaa;border-radius:5px;-webkit-box-shadow:3px 3px 10px #999;-moz-box-shadow:3px 3px 10px #999;box-shadow:3px 3px 10px #999;font-family:Verdana, sans-serif; '>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				<div class='mmsgLetterContent' style='text-align:left;padding:30px;font-size:14px;line-height:1.5;background:url(".C('SITE_URL')."/Public/Img/email/mark.png) no-repeat top right;'>
				<div>
				<p>亲爱的管理员，你好!</p>
				<p>您".C('NAME')."有新的留言</p>
				<p> 用户 [ <a> ".I('post.g_name')." </a> ] <small> ( ".I('post.g_email')." ) </smaill>给您评论到：</p>
				<p style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'><a href='".C('SITE_URL')."/gust' target='_blank'>".reFace(I('post.g_content'))."</a></p>
				<p>此邮件为系统自动发出，请勿直接回复</p>
				</div>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				</div></div></div>";				
				sendEmail(C('MAIL_USERNAME'),'您的'.C("NAME").'上的有了新的留言',$content);
			}
			
			if(I('post.rember')=='on'){
				cookie('name',I('post.g_name'),3600); 
				cookie('email',I('post.g_email'),3600); 
				cookie('url',I('post.g_url'),3600); 
			}
			if($static)
				$data = array("error"=>0,"msg"=>"评论完成!");
			else
				$data = array("error"=>1,"msg"=>"评论时发生错误!");			
		}		
		$this->ajaxReturn($data);	
    }
}