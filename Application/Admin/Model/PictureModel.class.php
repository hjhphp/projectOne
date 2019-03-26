<?php
namespace Admin\Model;
use Think\Model;
/**
* 图片模型
* @date: 2015年10月23日
* @author: Administrator
* @return:
*/
class PictureModel extends Model{
	
	protected $_auto = array(
		array('p_time','strtotime',self::MODEL_BOTH,'function'),
		array('p_img','getImg',self::MODEL_BOTH,'function'),
		array('p_thumb','p_img',self::MODEL_BOTH,'field'),
		array('p_thumb','getAThumb',self::MODEL_BOTH,'function'),
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
