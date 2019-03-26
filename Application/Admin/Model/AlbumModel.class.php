<?php
namespace Admin\Model;
use Think\Model;
/**
* 相册模型
* @date: 2015年10月21日
* @author: Administrator
* @return:
*/
class AlbumModel extends Model{
	
	protected $_auto = array(
		array('al_img','getImg',self::MODEL_BOTH,'function'),
		array('al_time','strtotime',self::MODEL_BOTH,'function'),	
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
