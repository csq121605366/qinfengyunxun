<?php
// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: EmptyAction.class.php
// +----------------------------------------------------------------------
// | Date: Fri Apr 23 15:18:50 CST 2010
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 空模块
// +----------------------------------------------------------------------
defined('IN') or die('Access Denied!');
/**
 * @name 空模块
 *
 */
class EmptyAction extends FbaseAction {
	/**
	 * @name 空模块操作
	 */
	public function _empty() {
		$this->h404("empty");
	}
}





