<?php
namespace Home\Controller;
use Think\Controller;
/**
* 前端说说管理
* @date: 2015年10月31日
* @author: Administrator
* @return:
*/
class FeelController extends CommonController {
	
    public function index(){    
		$this->assign('feel','active');  
		$tmp =  M('say');    
        $count = $tmp->where('s_view = 1')->count();
        $Page  = new \Think\PageHome($count,8);
        $Page->url = 'feel/page';
        $show  = $Page->show();
        $say = $tmp->where('s_view = 1')->order('s_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('say',$say);
        $this->assign('page',$show);
        $this->display();
    }
	
	public function  _before_info(){
        $id = I('get.id');
        if(!M('say')->where(array("s_id"=>$id))->where("s_view != 0")->find()){
			$this->error("不存在或者不显示的说说!");	
		}
    }
	
	public function info(){
		$this->assign('feel','active');
	    $id = I('get.id');
		$tmp = M('say');
		if(!$sayinfo = S("say_".$id)){
			$sayinfo = $tmp->where(array('s_id'=>$id,"s_view"=>1))->find();			
			setS("say_".$id,$sayinfo);			
		}
		if(!$saycommon = S("saycommon_".$id)){
			$saycommon = M('say_c')->where(array("sc_pid"=>$id))->where("sc_rtime >0")->order("sc_time desc")->limit(5)->select();
			$newIp = new \Org\Util\IP();
            for ($i=0; $i < count($saycommon); $i++) {
              $saycommon[$i]['ip'] = getIp($saycommon[$i]['sc_ip'],$newIp);
            }
			setS("saycommon_".$id,$saycommon);
		}
		$this->info = $sayinfo;
		$this->common = $saycommon;
		$this->up 	=  $tmp->where('s_view !=0 AND s_id <'.$id)->order('s_id desc')->limit(1)->find();
		$this->down =  $tmp->where('s_view !=0 AND s_id >'.$id)->order('s_id')->limit(1)->find();			
		$tmp->where(array("s_id"=>$id))->setInc('a_hit');
		$this->display();
	}

	public function addFeelContent(){
		if(!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			if(check_verify(I('post.txt_check')) == false){
        		$this->ajaxReturn(array("att"=>1,"msg"=>"验证码错误！"));
        	}
			
			// 判断是否是QQ登陆
			if($_SESSION['nickimg']){
				$data = array(
					'sc_pid'		=>	I('post.sc_pid'),
					'sc_name'		=>	I('post.sc_name'),
					'sc_email'		=>	I('post.sc_email'),
					'sc_url'		=>	I('post.sc_url'),
					'sc_content'	=>	I('post.sc_content'),
					'sc_img'		=>	session('nickimg'),
					'sc_ip'			=>	get_client_ip(),
					'sc_time'		=>	time(),
					'sc_from'		=>	getOs(),	
				);
				$static = M('say_c')->add($data);
			}else{
				$static = D('Admin/SayC')->addH();
			}
			if(I('post.send')=='on'){
				$content = "
				<div style='background-color:#d0d0d0;text-align:center;padding:40px;'>
				<div class='mmsgLetter' style='width:580px;margin:0 auto;padding:10px;color:#333;background-color:#fff;border:0px solid #aaa;border-radius:5px;-webkit-box-shadow:3px 3px 10px #999;-moz-box-shadow:3px 3px 10px #999;box-shadow:3px 3px 10px #999;font-family:Verdana, sans-serif; '>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				<div class='mmsgLetterContent' style='text-align:left;padding:30px;font-size:14px;line-height:1.5;background:url(".C('SITE_URL')."/Public/Img/email/mark.png) no-repeat top right;'>
				<div>
				<p>亲爱的管理员，你好!</p>
				<p>您的说说：《".I('post.title')."》有新的评论</p>
				<p> 用户 [ <a> ".I('post.sc_name')." </a> ] <small> ( ".I('post.sc_email')." ) </smaill>给您评论到：</p>
				<p style='word-wrap:break-word;word-break:break-all;margin-left:25px;border:1px solid #cccccc;padding:20px;display:block;'><a href='".C('SITE_URL')."/feel-".I('post.sc_pid')."' target='_blank'>".reFace(I('post.sc_content'))."</a></p>
				<p>此邮件为系统自动发出，请勿直接回复</p>
				</div>
				<div class='mmsgLetterHeader' style='height:23px;background:url(".C('SITE_URL')."/Public/Img/email/topline.png) repeat-x 0 0;'></div>
				</div>
				</div>
				</div>";				
				sendEmail(C('MAIL_USERNAME'),'您的'.C("NAME").'上的说说有了新的评论',$content);
			}
			if(I('post.rember')=='on'){
				cookie('name',I('post.sc_name'),3600); 
				cookie('email',I('post.sc_email'),3600); 
				cookie('url',I('post.sc_url'),3600); 
			}
			if($static)
				$data = array("error"=>0,"msg"=>"评论完成!");
			else
				$data = array("error"=>1,"msg"=>"评论时发生错误!");			
		}		
		$this->ajaxReturn($data);
	}
}