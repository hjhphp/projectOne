<?php
namespace Admin\Model;
use Think\Model;
/**
* 文章评论模型
* @date: 2015年11月1日
* @author: Administrator
* @return:
*/
class ArticleCModel extends Model{
	
	protected $_auto = array(

		array('ac_img','ac_email',self::MODEL_INSERT,'field'),
		array('ac_img','check_img',self::MODEL_INSERT,'function'),
		array('ac_ip','get_client_ip',self::MODEL_INSERT,'function'),
		array('ac_time','time',self::MODEL_INSERT,'function'),	
		array('ac_from','getOs',self::MODEL_INSERT,'function'),	
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
