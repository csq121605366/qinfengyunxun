<?php
// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: function.fftag.php
// +----------------------------------------------------------------------
// | Date: 2010-7-11
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 获取网站配置
// +----------------------------------------------------------------------


function smarty_function_ffset($params, &$smarty) {
	static $data = array ();
	//将参数导入到单独变量中
	@extract ( $params );
	return C (strtoupper($var));
}