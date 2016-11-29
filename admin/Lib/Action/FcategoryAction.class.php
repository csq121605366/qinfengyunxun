<?php

// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: Fcategory.class.php
// +----------------------------------------------------------------------
// | Date: Mon Apr 26 11:55:49 CST 2010
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述: 栏目管理控制器
// +----------------------------------------------------------------------


defined('IN_ADMIN') or die('Access Denied');

/**
 * @name 栏目管理控制器
 *
 */
class FcategoryAction extends FbaseAction {

    /**
     * 栏目模型对象
     * @var object
     */
    protected $_category = '';

    /**
     * 栏目数据
     * @var unknown_type
     */
    protected $category_data = array();

    /**
     * @name初始化
     */
    protected function _initialize() {
        parent::_initialize();
        $in = &$this->in;
        $this->_category = D('Category');
        if ($in['info']['catid'] > 0)
            $in['catid'] = $in['info']['catid'];
        if ($in ['catid']) {
            $this->category_data = $this->_category->find((int) $in ['catid']);
        }
    }

    /**
     * @name添加栏目
     */
    public function add() {
        $in = &$this->in;
        if ($in ['ajax']) {
            $this->_add_ajax();
        }
        if (empty($in['step']) || !$in['type'] || $in['type'] == 'undefined') { //选择添加的栏目类型
            //所有可用模型  筛选掉 系统管理员 和个人会员
            $data = D('Model')->field("`name`,`modelid`")->where(" `status`='1' and moduleid != 2 and moduleid!=11")->findAll();
            //生成树
            import('Tree', INCLUDE_PATH);
            $parent_id = ($in['parentid'] ? $in['parentid'] : 0);
            $tree = get_instance_of('Tree');
            $categorys = D('Category')->field("`catid` AS `id`,`name`,`parentid`")->where("`cattype`='cat'")->findAll();
            $tree->init($categorys);
            $str = "<option value='\$id' \$selected>\$spacer\$name</option>\n";
            $categorys_option = $tree->get_tree(0, $str, $parent_id);
            $this->assign('data', $data); //所有模型信息
            $this->assign('html', $categorys_option); //已有栏目

            $in['type'] && $this->assign('type', $in['type']);
            $in['modelid'] && $this->assign('modelid', $in['modelid']);
            $this->display('add_select');
            exit();
        }
        $parent_data = array();
        if ($in ['parentid'] && !$in['type']) {//直接添加子栏目
            $pid = intval($in ['parentid']);
            $parent_data = $this->_category->find($pid);
            $this->assign('parent_data', $parent_data);
            $in['type'] = $parent_data['type'];
            $in ['info'] ['modelid'] = $parent_data['modelid'];
        }
        if ($in ['parentid'] && $in['type']) {//自选类型的子栏目
            $pid = intval($in ['parentid']);
            $parent_data = $this->_category->find($pid);
            $this->assign('parent_data', $parent_data);
            $in ['info'] ['modelid'] = $parent_data['modelid'];
        }
        //检查添加的类型
        $types = array('page', 'link', 'normal');
        if (!$in ['type'] || !in_array($in ['type'], $types)) {
            $this->message('<font class="red">参数错误！</font>');
        }
        $method = '_add_' . $in ['type'] . '_category';
        $in ['info'] ['type'] = &$in ['type'];

        //分发到对应类型栏目的处理方法
        if (method_exists($this, $method)) {
            $this->$method('', $parent_data);
        } else {
            $this->message('<font class="red">参数错误，非法操作！</font>');
        }
    }

    /**
     * @name处理添加栏目时候的ajax请求
     */
    protected function _add_ajax() {
        $in = &$this->in;
        $_category = $this->_category;
        if ($in ['ajax'] == 'checkdir') { //检查目录名称
            $in ['info'] ['catdir'] && $in ['info'] ['catdir'] = trim($in ['info'] ['catdir']);
            if (!empty($in['info']['catdir']) || $in['info']['url']) {
                if ($_category->validate($in['info'], 'catdir')) {
                    die('true');
                }
                die('false');
            }
            die('false');
        }
        if ($in ['ajax'] == 'checkpage') { //检查单页目录名称
            $in ['info'] ['url'] = trim($in ['info'] ['url']);
            if (!empty($in['info']['url'])) {
                if ($_category->validate($in['info'], 'url')) {
                    die('true');
                }
                die($_category->getError() . 'false');
            }
            die('false');
        }
        if ($in ['ajax'] == 'delete_thumb') { //删除缩略图
            if ($_category->delete_thumb($in ['catid'])) {
                die('true');
            } else {
                die('false');
            }
        }
        if ($in ['ajax'] == 'checkname') { //检查名字
            if (!empty($in['info']['classifyname'])) {
                $oldname = $in['oldname'] ? $in['oldname'] : '';
                $categorys = $_category->where("`name`='" . $in['info']['classifyname'] . "' AND `name` != '" . $oldname . "'")->find();
                if (is_array($categorys)) {//同名检查
                    die('false');
                } else {
                    die('true');
                }
            } else {
                die('false');
            }
        }
        if ($in['ajax'] == 'getpin') {
            if ($in['word']) {
                //import('Wordtopy',INCLUDE_PATH);
                include(INCLUDE_PATH . "Wordtopy.class.php");
                $piny = Wordtopy::getPinyin($in['word']);
                die($piny);
            } else {
                die('');
            }
        }
        exit();
    }

    /**
     * @name添加、编辑普通栏目
     */
    protected function _add_normal_category() {
        $in = &$this->in;
//		dump($in);exit;
        $_category = $this->_category;
        //检查参数
        $modelid = intval($in ['modelid'] ? $in ['modelid'] : $in ['info'] ['modelid']);
        //$modelid = intval ( $in ['info'] ['modelid'] ? $in ['info'] ['modelid'] : $in ['modelid'] );
        if (!$modelid)
            $this->message('<font class="red">参数错误！</font>');
        $parentid = intval($in ['parentid']);
        if ($this->ispost()) { //处理提交
            //令牌验证
            if (!$_category->autoCheckToken($in)) {
                $this->message('请不要非法提交或者重复提交页面！');
            }
            //更新的时候只能修改部分项数据
            if (!(int) $in ['info'] ['modelid']) {
                $this->message('<font class="red">没有选择模型！</font>');
            }
            $in ['info'] ['type'] = 'normal';
//			dump($in ['info']);exit;
            //添加
            if (false !== $_category->add($in ['info'])) {
                $this->message('<font class="green">添加成功！</font>');
            } else {
                $this->message($_category->getError() . '添加失败！</font>');
            }
        }
        //模块所属数据
        $_model = D('Model');
        $model_data = $_model->relation(true)->find($modelid);
        if (empty($model_data)) {
            $this->message('<font class="red">该栏目所属模型不存在或者被删除！</font>');
        }
        //获取设置项
        $mName = ucfirst(substr($model_data ['module'] ['controller'], 1));
        $_m = D($mName);
        if (!method_exists($_m, 'setting')) {
            throw_exception("{$mName}Model的setting方法不存在，无法载入栏目设置项！<br />");
        } else {
            $setting = $_m->setting(array("modelid" => $in['modelid']), $in['catid'], $in['parentid']);
        }
        $this->assign('otherHtml', $setting);
        $this->assign('model_data', $model_data);
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('add_normal_type');
    }

    /**
     * @name增加单页栏目的处理
     */
    protected function _add_page_category() {
        $in = &$this->in;
        $_category = $this->_category;
        $parentid = intval($in ['parentid']);
        if ($this->ispost()) { //处理提交
            //令牌验证
            if (!$_category->autoCheckToken($in)) {
                $this->message('<font class="red">请不要非法提交或者重复提交页面！</font>');
            }
            $in ['info'] ['type'] = 'page';
            //添加
            if (false !== $_category->add($in ['info'])) {
                $this->message('<font class="green">添加成功！</font>');
            } else {
                $this->message($_category->getError() . '添加失败！</font>');
            }
        }
        //获取设置项
        $_m = D('Page');
        if (!method_exists($_m, 'setting')) {
            throw_exception("PageModel的setting方法不存在，无法载入栏目设置项！<br />");
        } else {
            $setting = $_m->setting('', $in['catid'], $in['parentid']);
        }
        $this->assign('otherHtml', $setting);
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('add_page_type');
    }

    /**
     * @name添加外部链接栏目
     */
    protected function _add_link_category() {
        $in = &$this->in;
        $_category = $this->_category;
        //栏目已经存在的数据
        if ($this->ispost()) { //处理提交
            //令牌验证
            if (!$_category->autoCheckToken($in)) {
                $this->message('<font class="red">请不要非法提交或者重复提交页面！</font>');
            }
            $in ['info'] ['type'] = 'link';
            //添加
            if (false !== $_category->add($in ['info'])) {
                $this->message('<font class="green">添加成功！</font>');
            } else {
                $this->message('<font class="red">' . $_category->getError() . '添加失败！</font>');
            }
        }
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('add_link_type');
    }

    /**
     * @name 编辑栏目
     */
    public function edit() {
        $in = &$this->in;
        if ($in ['ajax']) {
            $this->_edit_ajax();
        }
        if (!$in['catid']) { //编辑栏目
            $this->message('<font class="red">参数错误，没有选择要编辑的栏目！</font>');
        }
        $data = &$this->category_data;
        //栏目数据
        $this->assign('data', $data);
        $in['type'] = $data['type'];
        //父栏目数据
        $parent_data = $this->_category->find($data['parentid']);
        $this->assign('parent_data', $parent_data);
        //检查添加的类型
        $types = array('page', 'link', 'normal');
        if (!$in ['type'] || !in_array($in ['type'], $types)) {
            $this->message('<font class="red">参数错误！</font>');
        }
        $method = '_edit_' . $in ['type'] . '_category';
        $in ['info'] ['type'] = &$in ['type'];
        //分发到对应类型栏目的处理方法
        if (method_exists($this, $method)) {
            $this->$method('', $parent_data);
        } else {
            $this->message('<font class="red">参数错误，非法操作！</font>');
        }
    }

    /**
     * @name处理添加栏目时候的ajax请求
     */
    protected function _edit_ajax() {
        $in = &$this->in;
        $_category = $this->_category;
        switch ($in['ajax']) {
            case 'delete_thumb': //删除缩略图
                if ($_category->delete_thumb($in ['catid'])) {
                    die('true');
                } else {
                    die('false');
                }
                break;
            case 'sort':  //排序
                $in['catid'] && $in['catid'] = (int) substr($in['catid'], 5);
                if ($in['catid'] && !empty($in['sort'])) {
                    $data['sort'] = $in['sort'];
                    $data['catid'] = $in['catid'];
                    $_category->auto_format = false;
                    if (false !== $_category->save($data)) {
                        //更新缓存
                        die($data['sort']);
                    }
                }
                echo '';
                break;
            case 'getcategory'://生成上级分类选框
                $infos = $_category->field("`catid` AS `id`,`name`,`parentid`")->where("`cattype`='cat'")->order("`sort` ASC,`catid` ASC")->findAll();
                import('Tree', INCLUDE_PATH);
                $_tree = get_instance_of('Tree');
                $_tree->init($infos);
                $str = "<option value='\$id'>\$spacer\$name</option>";
                echo '<select id="setparentid" onchange="$(\'#parentid\').val(this.value);">';
                echo $_tree->get_tree(0, $str);
                echo '</select>';
                break;
            case 'settopcatid'://功能不明
                if ($in['catid'] && $in['topcatid']) {
                    if (false !== $_category->settopcatid($in['catid'], $in['topcatid'])) {
                        //写入成功
                        /* $category_data = $_category->field("`topcatid`")->where("`catid`=".$in['catid'])->find();
                          if(!empty($category_data)){
                          $data_array = split(',',$category_data['topcatid']);
                          if(is_array($data_array)){
                          $data = '';
                          foreach($data_array as $k){
                          $info_data = $_category->field("`name`")->where("`catid`=".$k)->find();
                          $data .=  $info_data['name'].'<br>';
                          }
                          die($data);
                          }
                          die('false');
                          }else{
                          die('false');
                          } */
                        die('true');
                    }
                    die('false');
                }
                break;
            default:
                break;
        }
        exit();
    }

    /**
     * @name添加、编辑普通栏目
     */
    protected function _edit_normal_category() {
        $in = &$this->in;
        $_category = $this->_category;
        $data = $this->category_data;
        $modelid = $data['modelid'];
        $parentid = $data['parentid'];
        if ($this->ispost()) { //处理提交
            //令牌验证
            if (!$_category->autoCheckToken($in)) {
                $this->message('<font class="red">请不要非法提交或者重复提交页面！</font>');
            }
            //更新的时候只能修改部分项数据
            if (!(int) $in ['info'] ['modelid']) {
                $this->message('<font class="red">没有选择模型！</font>');
            }
            $in ['info'] ['type'] = 'normal';
            if (false !== $_category->save($in ['info'])) {
                $this->message('<font class="green">编辑成功！</font>');
            } else {
                $this->message('<font class="red">' . $_category->getError() . '编辑失败！</font>');
            }
        }
        //模块所属数据
        $_model = D('Model');
        $model_data = $_model->relation(true)->find($modelid);
        if (empty($model_data)) {
            $this->message('<font class="red">该栏目所属模型不存在或者被删除！</font>');
        }
        //获取设置项
        $mName = ucfirst(substr($model_data ['module'] ['controller'], 1));
        $_m = D($mName);
        if (!method_exists($_m, 'setting')) {
            throw_exception("{$mName}Model的setting方法不存在，无法载入栏目设置项！");
        } else {
            $setting = $_m->setting($data, $in['catid'], $in['parentid']);
        }
        $this->assign('otherHtml', $setting);
        $this->assign('model_data', $model_data);
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('edit_normal_type');
    }

    /**
     * @name增加单页栏目的处理
     */
    protected function _edit_page_category() {
        $in = &$this->in;
        $_category = $this->_category;
        $data = $this->category_data;
        $modelid = $data['modelid'];
        $parentid = $data['parentid'];
        if ($this->ispost()) { //处理提交
            //令牌验证
            if (!$_category->autoCheckToken($in)) {
                $this->message('<font class="red">请不要非法提交或者重复提交页面！</font>');
            }
            $in ['info'] ['type'] = 'page';
            if (false !== $_category->save($in ['info'])) {
                $this->message('<font class="green">编辑成功！</font>');
            } else {
                $this->message('<font class="red">' . $_category->getError() . '编辑失败！</font>');
            }
        }
        //获取设置项
        $_m = D('Page');
        if (!method_exists($_m, 'setting')) {
            throw_exception("PageModel的setting方法不存在，无法载入栏目设置项！");
        } else {
            $setting = $_m->setting($data, $in['catid'], $in['parentid']);
        }
        $this->assign('otherHtml', $setting);
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('edit_page_type');
    }

    /**
     * @name添加外部链接栏目
     */
    protected function _edit_link_category() {
        $in = &$this->in;
        $_category = $this->_category;
        $data = $this->category_data;
        $modelid = $data['modelid'];
        $parentid = $data['parentid'];
        if ($this->ispost()) { //处理提交
            //令牌验证
//			if (!$_category->autoCheckToken($in)) {
//				$this->message('请不要非法提交或者重复提交页面！');
//			}
            $in ['info'] ['type'] = 'link';
            if (false !== $_category->save($in ['info'])) {
                $this->message('<font class="green">编辑成功！</font>');
            } else {
                $this->message('<font class="red">' . $_category->getError() . '编辑失败！</font>');
            }
        }
        $this->assign('forward', U('fcategory/manage?cattype=cat'));
        $this->display('edit_link_type');
    }

    /**
     * @name栏目管理
     */
    public function manage() {
        $in = &$this->in;
        $_category = $this->_category;
        $data = array();
        $where = array();


        //过滤栏目表上的副表栏目 2013-1-28 fangfa  
        $where['controller'] = array('neq', 'Fsidetable');

        if (is_numeric($in['parentid'])) {
            $parent_category = F('category_' . $in['parentid']);
            $where['catid'] = array('IN', $parent_category['childrenids_self']);
        }
        //生成翻页
        $data ['count'] = $_category->where($where)->count();
        //初始化分页类
        $in ['p'] = intval($in ['p']);
        $_GET ['p'] = &$in ['p']; //分页类中会用到$_GET
//		$Page = new Page ( $data ['count'], $this->getPageSize ( 'pagesize' ) );
        $Page = new Page($data ['count'], 100000);  //不分页
        //分页代码
        $data ['pages'] = $Page->show();
        //当前页数据、后台的数据操作都直接操作数据库
        $_category->auto_format = true;
//		$data ['info'] = $_category->relation( 'model' )->where($where)->field ( "`catid` AS `id`,`name`,`modelid`,`parentid`,`type`,`sort`,`url`,`islock`" )->order ( "`sort` ASC,`catid` ASC " )->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
        $data ['info'] = $_category->relation('model')->where($where)->field("`catid` AS `id`,`name`,`modelid`,`parentid`,`type`,`sort`,`url`,`islock`,`isshow`,`topcatid`")->order("`sort` ASC,`catid` ASC ")->select();
        $data ['info'] = $this->escapeSpace($data ['info']);
//		dump($data ['info']);exit;
        //生成树
        import('Tree', INCLUDE_PATH);
        $tree = get_instance_of('Tree');
        if (is_array($data['info'])) {
            foreach ($data['info'] as $k => $v) {
                $data['info'][$k]['typename'] = ($v['type'] == 'normal' ? '内部栏目' : ($v['type'] == 'page' ? '<font color="blue">单网页</font>' : '<font color="red">链接</font>'));
                $data['info'][$k]['add_child'] = "<a href='" . U('fcategory/add?parentid=' . $v['id'] . '&modelid=' . $v['modelid'] . '&type=' . $v['type']) . " '>添加子栏目</a>";
                //$data['info'][$k]['add_child'] = ($v['type'] == 'link' ? '<font color="#CCCCCC">添加子栏目</font>'  : "<a href='" . U( 'fcategory/add?parentid='.$v['id'].'&modelid='.$v['modelid']) . " '>添加子栏目</a>");
                $data['info'][$k]['access'] = "<a href='" . $v['url'] . "' target='_blank'>访问</a>";
                $data['info'][$k]['edit'] = "<a href='" . U('fcategory/edit?catid=' . $v['id']) . "'>编辑</a>";
                $data['info'][$k]['isshow'] = "";

                if ($v['islock'] == 0) {
                    $data['info'][$k]['delete'] = "<a href=javascript:confirmurl('" . U('fcategory/delete?catid=' . $v['id']) . "','确认删除【" . ($v['name']) . "】栏目及其子目录吗？') title='删除栏目及栏目资讯'>删除</a>";
                } else {
                    $data['info'][$k]['delete'] = '<font color="#999">锁定</color>';
                }

                if ($v['isshow'] == 0) {
                    $data['info'][$k]['isshow'] = "<a href=javascript:confirmurl('" . U('fcategory/status_show?catid=' . $v['id'] . '&isshow=1') . "','确认显示栏目【" . ($v['name']) . "】吗？')  title='显示栏目'>隐藏</a>"; //urlencode
                } else {
                    $data['info'][$k]['isshow'] = "<a href=javascript:confirmurl('" . U('fcategory/status_show?catid=' . $v['id'] . '&isshow=0') . "','确认隐藏栏目【" . ($v['name']) . "】吗？')  title='隐藏栏目'>显示</a>";
                }
                $data['info'][$k]['nameedit'] = "<a href='" . U('fcategory/edit?catid=' . $v['id']) . "' title='编辑该栏目'>{$v['name']}</a>";
                $data['info'][$k]['modelname'] = $v['model']['name'];
                $data['info'][$k]['link'] = $v['url'];
            }
        }
        $tree->init($data ['info']);
        $str = "<tr>
				  <td class='editable_sort pointer' id='sort_\$id'>\$sort</td>
				  <td>\$id</td>
				  <td>\$spacer\$nameedit</td>
				  <td>\$link&nbsp;</td>
				  <td>\$typename&nbsp;</td>
				  <td>\$modelname&nbsp;</td>
				  <td>\$edit | \$delete</td>
				</tr>";


        $html = $tree->get_tree(0, $str);
        $this->assign('html', $html);
        $this->assign('pages', $data ['pages']);
        $this->display();
    }

    /**
     * @name删除栏目
     */
    public function delete() {
        $in = &$this->in;
        $catid = intval($in['catid']);
        if (!$catid)
            $this->message('<font class="red">参数错误！</font>', U('fcategory/manage'));
        $_category = D('Category');
        if (false !== $_category->delete($catid)) {
            $this->message('<font class="green">操作成功，请注意删除栏目内容管理对应的菜单！</font>', U('fcategory/manage?cattype=cat'));
        } else {
            $this->message('<font class="red">' . $_category->getError() . '删除失败！</font>', U('fcategory/manage?cattype=cat'));
        }
    }

    /**
     * @name启用、禁用字段
     */
    public function status_show() {
        $in = &$this->in;
        $catid = intval($in ['catid']);
        if (!$catid)
            $this->message('<font class="red">非法参数</font>');
        $_category = M('category');
        $category_data = $_category->find($catid);
        if (!is_array($category_data)) {
            $this->message('<font class="red">栏目不存在！</font>');
        } else {
            $isshow = intval($in ['isshow']) > 0 ? 1 : 0;
            if (false !== $_category->execute("UPDATE __TABLE__ SET `isshow`=$isshow WHERE `catid`='$catid' LIMIT 1")) {
                redirect($this->forward);
            } else {
                $this->message('<font class="red">操作失败！</font>');
            }
        }
    }

    /**
     * 转义输入的空格
     */
    protected function escapeSpace($data) {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $data[$k] = $this->escapeSpace($v);
            }
        } else {
            $data = str_replace(' ', '&nbsp', $data);
        }
        return $data;
    }

}

?>