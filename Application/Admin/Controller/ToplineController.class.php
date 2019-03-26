<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 栏目管理
 * @date: 2017年5月17日
 * @author: Administrator
 * @return:
 */
class ToplineController extends AuthController{

    public function index(){
        $this->assign("tag","active open");
        $this->assign("tagadd","class='active'");
        $this->display();
    }

    public function topAdd(){
        if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
        }else{
            $list = M('Topline')->create();
            //var_dump($list['createtime']);die;
            if(M('Topline')->add($list))
                $data = array("error"=>0,"msg"=>"添加栏目完成!");
            else
                $data = array("error"=>1,"msg"=>"添加栏目时发生错误!");
        }
        $this->ajaxReturn($data);
    }

    public function topList(){
        $this->assign("tag","active open");
        $this->assign("taglist","class='active'");
        $count  = M()->table('lt_topline')->count();
        $this->assign("num",$count);
        $Page   = new \Think\Page($count,5);
        $show   = $Page->show();
        $list   = M()->table('lt_topline')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function topEdit(){
        $this->assign("list","active open");
        $this->assign("taglist","class='active'");
        $info = M()->table('lt_topline')->where(array("top_id"=>I('get.id')))->find();
        if(!$info)
            $this->error('参数错误!',0,0);
        else{
            $this->assign("info",$info);
            $this->display('edit');
        }
    }

    public function topEditH(){
        if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
        }else{
            $list = M('Topline')->create();
            if(M('Topline')->save($list))
                $data = array("error"=>0,"msg"=>"修改说说完成!");
            else
                $data = array("error"=>1,"msg"=>"修改时发生错误!");
        }
        $this->ajaxReturn($data);
    }

    public function topDel(){
        if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
        }else{
            if(M('Topline')->where(array("top_id"=>I('post.id')))->delete())
                $data = array("error"=>0,"msg"=>"删除完成!");
            else
                $data = array("error"=>1,"msg"=>"删除时发生错误!");
        }
        $this->ajaxReturn($data);
    }

}
