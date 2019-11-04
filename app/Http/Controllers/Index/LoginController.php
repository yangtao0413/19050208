<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoginModel;
class LoginController extends Controller
{

		//登录
     public function index(){
    	return view('index.index');
    }
    public function logins(){
    	return view('logins.index');
    }
     public function logindo(Request $request)
    {
        $data = $request->all();
                // dd(md5("admin234"));
        unset($data['_token']);
        $data['password'] = md5($data['password']);
        $where = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $info = LoginModel::where($where)->first();
        if (empty($info)) {
            echo "<script>alert('账号或密码错误');history.back()</script>";
            exit;
        }
        $user = [
            'id' => $info['id'],
            'email' => $info['email'],
        ];
        Request()->session()->put('user', $user);
        $res = Request()->session()->get('user');
        if ($res) {
            echo "<script>alert('登陆成功');location='/'</script>";
        } else {
            echo "<script>alert('未知错误');location='/login'</script>";
            exit;
        }
    }



			//注册
    public function reg(){
    	return view('logins.reg');
    }
    public function regdo(Request $request){
    	 $data = $request->all();
        unset($data['_token']);
        unset($data['passwords']);
        $data['password']=md5($data['password']);
        $res=LoginModel::insert($data);
        if ($res){
            echo "<script>alert('注册成功');location='/'</script>";
        }else{
            echo "<script>alert('注册失败');location='/reg'</script>";

        }
    }
    //发送邮件
    public function send()
    {
        // $email = '1624530554@qq.com';
        $email = request()->email;
      // dd($email)
        $code = rand(100000, 999999);
        $msg = "{验证码为 " . $code . " 请勿告诉旁人123123}";

        $this->sendemail($email, $msg);
        $ran = request()->session()->put('rand', $code);
        $session = request()->session()->get('rand');
        if ($session) {
            return ['font' => '发送成功', 'code' => 1];
        } else {
            return ['font' => '发送失败', 'code' => 2];
            die;
        }
    }
    //发送邮件方法
   public function sendemail($email,$code){
        \Mail::send('email',['name'=>$code] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册购轩阁");
        //设置接收方
            $message->to($email);
        });
    }




    //验证验证码
    public function checkcode(Request $request)
    {
        $data = request()->all();
        unset($data['cpassword']);
        $data['created_at'] = time();
        $data['password'] = md5($data['password']);
        $code = $data['code'];
        $rand = request()->session()->get('rand');
        if ($code == $rand) {
            $res = Users::insertGetId($data);
        } else {
            return ['font' => '验证码错误', 'code' => 2];
            die;
        }
        if ($res) {
            return ['font' => '添加成功', 'code' => 1];
        } else {
            return ['font' => '未知错误', 'code' => 2];
            die;
        }
}
}
