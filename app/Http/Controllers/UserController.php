<?php
/**
 * Created by PhpStorm.
 * User: hyc
 * Date: 2017/7/12
 * Time: 15:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends  Controller
{
        public function  register(Request $request){
            $username = $request->get("userName");
            $password = $request->get("password");
            if ($request->is("loginSuccess")){
                echo "loginSuccess all ";
                print_r($request->all()) ;
                echo "<br> session = ";
                print_r($request->session());
                echo "<br>";

            }
            echo "username = ".$username."  password== ".$password." path = ".$request->fullUrl();
            echo "<br>";
            // 验证 bail  验证不通过就停止,会自动重定向到当前页面
            $this->validate($request,[
                'username' => 'bail|required|unique:posts|max:255',
                'body' => 'required',
            ]);


            return view("user.loginSuccess")->with("userName",$username);
        }
}