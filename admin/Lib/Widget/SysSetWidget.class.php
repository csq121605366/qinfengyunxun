<?php
// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: ShowSystemSetWidget.class.php
// +----------------------------------------------------------------------
// | Date: 2010-5-28
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 系统设置输出widget
// +----------------------------------------------------------------------
defined ( 'IN_ADMIN' ) or die ( 'Access Denied' );
class SysSetWidget extends Widget {
	
	/**
	 * 输出的html代码，包含head和body两个部分，选项卡导航部分和内容部分
	 * 
	 * @var array
	 */
	protected $html = array();
	
	/**
	 * 参数为数组形式，widget数组信息
	 * @param array $data
	 */
	public function render($data) {
		if (is_array($data['widget'])) {
			import('Html',INCLUDE_PATH);
			foreach($data['widget'] as $k=>$v) {
				if (method_exists($this,$v['block'])) {
					$extra = '';
					if (empty($data['selected'])) {//当前选中项，如果没有指定，则为第一个
						if ($k==0)  {
							$extra['head'] .= ' class="selected" ';
						} else {
							$extra['head'] .= ' class="" ';
							$extra['body'] .= ' style="display:none" ';
						}
					} else {
						if ($v['wid'] == $data['selected']) {
							$extra['head'] .= ' class="selected" ';
						} else {
							$extra['head'] .= ' class="" ';
							$extra['body'] .= ' style="display:none" ';
						}
					}
					$this->$v['block']($v,$data['value'],$extra);
				}
			}
		}
		return $this->html;
	}

	/**
	 * 网站设置
	 * 
	 * @param $widget_info 该widget在数据中的信息
	 * @param $value_data 该widget在表单中显示需要的数据
	 * @param $extra 该widget的选项卡导航部分和内容部分的额外html属性
	 */
	protected function website($widget_info,$value_data,$extra) {
		$this->html['head'] .= "<li><a href='javascript:;' rel='tabsContent{$widget_info['wid']}' {$extra['head']}>公司信息</a></li>";
		$this->html['body'] .= "
		<table cellpadding='0' cellspacing='0' class='tabcontent' id='tabsContent{$widget_info['wid']}' {$extra['body']}>
		<tbody>";
		$this->html['body'] .= '
			<tr>
			  <th>参数说明</th>
			  <th style="text-align:left">参数值</th>
			  <th style="text-align:left">变量名</th>
			</tr>
			<tr>
		      <th width="150">热搜词</th>
		      <td><input name="info[companyname]" type="text" id="companyname" value="'.$value_data['companyname'].'" size="40" maxlength="50" class="input" /> <span class="help"> </span></td>
		      <td>companyname</td>
		    </tr>
		';
		$this->html['body'] .= '</tbody><tfoot>
				<tr>
					<td></td>
					<td><label class="btn"><input type="submit" name="submit" value="确定保存" class="submit" /></label></td>
				</tr>
			</tfoot></table>';
	}
	
	
	/**
	 * 邮件设置
	 * @param $widget_info 该widget在数据中的信息
	 * @param $value_data 该widget在表单中显示需要的数据
	 * @param $extra 该widget的选项卡导航部分和内容部分的额外html属性
	 */
	protected function mail($widget_info,$value_data,$extra) {
		$this->html['head'] .= "<li><a href='javascript:;' rel='tabsContent{$widget_info['wid']}' {$extra['head']}>邮件设置</a></li>";
		$this->html['body'] .= "
		<table cellpadding='0' cellspacing='0' class='tabcontent' id='tabsContent{$widget_info['wid']}' {$extra['body']}>
		<tbody>";
		//表单元素的值
		if (empty($value_data['mail_type'])) $value_data['mail_type'] = 1;
		${'mail_type_'.$value_data['mail_type']} = 'checked';
		if (!$value_data['port']) $value_data['port'] = 25;
		$this->html['body'] .= '
			<tr>
			  <th>参数说明</th>
			  <th style="text-align:left">参数值</th>
			  <th style="text-align:left">变量名</th>
			</tr>
			<tr>
			  <th width="150">发送方式</th>
			  <td>
			    <input type="radio" name="info[mail_type]" id="mail_type_1" value="1" '.${'mail_type_1'}.' onclick="$(\'#mail_server\').attr(\'disabled\', false);$(\'#mail_port\').attr(\'disabled\', false);$(\'#mail_user\').attr(\'disabled\', false);$(\'#mail_password\').attr(\'disabled\', false);"  '.${'mail_type_1'}.'/>
			    通过SMTP协议发送(支持ESMTP验证) <br />
			    <input type="radio" name="info[mail_type]" id="mail_type_2" value="2" '.${'mail_type_2'}.' onclick="$(\'#mail_server\').attr(\'disabled\', true);$(\'#mail_port\').attr(\'disabled\', true);$(\'#mail_user\').attr(\'disabled\', true);$(\'#mail_password\').attr(\'disabled\', true);" '.(substr(strtolower(PHP_OS), 0, 3) == 'win'  ? 'disabled' : '' ). ${'mail_type_2'}.'/>
			    通过mail函数发送(仅*unix类主机支持，请配置php.ini sendmail_path 参数) <br />
			    <input type="radio" name="info[mail_type]" id="mail_type_3" value="3" '.${'mail_type_3'}.' onclick="$(\'#mail_server\').attr(\'disabled\', false);$(\'#mail_port\').attr(\'disabled\', false);$(\'#mail_user\').attr(\'disabled\', true);$(\'#mail_password\').attr(\'disabled\', true);"  '.${'mail_type_3'}.'/>
			    通过SOCKET连接SMTP服务器发送(仅Windows主机支持, 不支持ESMTP验证)<br /></td>
			  <td>mail_type</td>
			</tr>
			<tr>
			  <th width="150">邮件服务器
			    <span>SMTP服务器，只有正确设置才能使用发邮件功能</span></th>
			  <td><input name="info[mail_server]" id="mail_server" type="text" size="40" value="'.$value_data['mail_server'].'"  class="input"/></td>
			  <td>mail_server</td>
			</tr>
			<tr>
			  <th width="150">邮件发送端口
			   <span>默认为25，一般无需更改</span></th>
			  <td><input name="info[mail_port]" id="mail_port" type="text" size="40" value="25"  class="input"/></td>
			  <td>mail_port</td>
			</tr>
			<tr>
			  <th width="150">邮箱帐号
			    <span>SMTP服务器的用户帐号(完整的电子邮件地址如user@domain.com)，只有正确设置才能使用发邮件功能</span></th>
			  <td><input name="info[mail_user]" id="mail_user" type="text" size="40" value="'.$value_data['mail_user'].'"  class="input"/></td>
			  <td>mail_user</td>
			</tr>
			<tr>
			  <th width="150">邮箱密码</th>
			  <td><input name="info[mail_password]" id="mail_password" type="password" size="40" value="'.$value_data['mail_password'].'"  class="input"/></td>
			  <td>mail_password</td>
			</tr>
			<tr>
			  <th width="150">邮件设置测试
			    <span>请填写接受测试的邮件地址 </span></th>
			  <td>
			  <input name="email_to" type="text" id="email_to" value="" size="30"  class="input"/>
			  <input name="button" type="button" id="test_mail" onClick="javascript:test_mail();" value="发送测试邮件" />
			  <script language="javascript">
			  $().ready(function (){
			  	$("#test_mail").click(function (){
			  		$("#email_to").after(\'<img src="'._PUBLIC_.'images/working.gif" id="working_gif\');
			  		$.get("'.U('fset/set&ajax=test_mail').'&mail_type="+$("input[name=\'info[mail_type]\']").val()+"&mail_server="+$("#mail_server").val()+"&mail_port="+$("#mail_port").val()+"&mail_user="+$("#mail_user").val()+"&mail_password="+$("#mail_password").val()+"&email_to="+$("#email_to").val(), function(data){
						alert(data);
						$("#working_gif").remove();
					});
				});
			  });
			  </script>
			  </td>
			  <td>&nbsp;</td>
			</tr>
		';
		$this->html['body'] .= '</tbody><tfoot>
				<tr>
					<td></td>
					<td><label class="btn"><input type="submit" name="submit" value="确定保存" class="submit" /></label></td>
				</tr>
			</tfoot></table>';
	}

	
}