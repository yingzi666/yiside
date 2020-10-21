<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2020 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\admin\Controller;

/**
 * 系统日志管理
 * Class Oplog
 * @package app\admin\controller
 */
class Good extends Controller
{

    /**
     * 绑定数据表
     * @var string
     */
    public $table = 'TpGoods';

    /**
     * 系统日志管理
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {

        $this->title = '商品管理';

        $query = $this->_query($this->table);
        $query->page();
    }
    public function add()
    {
        // $query = $this->_query('tp_goods_category');
        // // 查询器分页输出
        // $data = $query->find();
        // echo '<pre>';
        // print_r($data);die;
        // $goods_category = $this->page('TpGoodsCategory', false);
        // echo '<pre>';
        // print_r($goods_category);die;
        // Db::table('tp_goods_category')->where('id', 1)->select();
        $data = $this->app->db->name('TpGoodsCategory')->where('parent_id=0')->order('id desc')->select()->toArray();

        $this->assign('category', $data);

        $this->_applyFormToken();
        $this->_form($this->table, 'form');
    }
    public function get_data($pid = 0)
    {
        // echo 222;die;

        $data = $this->app->db->name('TpGoodsCategory')->where(['parent_id' => $pid])->order('id desc')->select();

        echo json_encode($data);die;
    }

    /**
     * 列表数据处理
     * @auth true
     * @param array $data
     * @throws \Exception
     */
    protected function _index_page_filter(array &$data)
    {
        // $ip = new \Ip2Region();
        // foreach ($data as &$vo) {
        //     $isp       = $ip->btreeSearch($vo['geoip']);
        //     $vo['isp'] = str_replace(['内网IP', '0', '|'], '', $isp['region'] ?? '');
        // }
    }

    /**
     * 日志行为配置
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function config()
    {
        if ($this->request->isGet()) {
            $this->fetch();
        } else {
            $data = $this->_vali([
                'oplog_state.in:0,1'  => '日志状态值异常！',
                'oplog_state.require' => '日志状态不能为空！',
                'oplog_days.require'  => '保存天数不能为空!',
            ]);
            foreach ($data as $name => $value) {
                sysconf($name, $value);
            }
            $this->success('日志配置成功！');
        }
    }

    /**
     * 清理系统日志
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function clear()
    {
        if ($this->app->db->name($this->table)->whereRaw('1=1')->delete() !== false) {
            $this->success('日志清理成功');
        } else {
            $this->error('日志清理失败，请稍候再试！');
        }
    }

    /**
     * 删除系统日志
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove()
    {
        $this->_applyFormToken();
        $this->_delete($this->table);
    }

}
