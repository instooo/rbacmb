<?php
/**
 * Created by DaiLinLin.
 * User: 测试人员专用下载
 * Date: 2016/12/28
 * Time: 13:44
 */

namespace Admin\Controller;


use Admin\Model\CateModel;

class TestController extends CommonController
{
        public function index(){

            $pagesize = I('get.pagesize',20,'intval');
            $pagesize = $pagesize>200?200:$pagesize;

            $otherWhere['a.status'] =1;
            $otherWhere['b.status'] =array('exp','is null');

            $where = $this->seachModel();
            $order = $this->orderModel();
            if(is_array($otherWhere)){
                $where = array_merge($where,$otherWhere);
            }
            if(is_array($otherWhere)&&!is_array($where)){
                $where = $otherWhere;
            }
            $material=M("material a");
            $count = $material
                ->join('left join opus_data b ON b.mid=a.mid')
                ->where ($where)->count ();
            $Page  = new \Think\Page($count,$pagesize);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $listinfo = $material
                ->field('a.*,b.status as cs_status')
                ->join('left join opus_data b ON b.mid=a.mid')
                ->where ($where)
                ->order ($order)
                ->limit($Page->firstRow.','.$Page->listRows)
                ->select ();

            $cate =D('cate')->getMenuList();
            foreach($listinfo as $k => $info){
                $listinfo[$k]['catename'] = $cate[$info['catid']];
                $listinfo[$k]['filesize'] = round(filesize('./'.$info['remote_url'])/(1024*1024),3).'M';
                $houzui=explode('.',$info['remote_url']);
                $listinfo[$k]['houzui'] =$houzui[1];
            }

            $this->assign('page',$Page->show());
            $this->assign('pagesize', $pagesize);
            $this->assign('listinfo',$listinfo);
            $this->display();
        }

        private function seachModel(){
            /*搜索框start*/
            $keywords = I('get.kw','','htmlspecialchars');
            if(!empty($keywords)){
                $where['keywords'] = array('like','%'.$keywords.'%');
            }
            $search_mode = I('get.search_mode','','htmlspecialchars');
            if(!empty($search_mode)){
                $flag = true;
                switch($search_mode){
                    case 'photo':$mode = '.swf';break;
                    case 'vector':$mode = '.flv';break;
                    case 'video': $mode='.mp4';break;
                    default: $flag = false;
                }
                if($flag){
                    $where['remote_url'] = array('like','%'.$mode);
                }
            }
            /*搜索框end*/

            /*条件筛选start*/
            $catid = I('get.cid','','intval');
            if(!empty($catid)){
                $where['catid'] = $catid;
                if($catid==0){
                    unset($where['catid']);
                }
            }
            $chanid = I('get.chanid','','intval');
            if(!empty($chanid)){
                $where['chanid'] = $chanid;
                if($chanid==0){
                    unset($where['chanid']);
                }
            }
            $game = I('get.game','','htmlspecialchars');
            if(!empty($game)){
                $where['game'] = array('like','%'.$game.'%');
            }

            $width = I('get.width','','intval');
            $height = I('get.height','','intval');
            if(!empty($width)||!empty($height)){
                $where['size'] = array('like','%'.$width.'*'.$height.'%');
            }
            $addtime = I('get.addtime','','htmlspecialchars');
            $endtime = I('get.endtime','','htmlspecialchars');

            $addtime = str_replace('+',' ',$addtime);
            $endtime = str_replace('+',' ',$endtime);

            $startTime = strtotime($addtime);
            $endTime = strtotime($endtime);
            if((!empty($addtime)&&empty($endTime))){
                $where['addtime'] = array('gt',$startTime);
            }
            if((!empty($endTime)&&empty($addtime))){
                $where['addtime'] = array('lt',$endTime);
            }
            if((!empty($endTime)&&!empty($addtime))){
                $where['addtime'] = array('between',array($startTime,$endTime));
            }
            /*条件筛选end*/
            return $where;
        }

        private function orderModel(){
            /*排序条件start*/
            $orders = I('get.order','','htmlspecialchars');
            $order = '';
            if(!empty($orders)){
                switch($orders){
                    case 'click':$order = 'b.click_per desc';break;
                    case 'reg':$order = 'b.reg_num desc';break;
                    case 'time': $order='addtime desc';break;
                    default: unset($order);
                }
            }

            /*排序条件end*/
            return $order;
        }
}