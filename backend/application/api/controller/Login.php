<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
// use app\common\model\Admin;
use \Firebase\JWT\JWT;

class Login extends Cross
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login(Request $request)
    {
        $username = $request -> param('username');
        $password = $request -> param('password');
        
        $admin = model('admin');
        $info = $admin -> where('username', $username) -> find();

        if(!$info){
            return json(['code'=>0,'msg'=>'账号不存在！']);
        }

        // echo md5($password);

        if($info['password'] != md5($password)){
            return json(['code'=>0,'msg'=>'账号或密码错误']);
        }
        

        // jwt json web token
        $jwt = new JWT();
        $key = 'api123456';
        $payload = array(
            "iss" => "http://www.thinkphp.io",
            "aud" => "http://www.thinkphp.io",
            "iat" => time(),
            "nbf" => time(),
            'sid' => $info['id']
        );


        $token = $jwt::encode($payload, $key);

        return json(['code'=>1,'msg'=>'登录成功！', 'token' => $token]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
        //
    }
}
