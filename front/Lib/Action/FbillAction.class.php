<?php
// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: FbillAction.class.php
// +----------------------------------------------------------------------
// | Date: Fri Apr 23 14:18:54 CST 2010
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 订单模块
// +----------------------------------------------------------------------
//
/**
 * @name 订单模块
 * @author netwom
 *
 */
class FbillAction extends FbaseAction {
	/*
	 * @name初始化
	 */
	protected function _initialize() {		
		parent::_initialize();
		parent::checkRbac(); //权限检查
	}
	
}