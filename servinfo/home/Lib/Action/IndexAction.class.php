<?php
	/**-----------------------
	@Index模块控制器 IndexAction.class.php
	@author chen
	@datetime 11:01 2013/8/18
	@email cxz_vip@163.com
	*------------------------*/
class IndexAction extends Action {
	private $db;
	public function __construct(){
		parent::__construct();
		if(!session('uname')){
			$this->error("还没有登录，或者会话已过期，请重新登录","__APP__/login");
		}
		$this->db=M('admin');
	}
    public function index(){
		$this->assign('admin_name',session('uname'));
		$this->display();
    }
}