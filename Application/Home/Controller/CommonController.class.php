<?php
namespace Home\Controller;
use Think\Controller;
use ThinkOauth;
/**
* 前段配置
* @date: 2015年10月24日
* @author: Administrator
* @return:
*/
class CommonController extends Controller{

    public function _initialize(){
//  	S('system',null);	
    	//------------------------------------------------------初始化-------------------------------------------------------------------
    	$article= M('article');
		$Link 	= M('link');
		$System = M('system');
		$Album 	= M('album');
		$Gust 	= M('gust');
		$say 	= M('say');
		$tag 	= M('tag');
		$Version= M('version');
		$picture= M('picture');
		$album_c= M('album_c');
		$article_c = M('article_c');
		$say_c	= M('say_c');		
		//------------------------------------------------------底部-------------------------------------------------------------------
    	if(!$pid = S('pid')){ $pid = $tag->where(array("t_view"=>1))->select();setS("pid",$pid);}
		$this->pid = $pid;
		if(!$system = S('system')){$system = $System->find();setS('system',$system);}
		$this->system = $system;
		if(!$version = S('version')){$version = $Version->order('v_id desc')->limit(1)->getField('v_version');setS("version", $version);}
		$this->version = $version;
        // 底部随机推荐5篇文章 不足5篇为空 
        if(!$f_article = S('f_article')){    
        	$tmp = $article->where(array('a_view'=>2))->getField('a_id',true);
        	$rt = array_rand($tmp,5);$f_article = array();
			for($i=0;$i<5;$i++){
				$f_article[] = $article->where(array("a_id"=>$tmp[$rt[$i]]))->find();
			}setS("f_article", $f_article);
		}
      	$this->assign('f_article',$f_article);
		if(!$num = S('num')){
	      	$say_n = $say_c->where("sc_rtime != 0")->count();
			$article_n = $article_c->where("ac_rtime != 0")->count();
			$album_n = $album_c->where("alc_rtime != 0")->count();
	      	$num = array(
				'say'     	=> $say->where(array('s_view >'=>1))->count(),
	            'article'  	=> $article->where(array('a_view >'=>1))->count(),
	            'comment'   => $say_n+$article_n+$album_n,
	            'gust'	  	=> $Gust->where("g_rtime != 0")->count(),
				'album'		=> $Album->where(array("al_view"=>1))->count(),
				'picture'	=> $picture->where(array("p_view"=>1))->count(),
				'link'		=> $Link->where("l_view != 0")->count(),
			);setS("num",$num);
		}
		$this->assign("num",$num);
		$System->where("id=1")->setInc('hit');
		if(!$album = S('album')){$album = $Album->where(array('al_view'=>1))->limit(9)->select();setS("album", $album);}
		$this->foot_album=$album;		
		//------------------------------------------------------右侧------------------------------------------------------------------------
		if(!$tag = S('tag')){
			$tag = $article->where("a_keyword != '' and a_view > 0")->field('a_keyword,a_id,a_time')->order('a_time desc')->select();
			for($i=1;$i<=count($tag);$i++){
				$tag[$i-1]['key']=$i;
			}setS('tag',$tag);
		}
		$this->assign('tag',$tag);
        if(!$s_article = S('s_article')){
	        $arr = $article->where('a_view != 0')->getField('a_id',true);
	      	$res = array_rand($arr,3);
			for($j=0;$j<3;$j++){
				$s_article[] = $article->where(array('a_id'=>$arr[$res[$j]]))->find();
			}setS("s_article",$s_article);
		}
		$this->assign("s_article",$s_article);
		if(!$link=S('link')){$link = $Link->where(array("l_view"=>2))->order('l_sort')->select();setS('link',$link);}
		$this->link = $link;
		S('s_content',null);		
		if(!$s_content = S('s_content')){
	        $time = $article_c->where('ac_rtime>0')->field('ac_time')
	        		->table('lt_article_c')
	            	->union(array('SELECT sc_time FROM lt_say_c WHERE sc_rtime != 0','SELECT alc_time FROM lt_album_c WHERE alc_rtime >0 order by ac_time desc limit 0,5'),ture)
	                ->select();
		    for($i=0;$i<5;$i++){
	            $a  = $article_c->where(array('ac_time'=>$time[$i]['ac_time']))->find();
	            $al = $album_c->where(array('alc_time'=>$time[$i]['ac_time']))->find();
	            $s  = $say_c->where(array('sc_time'=>$time[$i]['ac_time']))->find();
				if($a!=''){$s_content[] = $a;}elseif($al!=''){$s_content[] = $al;}elseif($s!=''){$s_content[] = $s;}                   
	        }setS('s_content',$s_content);
		}
        $this->assign('s_content',$s_content);
		if(!$gusts = S('gusts')){$gusts = $Gust->where('g_rtime>0')->order('g_time desc')->limit(5)->select();setS("gusts", $gusts);}
		$this->gusts = $gusts;         
        if(!$hits = S('hits')){$hits = $article->where("a_view != 0")->order('a_hit desc')->limit(7)->select();setS('hits',$hits);}
		$this->hits = $hits;
		if(!$Time = S('time')){
			$time1 = $article->order('a_time desc')->getField('a_time');
	        $time2 = $say->order('s_time desc')->getField('s_time');
	        $time3 = $Album->order('al_time desc')->getField('al_time');
	        $Time = max($time3,max($time1,$time2));
	        switch ($Time) {
	            case $time1:$msg = '文章';break;
	            case $time2:$msg = '说说';break;
	            case $time3:$msg = '相册';break;
	            default:$msg = 'Error';break;
	        }setS('time',$Time);setS('msg',$msg);
		}
		$this->msg = S('msg');
        $this->time=$Time; 
    }

    public function verify() {
        ob_clean();
        $verify = new \Think\Verify();
        $verify->codeSet = '0123456789'; 
        $verify->fontSize = '12px';
        $verify->imageW = 85;
        $verify->imageH = 25;
        $verify->length = 4;
        $verify->useCurve = false;
        $verify->useNoise = false;
        $verify->entry();
    }
	
	//QQ登陆
	public function loginqq($type = null) {
        empty($type) && $this->error('参数错误');
        import('Org.ThinkSDK.ThinkOauth');
        $sns = ThinkOauth::getInstance($type);
        redirect($sns->getRequestCodeURL());
    }
	
	//QQ登陆回调
	public function callback($type = null, $code = null) {
        header("Content-type: text/html; charset=utf-8");
        (empty($type) || empty($code)) && $this->error('参数错误');
        import('Org.ThinkSDK.ThinkOauth');
        $sns = ThinkOauth::getInstance($type);
        $extend = null;
        if ($type == 'tencent') {
            $extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
        }
        $tokenArr = $sns->getAccessToken($code, $extend);
		/**
		 * array(4) {
		 *	  ["access_token"] => string(32) "EF689CF1CEC547B2C3EA7F1367A3D1E8"
		 *	  ["expires_in"] => string(7) "7776000"
		 *	  ["refresh_token"] => string(32) "1DA94062299F40B1B7686EDB18D3CCE5"
		 *	  ["openid"] => string(32) "7C8F797F30B08554A6E39A537F9A324B"
		 *	}
		 */
        $openid = $tokenArr['openid'];
        $token = $tokenArr['access_token'];
        if ($openid) {
            $field = strtolower($type);
            $data = $sns->call('user/get_user_info');
            //dump($data);die;
            /**
			 * array(18) {
			 *	  ["ret"] => int(0)
			 *	  ["msg"] => string(0) ""
			 *	  ["is_lost"] => int(0)
			 *	  ["nickname"] => string(21) "那年，烟雨重楼"
			 *	  ["gender"] => string(3) "男"
			 *	  ["province"] => string(0) ""
			 *	  ["city"] => string(0) ""
			 *	  ["year"] => string(4) "1993"
			 *	  ["figureurl"] => string(73) "http://qzapp.qlogo.cn/qzapp/101232670/7C8F797F30B08554A6E39A537F9A324B/30" 空间头像
			 *	  ["figureurl_1"] => string(73) "http://qzapp.qlogo.cn/qzapp/101232670/7C8F797F30B08554A6E39A537F9A324B/50"
			 *	  ["figureurl_2"] => string(74) "http://qzapp.qlogo.cn/qzapp/101232670/7C8F797F30B08554A6E39A537F9A324B/100"
			 *	  ["figureurl_qq_1"] => string(69) "http://q.qlogo.cn/qqapp/101232670/7C8F797F30B08554A6E39A537F9A324B/40" QQ头像
			 *	  ["figureurl_qq_2"] => string(70) "http://q.qlogo.cn/qqapp/101232670/7C8F797F30B08554A6E39A537F9A324B/100"
			 *	  ["is_yellow_vip"] => string(1) "0"
			 *	  ["vip"] => string(1) "0"
			 *	  ["yellow_vip_level"] => string(1) "0"
			 *	  ["level"] => string(1) "0"
			 *	  ["is_yellow_year_vip"] => string(1) "0"
			 *	}
			 */
			//dump($data);
			$num = M('qq')->where(array("q_img"=>$data["figureurl_qq_2"]))->getField("q_num");
			//dump($num);die;
			if($num==NULL){
				$txt = array(
					"q_name"	=>	$data['nickname'],
					"q_img"		=>	$data["figureurl_qq_2"],
					"q_ip"		=>	get_client_ip(),
					"q_time"	=>	time(),
					"q_num"		=>	1,
				);
				M('qq')->add($txt);
			}else{
				M('qq')->where(array("q_img"=>$data["figureurl_qq_2"]))->setInc("q_num");
			}
            session("nickname",$data["nickname"]);
			session("nickimg",$data["figureurl_qq_2"]);
			$this->redirect('Index/index');
        } else {
            echo "<script>alert('系统出错;请稍后再试！');document.location.href='" . __APP__ . "';</script>";
        }
    }

	public function out(){
		session(null);
		$this->redirect('Index/index');
	}
}