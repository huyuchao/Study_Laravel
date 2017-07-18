<?php
/**
 * Created by PhpStorm.
 * User: hyc
 * Date: 2017/7/12
 * Time: 15:34
 */

namespace App\Http\Controllers;

use App\UserSelf;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends  Controller
{
        public function  register(Request $request){
            $username = $request->get("userName");
            $password = $request->get("password");
            $realName = $request->get("realName");
            // 验证 bail  验证不通过就停止,会自动重定向到当前页面
           /* $this->validate($request,[
                'username' => 'bail|required|unique:posts|max:255',
                'body' => 'required',
            ]);*/
            echo "username = ".$username."  password== ".$password." path = ".$request->fullUrl();
           if ($username==null){
//               return redirect("user/register");
//               return view("user.register")->with('username','用户名不能为空');
               return back()->withInput(['username'=>"用户名不能为空",'password'=>$password,'realName'=>$realName]);
//               return response()->view("user.register",["username"=>"用户名不能为空"]);
           }

            if ( $password==null){
                return back()->withInput(['username'=>$username,'password'=>'密码不能为空','realName'=>$realName]);
//                return response()->view("user.register",["password"=>"密码不能为空"]);
            }
            if ( $realName==null){
                return back()->withInput(['username'=>$username,'password'=>$password,'realName'=>'姓名不能为空']);
//                return redirect()->route("user/register",['name' => '','realName'=>'姓名不能为空']);
//                return response()->view("user.register",["realName"=>"姓名不能为空"]);
            }

            if ($request->is("user/loginSuccess")){
                echo "loginSuccess all  encrypt pwd = ".encrypt($password);
                print_r($request->all()) ;
                echo "<br> session = ";
                print_r($request->session());
                echo "<br>";

            }
            echo "username = ".$username."  password== ".$password." path = ".$request->fullUrl();
            echo "<br>";

            $users = UserSelf::all();
            foreach ($users as $u){
                echo $u->userName." 名称 <br/>";
            }


//            $user = DB::select("select * from user where userName=? ",[$username]);
            $user = UserSelf::where('userName',$username)->first();
            echo "<br>  user = ";
            print_r($user);
            echo "<br>";
            if ($user!=null){

//                return back()->withInput(['username'=>"用户已经存在",'password'=>$password,'realName'=>$realName]);

                return response()->view("user.register",["username"=>"用户已经存在"]);
            }

//            $insertSuccess = DB::insert("insert into user (userName,password,realName) VALUES (?,?,?)",[$username,$password,$realName]);
            if ($user==null){
                $user = new UserSelf();
            }
            $user->userName=$username;
            $user->password=$password;
            $user->realName=$realName;

            $insertSuccess = $user->save();

            echo  "insertSuccess == ".$insertSuccess;
            if ($insertSuccess){
                return view("user.loginSuccess")->with("userName",$username);
            }
            return response()->view("user.register",["username"=>"未知错误"]);
        }
}