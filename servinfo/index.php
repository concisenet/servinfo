<?php
	/**-----------------------
	@主入口文件 index.php
	@author chen
	@datetime 10:56 2013/8/18
	@email cxz_vip@163.com
	*------------------------*/
	define("APP_NAME","home");
	define("APP_PATH","./home/");
	define("THINK_PATH","./ThinkPHP/");
	define("RUNTIME_PATH",APP_PATH."runtime/");
	define("BUILD_DIR_SECURE",true);
	define("DIR_SECURE_FILENAME","index.html");
	define("DIR_SECURE_CONTENT","Access Deney");
	define("APP_DEBUG",true);
	require THINK_PATH."ThinkPHP.php";
?>