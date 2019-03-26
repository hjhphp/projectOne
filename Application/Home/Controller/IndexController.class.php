<?php
namespace Home\Controller;
use Think\Controller;
/**
* 前端首页管理
* @date: 2015年10月31日
* @author: Administrator
* @return:
*/
class IndexController extends CommonController {
	
    public function index(){
		$this->assign('index','active');
		if(!$articles=S('articles')){$articles = M('article')->where('a_view > 0')->order('a_time desc')->join('lt_tag ON lt_tag.t_id = lt_article.pid')->limit(0,6)->select();setS("articles", $articles);}
		$this->articles=$articles;
		if(!$ppt=S('ppt')){$ppt = M('ppt')->where(array("pp_view"=>1))->order("pp_time desc")->limit(4)->select();setS("ppt", $ppt);}
		$this->ppt = $ppt;
		$this->display();
    }	
}