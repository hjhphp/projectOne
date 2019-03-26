<?php
namespace Admin\Model;
use Think\Model;
/**
* 用户模型
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
class UserModel extends Model{
	
	protected $patchValidate = true;
	
	protected $_validate = array(
		array('u_name','','账号已存在，请更换账号',0,'unique',1),
	);
	
	protected $_auto = array(
		array('u_password','md5',self::MODEL_BOTH,'function'),
	);
	
	public function in($user,$password){
		$info = $this->where(array("u_name"=>$user))->find();
		if($info){
			if($info['u_password']==md5($password)){
				session("uid",$info['u_id']);
				session("uname",$info['u_name']);
				session("class",$info['u_class']);
				addLog();
				return TRUE;
			}else
				return FALSE;
		}else
			return FALSE;		
	}
	
	public function addH(){
		if(!$this->create())
			return $this->getError();
		else{
			$this->add();
			return TRUE;
		}
	}
	
	public function editH(){
		if(!$this->create())
			return $this->getError();
		else{
			$this->save();
			return TRUE;
		}
	}
	
	
	
	
}
