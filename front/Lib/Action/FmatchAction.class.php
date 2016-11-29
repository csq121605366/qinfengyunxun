<?php
/**
 * @name匹配
 *
 */
class FmatchAction extends FbaseAction {

	protected function _initialize() {
		parent::_initialize();
	}
	/**
	 * @name匹配入口
	 */
	public function index() {
		$in = &$this->in;
		//获取栏目
		$catid = is_numeric($_REQUEST['catid'])&&intval($_REQUEST['catid']) ? intval($_REQUEST['catid']) : 0;
		//获取匹配资源
		$p1 = is_numeric($_REQUEST['p1'])&&intval($_REQUEST['p1']) ? intval($_REQUEST['p1']) : 0;
		$p2 = is_numeric($_REQUEST['p2'])&&intval($_REQUEST['p2']) ? intval($_REQUEST['p2']) : 0;
		$p3 = is_numeric($_REQUEST['p3'])&&intval($_REQUEST['p3']) ? intval($_REQUEST['p3']) : 0;
		$p4 = is_numeric($_REQUEST['p4'])&&intval($_REQUEST['p4']) ? intval($_REQUEST['p4']) : 0;
		$keyword = trim($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';

		$where = "b.status=9";

		if($catid){
			$where .= " and b.catid='$catid' ";
		}

		if($keyword){
			$where .= " and b.title like '%".$keyword."%' ";
		}

		//获取内容
		$_m = M();
		$sql = "select a.cid,a.many_pic,b.title,b.shuxing,b.description from fangfa_content_ziyuan a
				left join fangfa_content b on a.cid=b.cid where $where
				order by a.cid desc";
		$content_list = $_m->query($sql);
		if($content_list){
			foreach($content_list as $key=>$val){
				if(empty($val['shuxing'])){
					unset($content_list[$key]);
				}else{
					$content_list[$key]['many_pic'] = eval("return ".$val['many_pic'].";");
				}
			}
		}
		if(!$keyword){
			if($content_list){
				foreach($content_list as $key=>$val){
					if(!empty($val['shuxing'])){
						if($p1){
							$p1 = strval($p1);
							if(strpos($val['shuxing'],$p1)===false){
								unset($content_list[$key]);
								continue;
							}
						}
						if($p2){
							$p2 = strval($p2);
							if(strpos($val['shuxing'],$p2)===false){
								unset($content_list[$key]);
								continue;
							}
						}
						if($p3){
							$p3 = strval($p3);
							if(strpos($val['shuxing'],$p3)===false){
								unset($content_list[$key]);
								continue;
							}
						}
						if($p4){
							$p4 = strval($p4);
							if(strpos($val['shuxing'],$p4)===false){
								unset($content_list[$key]);
								continue;
							}
						}
					}
				}
			}
		}
		$this->assign('content_list',$content_list);
		//获取搜索的属性
		$_sz = M('shuxing_ziyuan');
		$str = "";
		if(!$keyword){
			if($p1){
				$temp1 = $_sz->field('zs_name')->find($p1);
				$str .= $temp1['zs_name'].'、';
			}
			if($p2){
				$temp2 = $_sz->field('zs_name')->find($p2);
				$str .= $temp2['zs_name'].'、';
			}
			if($p3){
				$temp3 = $_sz->field('zs_name')->find($p3);
				$str .= $temp3['zs_name'].'、';
			}
			if($p4){
				$temp4 = $_sz->field('zs_name')->find($p4);
				$str .= $temp4['zs_name'].'、';
			}
			if($str){
				$str = rtrim($str,'、');
			}
		}else{
			$str = $keyword;
		}
		$this->assign('search',$str);
		$this->display('match');
	}
}