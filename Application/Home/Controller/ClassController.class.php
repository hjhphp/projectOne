<?php
namespace Home\Controller;
use Think\Controller;
/**
* 文章类管理
* @date: 2015年10月31日
* @author: Administrator
* @return:
*/
class ClassController extends CommonController {
    
    public function _before_index(){
        $id = I('get.id');
		if(!M('tag')->where(array("t_id"=>$id,"t_view"=>1))->find()){
			$this->error("不存在的栏目!");	
		}
    }
    
    public function index(){
	  	$this->assign('class','active');  
        $id = I('get.id');
		$tmp = M('article');
        $count = $tmp->where(array('pid'=>$id))->count();
        $Page  = new \Think\PageHome($count,5);
        $Page->url = 'class-'.$id.'/page';
        $show  = $Page->show();
        $article = $tmp->where('a_view > 0')->order('a_time desc')->join('lt_tag ON lt_tag.t_id = lt_article.pid')->where(array('lt_article.pid'=>$id))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('article',$article);
        $this->assign('page',$show);
        $this->display();
    }
    
    public function search($key=''){  
	    $this->assign('class','active');  
        $key = I('get.key');
		$tmp = M('article');
        $map['a_title']=array('like',"%$key%");
        $map['a_view']=array('gt','0');
        $count = $tmp->where($map)->count();
        $Page  = new \Think\PageHome($count,5);
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $show  = $Page->show();
        $article = $tmp->where($map)->order('a_time desc')->join('lt_tag ON lt_tag.t_id = lt_article.pid')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('article',$article);
        $this->assign('page',$show);
        $this->display();
    }
}