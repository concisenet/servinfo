<?php
	/**-----------------------
	@Login模块控制器 LoginAction.class.php
	@author chen
	@datetime 15:45 2013/8/18
	@email cxz_vip@163.com
	*------------------------*/
class LoginAction extends Action {
	private $db;
	public function __construct(){
		parent::__construct();
		$this->db=M('admin');
	}
	//管理员登录
	public function index(){
		if($_POST['submit']){
			$admin_db=$this->db->where("uname='".$_POST['uname']."'")->find();
			if($_SESSION['verify']==md5($_POST['verify_code'])){
				if($admin_db['uname']==$_POST['uname'] && $admin_db['upwd'] == md5($_POST['upwd'])){
					session('uname',$admin_db['uname']);
					session('upwd',$admin_db['upwd']);
					$this->success("登录成功","__APP__/index");
				}else{
					$this->error("用户名或密码错误");
				}
			}else{
				$this->error("验证码错误");
			}
		}
		$this->display();
	}

	//销毁session，安全退出，返回登录页面
	
	public function logout(){
		session('[destroy]');
		$this->success("退出成功","__URL__");
	}
	//验证码生成
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
}