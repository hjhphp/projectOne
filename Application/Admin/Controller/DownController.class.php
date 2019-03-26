<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 下载函数
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class DownController extends AuthController{
	
	public function index(){
		$down	= M('down'); 
		$count	= $down->count();
		$Page	= new \Think\Page($count,20);
		$show	= $Page->show();
		$list	= $down->order('d_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('downinfo',$list);
		$this->assign('page',$show);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function addH(){
		$data = array(
			'd_name'	=>	I('post.dname'),
			'd_time'	=>	time(),
			'd_url'		=>	I('post.durl'),
			'd_static'	=>	I('post.dstatic')
		);
		if(M('down')->add($data)){
			$this->ajaxReturn(array("error"=>0,"msg"=>"新增程序完成"));
		}
	}

	public function log(){
		$downinfo = M('down_log')->order('downtime desc')->select();
		$newIp = new \Org\Util\IP();
        for ($i=0; $i < count($downinfo); $i++) {
          $downinfo[$i]['ip'] = getIp($downinfo[$i]['downip'],$newIp);
        }
        $this->assign("list",$downinfo);
		$this->display();		
	}

	public function edit(){
		$this->info = M('down')->where("d_id =".I('get.id')."")->find();
		$this->display("add");
	}

	public function editH(){
		$data = array(
			'd_id'		=>	I('post.did'),
			'd_name'	=>	I('post.dname'),
			'd_time'	=>	time(),
			'd_url'		=>	I('post.durl'),
			'd_static'	=>	I('post.dstatic')
		);
		if(M('down')->save($data)){
			$this->ajaxReturn(array("error"=>0,"msg"=>"修改程序完成"));
		}
	}

	public function none(){
		if(!IS_AJAX){
			$this->ajaxReturn(array("error"=>1,"msg"=>"非法请求"));
		}
		if(M('down')->where("d_id = ".I('post.id')."")->delete()){
			$this->ajaxReturn(array("error"=>0,"msg"=>"删除程序完成"));
		}
	}
}