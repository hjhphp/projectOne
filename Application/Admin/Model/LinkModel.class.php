<?php
namespace Admin\Model;
use Think\Model;
/**
* 链接模型
* @date: 2015年10月24日
* @author: Administrator
* @return:
*/
class LinkModel extends Model{

	protected $patchValidate = true;
	
	protected $_validate = array(
		array('l_name','','链接名已存在!',0,'unique',1),
	);
	
	protected $_auto = array(
		array('l_time','time',self::MODEL_INSERT,'function'),
		array('l_ip','get_client_ip',self::MODEL_INSERT,'function'),
		array('l_from','getOs',self::MODEL_INSERT,'function'),
		array('l_rtime','strtotime',self::MODEL_BOTH,'function'),
			
	);
	
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
