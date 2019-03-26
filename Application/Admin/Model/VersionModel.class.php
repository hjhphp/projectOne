<?php
namespace Admin\Model;
use Think\Model;
/**
* 版本模型
* @date: 2015年10月21日
* @author: Administrator
* @return:
*/
class VersionModel extends Model{
	
	protected $_auto = array(
		array('v_time','strtotime',self::MODEL_BOTH,'function'),
	);
	
	public function addH(){
		if(!$this->create())
			return $this->getError();
		else{
			$this->add();
			return TRUE;
		}
	}	
}
