<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>服务器巡检信息录入系统|德州之窗网</title>
<link href="__PUBLIC__/css/default.css" type="text/css" rel="stylesheet"/>
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script>
	$(function(){
		$('#add_serv').click(function(){
			$('#add_form').fadeIn(900);/*点击后显示添加表单*/
		});
		$('#add').click(function(){/*ajax提交，以post方式*/
			$.post('__URL__/serv_add/',$('#serv_add').serialize(),function(json){
				if(json.status == 1){/*接收json数据，并插入到页面中*/
					$('#tab_list').append(
					'<tr><td><a href="__URL__/fill_in/id/'+json.data.id+'/sname/'+json.data.sname+'/ip/'+json.data.ip+'">'+json.data.sname+'</a></td><td>'+json.data.ip+'</td><td><a href="__URL__/edit/id/'+json.data.id+'">【修改】</a>&emsp;<a href="__URL__/del/id/'+json.data.id+'">【删除】</a></td></tr>'
					);
				}else{
					alert("Error");
				}
			},'json');
			$('.set_empty').val("");/*提交之后将表单内容清空*/
			$('#add_form').fadeOut(800);/*并且隐藏此表单*/
		});
		$('#cancel').click(function(){/*点击去掉按钮，隐藏添加表单*/
			$('#add_form').fadeOut(800);
		});

		/*使表格隔行变色*/
		$("tr:odd").css({background:'#ccc'});
		$("tr:even").css({background:'#eee'});
	})
</script>
</head>
<body>
	<div class="header">
		<div class="logo_top"><img src="__PUBLIC__/images/logo.jpg" height="77"></div>
		<div class="top_info">欢迎你：<?php echo ($admin_name); ?>，<a href="/">[系统首页]</a>&nbsp;|&nbsp;<a href="__APP__/login/logout">[安全退出]</a>&nbsp;|&nbsp;<a href="http://www.dzwindows.com" target="_blank" title="德州之窗网">德州之窗</a>&nbsp;|&nbsp;<a href="http://bbs.dzwindows.com" target="_blank" title="减河社区">减河社区</a></div>
	</div>
	<div class="main">
		<table width="700" id="tab_list">
		<caption><h2>服务器列表</h2></caption>
			<tr>
				<td width="295">服务器名称</td><td width="240">服务器IP地址</td><td>操作</td>
				<?php if(is_array($all_serv)): $i = 0; $__LIST__ = $all_serv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><a href="__URL__/fill_in/id/<?php echo ($vo["id"]); ?>/sname/<?php echo ($vo["sname"]); ?>/ip/<?php echo ($vo["ip"]); ?>/"><?php echo ($vo["sname"]); ?></a></td><td><?php echo ($vo["ip"]); ?></td><td><a href="__URL__/edit/id/<?php echo ($vo["id"]); ?>">【修改】</a>&emsp;<a href="__URL__/del/id/<?php echo ($vo["id"]); ?>">【删除】</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tr>
		</table>
		<div style="text-align:center;margin-top:10px;"><input type="button" id="add_serv" value="添加新服务器"></div>
	</div>
	<div id="add_form">
		<form method="post" name="serv_add" id="serv_add">
			服务器名：<input type="text" name="sname" class="set_empty" /><br/>
			服务器IP：<input type="text" name="ip" class="set_empty" /><br/>
			<input type="button" id="add" value="添加" />&emsp;<input type="button" id="cancel" value="取消" />
		</form>
	</div>
	<div class="footer"></div>
</body>
</html>