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
		$this->assign('admin_name',session('uname'));
		$this->db=M('servlist');
	}
    public function index(){
		$this->all_serv=$this->db->select();
		//$this->assign('admin_name',session('uname'));
		$this->display();
    }

	//添加服务器
	public function serv_add(){
		if($_POST['sname']){
			$data['sname']=trim(htmlspecialchars($_POST['sname']));
			$data['ip']=trim(htmlspecialchars($_POST['ip']));
			$re_arr=$this->db->where("sname='".$data['sname']."'")->find();
			if(is_array($re_arr)) $this->error("该服务器名称已存在");
			if($this->db->add($data)){
				$info=$this->db->where("sname='".$data['sname']."'")->find();
				$this->ajaxReturn($info,'info',1);
			}
		}
	}

	//填写巡检信息
	public function fill_in(){
		$this->display();
	}
	// 修改
	public function edit(){
		$this->display();
	}

	//删除
	public function del(){
		
	}
}