<?php
/**
* 前端首页管理
* @date: 2015年10月31日
* @author: Administrator
* @return:
*/
namespace Home\Controller;
use Think\Controller;
class AboutController extends CommonController {
    public function index(){    
		$this->assign('about','active');
        $this->display();
    }
}
?>