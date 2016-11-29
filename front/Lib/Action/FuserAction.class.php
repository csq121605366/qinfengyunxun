<?php
// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: FuserAction.class.php
// +----------------------------------------------------------------------
// | Date: 上午08:40:55
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 前台会员模块
// +----------------------------------------------------------------------

/**
 * @name前台会员模块
 *
 */
class FuserAction extends FbaseAction {
	
	/**
	 * 
	 * @nameUer实例
	 * @var object
	 */
	protected $_mUser = '';
	
	/**
	 * @name初始化
	 * @see FbaseAction::_initialize()
	 */
	protected function _initialize() {
		parent::_initialize();
		$this->_mUser = D ('User','admin');				
	}
	
	/**
	 * @name登录后会员中心主页
	 * 
	 */	
	public function home() {
		$user_id = $_SESSION['fuserdata']['user_id'];
		if(!$user_id){
			$this->message ( L ( '请先登录！' ),  __ROOT__ . '/login');exit;
		}
		$in = &$this->in;
		$data = $this->_mUser->getuserdata($_SESSION['fuserdata']['user_id']);
		$this->assign('data',$data);
		$seo['seotitle'] = L ('会员面板') . C('SITE_TITLE_SEPARATOR') . L('会员中心') . C('SITE_TITLE_SEPARATOR') . C('SEOTITLE');
		$seo['seokeywords'] = C('SEOKEYWORDS');
		$seo['seodescription'] = C('SEODESCRIPTION');
	    $seo['url'] = C ('SITEURL') . 'user/home';
	    $this->assign('seo',$seo);
		if($_SESSION['fuserdata']['roles'][0]=='member'){
			$this->display('user/home.html');
		}

	}
	
	/**
	 * @name编辑个人资料、包括修改密码
	 * 
	 */
	public function edit() {
		$in = &$this->in;
		//前台用户修改资料
		if ($this->ispost()) {
			unset($in['info']['username']);
			import('User',INCLUDE_PATH);
			$_user = get_instance_of('User');	
			if (! $_user->autoCheckToken ( $in ))
				$this->message ( L ('<font class="red">请不要非法提交或者重复提交页面！</font>') );	
			//前台更新，过滤不可以修改的信息
			$in['info']['user_id'] = $_SESSION['fuserdata']['user_id'];
			unset($in['info']['role_id']);// 角色信息
			unset($in['info']['username']); // 用户名
			unset($in['info']['last_login_ip']); //
			unset($in['info']['last_login_time']); //
			unset($in['info']['create_time']); //
			unset($in['info']['active']); //
			unset($in['info']['login_count']); //
			unset($in['info']['status']); //
			unset($in['info']['isadmin']); //
			if (false !== $_user->update($in['info'])) {
				$this->message(L ('保存成功！'), __ROOT__ . 'user/edit');
			} else {
				$this->message(L ('保存失败！') . $_user->getError(), __ROOT__ . 'user/edit');
			}
		}
		//获取用户详细信息
		$data = $this->_mUser->getfuserdata($_SESSION['fuserdata']['user_id'],true);
		
		$this->assign('data',$data);
		$seo['seotitle'] = L ('个人资料') . C('SITE_TITLE_SEPARATOR') . L('会员中心') . C('SITE_TITLE_SEPARATOR') . C('SEOTITLE');
		$seo['seokeywords'] = C('SEOKEYWORDS');
		$seo['seodescription'] = C('SEODESCRIPTION');
	    $seo['url'] = C ('SITEURL') . 'user/edit';
		$this->assign('seo',$seo);
		$this->display('user/edit.html');
	}
	
	/**
	 * @name用户忘记密码
	 * 
	 */
	public function forget() {
		$in = &$this->in;
		//获取系统配置
		if ($this->ispost()) {
			if (! M()->autoCheckToken ( $in ))
				$this->message ( L ('<font class="red">请不要非法提交或者重复提交页面！</font>') );
			$email_verify = trim($_REQUEST['email_verify']) ? trim($_REQUEST['email_verify']) : '';
			$pass = trim($_REQUEST['password']) ? trim($_REQUEST['password']) : '';
			$re_pass = trim($_REQUEST['re_password']) ? trim($_REQUEST['re_password']) : '';
			if(empty($pass)){
				$this->message(L('密码不能为空！'));exit;
			}
			if($pass!=$re_pass){
				$this->message(L('两次密码输入不一致！'));exit;
			}
			if($_SESSION['email_varify']==$email_verify){
				$email = trim($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
				if($email){
					$_u = M('user');
					if($_u->where(array('email'=>$email))->save(array('password'=>md5($pass)))){
						$this->message(L('密码重置成功！'));exit;
					}
				}
			}else{
				$this->message(L('邮箱验证码错误！'));exit;
			}
			$this->message(L('密码重置失败！'));exit;
		}
		$seo['seotitle'] = L ('找回密码') . C('SITE_TITLE_SEPARATOR') . C('SEOTITLE');
		$seo['seokeywords'] = C('SEOKEYWORDS');
		$seo['seodescription'] = C('SEODESCRIPTION');
		$this->assign('seo',$seo);
		$this->display('user/forget.html');
	}
	
	/**
	 * @name注销登录
	 */
	public function logout() {
		if (isset ( $_SESSION ['fuserdata'] )) {
//			import ( 'Act', INCLUDE_PATH );
//			$_act = get_instance_of ( 'Act' );
//			$_act->clearUser ();
			//session_destroy();
			unset($_SESSION ['fuserdata']);
			$this->assign ( "forward", __ROOT__ . '/login' );
			$this->message ( L ( '登出成功' ),  __ROOT__ . '/login');
		} else {
			$this->message ( L ( '已经登出' ) );
		}
	}

	/**
	 * 获取邮箱验证码
	 */
	public function get_emai_varify(){
		$verify = trim($_REQUEST['verify']) ? trim($_REQUEST['verify']) : '';
		if(md5($verify)!=$_SESSION['verify']){
			echo 1;exit;
		}
		//TODO 判断用户名与email是否匹配
		$email = trim($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
		$_u = M('user');
		if(!$_u->where(array('email'=>$email))->find()){
			echo 2;exit;
		}
		$_newPwd = $this->rand_string(6,3,'123456789'); //8位  数字+字母  密码
		//TODO 发送新密码到邮箱
		import('SendMail',INCLUDE_PATH);
		$_sendmail = get_instance_of('SendMail');
		//var_dump(11);exit;
		$_mail_server = C('MAIL_SERVER');
		$_mail_port = C('MAIL_PORT');
		$_mail_user = C('MAIL_USER');
		$_mail_password = C('MAIL_PASSWORD');
		$_mail_type = C('MAIL_TYPE');
		$_sendmail->set($_mail_server, $_mail_port, $_mail_user, $_mail_password, $_mail_type);
		if ($_sendmail->send($email,L('找回密码'),L('验证码').":".$_newPwd,$_mail_user)) { // 发送成功
			$_SESSION['email_varify'] = $_newPwd;
			echo 3;exit;
		}
		echo 4;exit;
	}

	public function rand_string($len=6,$type='',$addChars='') {
		$str ='';
		switch($type) {
			case 0:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			case 1:
				$chars= str_repeat('0123456789',3);
				break;
			case 2:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
				break;
			case 3:
				$chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			case 4:
				$chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
				break;
			default :
				// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
				$chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
				break;
		}
		if($len>10 ) {//位数过长重复字符串一定次数
			$chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
		}
		if($type!=4) {
			$chars   =   str_shuffle($chars);
			$str     =   substr($chars,0,$len);
		}else{
			// 中文随机字
			for($i=0;$i<$len;$i++){
				$str.= msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
			}
		}
		return $str;
	}


	/***
	 * 我的订单
	 */
	public function order(){
		$user_id = $_SESSION['fuserdata']['user_id'];
		if(!$user_id){
			$this->message ( L ( '请先登录！' ),  __ROOT__ . '/login');exit;
		}
		$this->display('user/order.html');
	}

	/**
	 * 我的资源
	 */
	public function myzy(){
		header("Content-type:text/html;charset=utf-8");
		$user_id = $_SESSION['fuserdata']['user_id'];
		if(!$user_id){
			$this->message ( L ( '请先登录！' ),  __ROOT__ . '/login');exit;
		}
		$ziyuan_cids = $_SESSION['fuserdata']['ziyuan_cids'];
		if($ziyuan_cids){
			$_m = M();
			$sql = "select a.zy_url,a.many_pic,a.cid,b.catid,b.title,b.shuxing,b.url,b.thumb,
						b.create_time,c.url cat_url,c.name
					from fangfa_content_ziyuan a left join fangfa_content b on a.cid=b.cid
					left join fangfa_category c on b.catid=c.catid
					where a.cid in ( $ziyuan_cids ) and b.status=9 order by a.cid desc";
			$ziyuan_list = $_m->query($sql);
			if($ziyuan_list){
				foreach($ziyuan_list as $key=>$val){
					$ziyuan_list[$key]['zurl'] = __ROOT__."/".$val['cat_url'].$val['url'];
					$sql = "select zs_name from fangfa_shuxing_ziyuan where id in ( ".$val['shuxing']." )";
					$shuxin_list = $_m->query($sql);
					$ziyuan_list[$key]['shuxing_list'] = $shuxin_list;
					//$ziyuan_list[$key]['str'] = implode(" ",$shuxin_list);
				}

				foreach($ziyuan_list as $key=>$val){
					$ziyuan_list[$key]['str'] = "";
					if($val['shuxing_list']){
						foreach($val['shuxing_list'] as $k=>$v){
							$ziyuan_list[$key]['str'] .= $v['zs_name']." ";
						}
					}
					$ziyuan_list[$key]['str'] = trim($ziyuan_list[$key]['str']);
				}
			}
		}
		//var_dump($ziyuan_list);
		$this->assign ( "ziyuan_list",$ziyuan_list);
		$this->display('user/myzy.html');
	}

	/**
	 * 我的商务圈
	 */
	public function myswq(){
		$user_id = $_SESSION['fuserdata']['user_id'];
		if(!$user_id){
			$this->message ( L ( '请先登录！' ),  __ROOT__ . '/login');exit;
		}

		//获取所有服务商
		$_m = M();
		$sql = "select a.nickname,a.create_time,a.user_id,b.head_photo from fangfa_user a
				left join fangfa_user_person b on a.user_id=b.user_id
				left join fangfa_role_user c on a.user_id=c.user_id
				where a.status=1 and c.role_id=3 and a.isadmin=0 order by a.user_id desc";
		$fws_list = $_m->query($sql);
		$this->assign ( "fws_list",$fws_list);
		$this->display('user/myswq.html');
	}

	/**
	 * 保存资源
	 */
	public function baocunziyuan(){
		$ziyuan_cids = trim($_POST['ziyuan']) ? trim($_POST['ziyuan']) : '';
		if($ziyuan_cids){
			$_SESSION['fuserdata']['ziyuan_cids'] = $ziyuan_cids;
		}
		echo 1;exit;
	}

	/**
	 * 服务商
	 */
	public function fuwushang(){
		$fws_id = intval($_REQUEST['fws_id']) ? intval($_REQUEST['fws_id']) : 0;
		//$user_id = $_SESSION['fuserdata']['user_id'];
		if(!$fws_id){
			$this->message ( L ( '请选择服务商！' ),  __ROOT__);exit;
		}
		$_m = M();
		$sql = "select a.*,b.nickname from fangfa_user_person a
				left join fangfa_user b on a.user_id=b.user_id where a.user_id='$fws_id'";
		$fws_info = $_m->query($sql);
		$this->assign ( "fws_info",$fws_info[0]);
		//var_dump($fws_info);

		//获取作品展示
		$sql = "select a.cid,a.fws_id,b.title,b.thumb,b.description from fangfa_content_picture a
				left join fangfa_content b on a.cid=b.cid where a.fws_id='$fws_id' and b.status=9";
		$pic_list = $_m->query($sql);
		$this->assign ( "pic_list",$pic_list);
		$this->display('user/fuwushang.html');
	}
}