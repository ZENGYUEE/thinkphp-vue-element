<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Articl extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $page = $request -> param('page');
        $pageSize = $request -> param('pageSize');
        $db = model('articl');
        $keyword = $request -> param('keyword');
        $where = [];
        $where[] = ['id','gt',0];

        if(isset($keyword) && !empty($keyword)) {
            // $db = $db -> where('title', 'like', "%".$keyword."%");
            $where[] = ['title', 'like', "%".$keyword."%"];
        }

        $info = $db -> page($page) -> limit($pageSize) -> where($where) -> order('id desc') -> select();
        $total = $db -> where($where) -> count();
        return json(['code'=> 1, 'data' => $info, 'total' => $total]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request -> param();
        $db = model('articl');

        if(isset($data['id']) && !empty($data['id'])) {
            $data['create_time'] = strtotime($data['create_time']);
            $data['update_time'] = strtotime($data['update_time']);
            $res = $db -> save($data, ['id' => $data['id']]);
        }else{
            $res = $db -> save($data);
        }
        

        if($res) {
            return json(['code' => 1, 'msg' => '新增成功！']);
        }else{
            return json(['code' => 0, 'msg' => '新增失败！']);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // $id = $request -> param('id');
        $db = model('articl');
        $res = $db -> where('id', $id) -> delete();
        if($res) {
            return json(['code' => 1, 'msg' => '删除成功！']);
        } else {
            return json(['code' => 0, 'msg' => '删除失败！']);
        }
    }
}
