<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4
 * Time: 16:23
 */

namespace Admin\Model;


use Think\Model;

class ChannelModel extends Model{



    public function getMenuList(){
        $data = $this->getData();
        foreach($data as $cate) {
            $options[$cate['cid']] = $cate['name'];
        }
        return $options;
    }
    /**
     * 构造菜单选着列表
     * @return array
     */
    public function getOptions()
    {
        $data = $this->getData();

        $tree = $this->getTree($data);
        $tree = $this->setPrefix($tree);

        $options = array('添加顶级媒体');
        foreach($tree as $cate) {
            $options[$cate['cid']] = $cate['name'];
        }
        return $options;
    }

    /**
     * 菜单树形列表
     * @return mixed
     */
    public function getTreeList()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        return $tree = $this->setPrefix($tree);
    }

    /**
     * 得到菜单数据
     * @return array
     */
    public function getData()
    {
        $cates = self::field(true)->order('cid desc')->select();
        return $cates;
    }

    /**
     * 构造菜单数-数组
     * @param $cates
     * @param int $pid
     * @return array
     */
    public function getTree($cates, $pid = 0)
    {
        $tree = array();
        foreach($cates as $cate) {
            if ($cate['pid'] == $pid) {
                $tree[] = $cate;
                $tree = array_merge($tree, $this->getTree($cates, $cate['cid']));
            }
        }
        return $tree;
    }

    /**
     * 设置树形前缀
     * @param $data
     * @param string $p
     * @return array
     */
    public function setPrefix($data, $p = "|-----")
    {
        $tree = array();
        $num = 1;
        $prefix = array(0 => 1);
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['pid'] != $val['pid']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['pid'], $prefix)) {
                $num = $prefix[$val['pid']];
            }
            $val['name'] = str_repeat($p, $num).$val['name'];
            $prefix[$val['pid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }


}