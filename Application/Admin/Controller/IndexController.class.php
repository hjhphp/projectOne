<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AuthController {
	//后台首页
    public function index(){
    	//----------------------------------------------------初始化----------------------------------------------------------------
    	$article= M('article');
		$Link 	= M('link');
		$System = M('system');
		$Album 	= M('album');
		$Gust 	= M('gust');
		$say 	= M('say');
		$Version= M('version');
		$picture= M('picture');
		$album_c= M('album_c');
		$article_c = M('article_c');
		$say_c	= M('say_c');		
		//------------------------------------------------------数据-------------------------------------------------------------------	
		if(!$version = S('aversion')){$version = $Version->order('v_id desc')->limit(1)->getField('v_version');setS("aversion", $version);}
		$this->version = $version;
		if(!$system = S('asystem')){$system = $System->find();setS('asystem',$system);}
		$this->system = $system;
		if(!$num = S('anum')){
	      	$say_n = $say_c->count();
			$article_n = $article_c->count();
			$album_n = $album_c->count();
	      	$num = array(
				'say'     	=> $say->count(),
	            'article'  	=> $article->count(),
	            'comment'   => $say_n+$article_n+$album_n,
	            'gust'	  	=> $Gust->count(),
				'album'		=> $Album->count(),
				'picture'	=> $picture->count(),
				'link'		=> $Link->count(),
			);setS("anum",$num);
		}
		$this->assign("num",$num);
		//-------------------------------------------------------最新评论------------------------------------------------------------------------+		
		if(!$s_content = S('as_content')){
	        $time = $article_c->field('ac_time')
	        		->table('lt_article_c')
	            	->union(array('SELECT sc_time FROM lt_say_c ','SELECT alc_time FROM lt_album_c order by ac_time desc limit 0,5'),ture)
	                ->select();
		    for($i=0;$i<5;$i++){
	            $a  = $article_c->where(array('ac_time'=>$time[$i]['ac_time']))->find();
	            $al = $album_c->where(array('alc_time'=>$time[$i]['ac_time']))->find();
	            $s  = $say_c->where(array('sc_time'=>$time[$i]['ac_time']))->find();
				if($a!=''){$s_content[] = $a;}elseif($al!=''){$s_content[] = $al;}elseif($s!=''){$s_content[] = $s;}                   
	        }setS('as_content',$s_content);
		}
        $this->assign('s_content',$s_content);
		if(!$gusts = S('agusts')){$gusts = $Gust->where('g_rtime>0')->order('g_time desc')->limit(5)->select();setS("agusts", $gusts);}
		$this->gusts = $gusts;
    	$this->assign("index","class='active'");
    	$this->display();
    }
	
	public function out(){
		session(null);
		$this->redirect("/Admin/Login/index");
	}		
}