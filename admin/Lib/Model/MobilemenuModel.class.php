<?php

// +----------------------------------------------------------------------
// | http://www.b.com [ http://www.b.com ]
// +----------------------------------------------------------------------
// | File: MobilemenuModel.class.php
// +----------------------------------------------------------------------
// | Date: 2013-06-08
// +----------------------------------------------------------------------
// | Author: web@web.com
// +----------------------------------------------------------------------
// | 文件描述:  手机站Model
// +----------------------------------------------------------------------



class MobilemenuModel extends Model {

    /**

     * 数据表名

     * @var string

     */
    protected $tableName = 'mobilemenu';
    public $_returnStatus = array('array', 'str');
    public $_returnController = array("fcontent", "fpage", "fguestbook", "fjob", "fsalenet", "fvote", "fask");
    public $_tplArray = array(
        '0' => array('show' => 'wappage/page.html'),
        '1' => array('index' => 'wapcontent/article_list.html', 'show' => 'wapcontent/article_view.html'),
        '2' => array('index' => 'wapcontent/product_list.html', 'show' => 'wapcontent/product_view.html'),
        '3' => array('index' => 'wapcontent/picture_list.html', 'show' => 'wapcontent/picture_view.html'),
        '4' => array('index' => 'wapcontent/download_list.html', 'show' => 'wapcontent/download_view.html'),
        '5' => array('index' => 'wapcontent/video_list.html', 'show' => 'wapcontent/video_view.html'),
        '8' => array('index' => 'wapguestbook/index.html', 'show' => 'wapcontent/submit.html'),
        '9' => array('index' => 'wapjob/index.html', 'show' => 'wapjob/show.html', 'send' => 'wapjob/send.html'),
        '10' => array('index' => 'wapsalenet/index.html', 'show' => 'wapsalenet/show.html'),
        '11' => array('index' => 'wapvote/index.html', 'show' => 'wapvote/show.html', 'send' => 'wapvote/result.html'),
        '12' => array('index' => 'wapask/index.html', 'show' => 'wapask/show.html', 'send' => 'wapvote/result.html'),
    );

    /**

     * 获取已使用栏目 (数组或字符串)

     * 

     */
    public function getUseCatid($returnStatus = 1, $notat = false) {



        //echo $this->_returnStatus[$returnStatus];
        //查找所有以创建栏目

        $where = array();

        if (!empty($notat)) {

            $where['id'] = array(' NOT IN ', $notat);
        }

        $data = $this->field('catid')->where($where)->select();



        foreach ($data as $k => $v) {

            $array['_catid'][] = $v['catid'];
        }



        if ($this->_returnStatus[$returnStatus] == 'str')
            $return = implode(',', $array['_catid']);
        else
            $return = $array['_catid'];



        return $return;
    }

    public function getOnesCategory($catid) {



        $where['catid'] = $catid;

        $_m = D(parse_name('Category', 1)); //实例化表模型类

        $data = $_m->field('catid,name,controller,modelid,description')->where($where)->find();

        return $data;
    }

    public function getMobileMenu($id = '', $sort) {



        $where = array();

        if (!empty($id)) {

            $where['id'] = array('IN', $id);
        }



        $sort = !empty($sort) ? $sort : ' `sort` ASC,`id` DESC ';
        $join = "LEFT JOIN fangfa_category ON fangfa_mobilemenu.catid = fangfa_category.catid";
        $data = $this->field('id,name,url,catid,description')->where($where)->order($sort)->select();

        return $data;
    }

    /**
     * 添加手机栏目
     * @param unknown_type $data
     */
    public function add($data = '') {
        $id = parent::add($data);
        $this->cache($id);
        return $id;
    }

    /**
     * 更新手机栏目数据
     * @param unknown_type $data
     */
    public function save($data = '') {
        $result = parent::save($data);
        $id = $this->field('id')->where("catid='{$data['catid']}'")->find();
        $this->cache($id['id']);
        return $result;
    }

    /**
     * 更新栏目缓存
     *
     * @param int $catid
     */
    public function cache($id, $data) {
        if (empty($data) || !is_array($data)) {
            $this->auto_format = true;
            $data = $this->field('fangfa_mobilemenu.*,fangfa_category.controller')->join("LEFT JOIN fangfa_category on fangfa_category.catid = fangfa_mobilemenu.catid")->find($id);
        }
        $data['controller'] = empty($data['controller']) ? 'fwappage' : 'fwap' . substr($data['controller'], 1);
        $data ['id'] = $id;

        //格式化链接栏目url
        if ($data['type'] == 'link' && substr(ltrim($data['url'], ' \\/'), 0, 11) == 'HTTP_SERVER') {
            $data['url'] = str_replace('HTTP_SERVER', __ROOT__, $data['url']);
        }

        //缓存文件名  wap_{$id}.class.php
        return F('wap_' . $id . '.class', $data, INCLUDE_PATH . 'wap/');
    }

}
