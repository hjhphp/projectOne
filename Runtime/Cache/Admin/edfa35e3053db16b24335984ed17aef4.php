<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo (C("NAME")); ?> 后台管理系统</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/Public/Other/Css/bootstrap.min.css" />
		<link rel="stylesheet" href="/Public/Other/Css/my.css" />	
		<link rel="stylesheet" href="/Public/Other/Css/unicorn.css" />
		<!--[if lt IE 9]>
		<script type="text/javascript" src="/Public/Other/Js/respond.min.js"></script>
		<![endif]-->
	</head>	
	<body data-color="grey" class="flat">
	<div id="wrapper">
			<div id="header">
				<h1><a href="<?php echo U('Admin/Index/index');?>">Admin</a></h1>	
				<a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>	
			</div>
		
			<div id="user-nav">
	            <ul class="btn-group">
	                <li class="btn" >
	                	<a title="" href="#">
	                		<i class="fa fa-user"></i> 
	                		<span class="text"><?php echo (session('uname')); ?></span>
	                	</a>
	                </li>
	                <li class="btn"><a title="" href="<?php echo U('Admin/System/index');?>"><i class="fa fa-cog"></i> <span class="text">系统设置</span></a></li>
	                <li class="btn"><a title="" href="<?php echo U('Admin/Index/out');?>"><i class="fa fa-share"></i> <span class="text">退出</span></a></li>
	            </ul>
	        </div>
	       
			<div id="sidebar">
				<div id="search">
					<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
				</div>	
				<ul>
					<li <?php echo ($index); ?>><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>
					<li><a href="<?php echo (C("SITE_URL")); ?>" target="_blank"><i class="fa fa-home"></i> <span>前端首页</span></a></li>
					<li class="submenu <?php echo ($add); ?>">
						<a href="#"><i class="fa fa-flask"></i> <span>发布内容</span> <i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($say); ?>><a href="<?php echo U('Admin/Say/index');?>">发布说说</a></li>
							<li <?php echo ($article); ?>><a href="<?php echo U('Admin/Article/index');?>">发布文章</a></li>
							<li <?php echo ($version); ?>><a href="<?php echo U('Admin/Version/index');?>">发布新版本</a></li>
						</ul>
					</li>
					<li class="submenu <?php echo ($list); ?>">
						<a href="#"><i class="fa fa-th"></i> <span>内容管理</span> <i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($saylist); ?>><a href="<?php echo U('Admin/Say/sayList');?>">说说列表</a></li>
							<li <?php echo ($articlelist); ?>><a href="<?php echo U('Admin/Article/articleList');?>">文章列表</a></li>
							<li <?php echo ($versionlist); ?>><a href="<?php echo U('Admin/Version/versionList');?>">版本列表</a></li>
						</ul>
					</li>
					<li class="submenu <?php echo ($content); ?>">
						<a href="#"><i class="fa fa-comment"></i> <span>互动管理</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($saycontent); ?>><a href="<?php echo U('Admin/Say/sayContentList');?>">说说评论</a></li>
							<li <?php echo ($articlecontent); ?>><a href="<?php echo U('Admin/Article/articleContentList');?>">文章评论</a></li>
							<li <?php echo ($gustcontent); ?>><a href="<?php echo U('Admin/Gust/gustList');?>">留言评论</a></li>
							<li <?php echo ($albumcontent); ?>><a href="<?php echo U('Admin/Album/albumContentList');?>">相册评论</a></li>
						</ul>
					</li>
					<?php if(($_SESSION['class']) == "1"): ?><li class="submenu <?php echo ($user); ?>">
						<a href="#"><i class="fa fa-user-md"></i> <span>用户管理</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($useradd); ?>><a href="<?php echo U('Admin/User/userAdd');?>">新增用户</a></li>
							<li <?php echo ($userlist); ?>><a href="<?php echo U('Admin/User/userList');?>">用户列表</a></li>
						</ul>
					</li><?php endif; ?>
					<li class="submenu <?php echo ($tag); ?>">
						<a href="#"><i class="fa fa-tags"></i> <span>博客头条</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($tagadd); ?>><a href="<?php echo U('Admin/Topline/index');?>">新增头条</a></li>
							<li <?php echo ($taglist); ?>><a href="<?php echo U('Admin/Topline/topList');?>">编辑头条</a></li>
						</ul>
					</li>
					<li class="submenu <?php echo ($tag); ?>">
						<a href="#"><i class="fa fa-tags"></i> <span>栏目设置</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($tagadd); ?>><a href="<?php echo U('Admin/Tag/index');?>">新增栏目</a></li>
							<li <?php echo ($taglist); ?>><a href="<?php echo U('Admin/Tag/tagList');?>">栏目列表</a></li>
						</ul>
					</li>
					<li class="submenu <?php echo ($link); ?>">
						<a href="#"><i class="fa fa-link"></i> <span>链接设置</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($linkadd); ?>><a href="<?php echo U('Admin/Link/index');?>">新增链接</a></li>
							<li <?php echo ($linklist); ?>><a href="<?php echo U('Admin/Link/linkList');?>">链接列表</a></li>
						</ul>
					</li>

					<li class="submenu <?php echo ($album); ?>">
						<a href="#"><i class="fa fa-folder-open"></i> <span>相册管理</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($albumadd); ?>><a href="<?php echo U('Admin/Album/index');?>">新增相册</a></li>
							<li <?php echo ($albumlist); ?>><a href="<?php echo U('Admin/Album/albumList');?>">相册列表</a></li>
						</ul>
					</li>

					<li class="submenu <?php echo ($picture); ?>">
						<a href="#"><i class="fa fa-picture-o"></i> <span>图片管理</span><i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($pictureadd); ?>><a href="<?php echo U('Admin/Picture/index');?>">新增图片</a></li>
							<li <?php echo ($picturelist); ?>><a href="<?php echo U('Admin/Picture/pictureList');?>">图片列表</a></li>
						</ul>
					</li>
					<li class="submenu <?php echo ($system); ?>">
						<a href="#"><i class="fa fa-windows"></i> <span>系统设置</span> <i class="arrow fa fa-chevron-right"></i></a>
						<ul>
							<li <?php echo ($systembasic); ?>><a href="<?php echo U('Admin/System/index');?>">基本设置</a></li>
							<!--<li <?php echo ($systemone); ?>><a onclick="alert('单页设置开发中')">单页设置</a></li>-->
							<li <?php echo ($systememail); ?>><a href="<?php echo U('Admin/System/email');?>">邮件设置</a></li>
							<li <?php echo ($systemppt); ?>><a href="<?php echo U('Admin/System/ppt');?>">幻灯设置</a></li>
							<!--<li><a href="#" onclick="alert('高级功能开发中')">高级设置</a></li>-->
						</ul>
					</li>
				</ul>			
			</div>		
			
<div id="content">
	<div id="content-header" class="mini"><h1>仪表盘</h1></div>
	<div id="breadcrumb">
		<a href="<?php echo U('Admin/Index/index');?>" title="回到首页" class="tip-bottom"><i class="fa fa-home"></i> 首页</a>
		<a href="<?php echo U('Admin/Index/index');?>" class="current">仪表盘</a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 center" style="text-align: center;">					
				<ul class="quick-actions">
					<li><a href="#"><i class="icon-cal"></i>已运行：<?php echo (getDay($system["createtime"])); ?> 天</a></li>
					<li><a href="<?php echo U('Admin/System/email');?>"><i class="icon-mail"></i>邮件设置</a></li>
					<li><a href="<?php echo U('Admin/User/userList');?>"><i class="icon-user"></i>用户管理</a></li>
					<li><a href="<?php echo U('Admin/Say/index');?>"><i class="icon-survey"></i>写说说</a></li>
					<li><a href="<?php echo U('Admin/Article/index');?>"><i class="icon-survey"></i>写文章</a></li>
					<li><a href="http://www.cnzz.com/stat/website.php?web_id=1253899479"><i class="icon-graph"></i>站长统计</a></li>
				</ul>
			</div>	
		</div><br />
		<div class="row">
			<div class="col-xs-12">
				<div class="alert alert-info">
					<i class="fa fa-code"></i>  欢迎使用  <strong>维爱博客</strong>  后台管理程序. 请遵循使用守则，谢谢!
					<a href="#" data-dismiss="alert" class="close">×</a>
				</div>
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon"><i class="fa fa-signal"></i></span><h5>站点统计</h5>
						<div class="buttons">
							<a href="#" class="btn"><i class="fa fa-refresh"></i> <span class="text">更新</span></a>
						</div>
					</div>
					<div class="widget-content">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<ul class="site-stats">
									<li><div class="cc"><i class="fa fa-eye"></i> <strong><?php echo (chenkNum($system["hit"])); ?></strong> <small>次访问</small></div></li>
									<li><div class="cc"><i class="fa fa-edit"></i> <strong><?php echo (chenkNum($num["say"])); ?></strong> <small>篇说说</small></div></li>
									<li><div class="cc"><i class="fa fa-comment"></i> <strong><?php echo (chenkNum($num["comment"])); ?></strong> <small>条评论</small></div></li>
									<li><div class="cc"><i class="fa fa-comments"></i> <strong><?php echo (chenkNum($num["gust"])); ?></strong> <small>条留言</small></div></li>
									<li><div class="cc"><i class="fa fa-picture-o"></i> <strong><?php echo (chenkNum($num["picture"])); ?></strong> <small>张图片</small></div></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
								<ul class="site-stats">
									<li><div class="cc"><i class="fa fa-edit"></i> <strong><?php echo (chenkNum($num["article"])); ?></strong> <small>篇文章</small></div></li>
									
									<li><div class="cc"><i class="fa fa-comment"></i> <strong><?php echo (chenkNum($num["album"])); ?></strong> <small>个相册</small></div></li>
									<li><div class="cc"><i class="fa fa-comments"></i> <strong><?php echo (chenkNum($num["link"])); ?></strong> <small>条外链</small></div></li>
									<li class="divider"></li>
									<li><div class="cc">程序官网：<a href="http://www.weiloving.com" target="_blank">&nbsp;&nbsp;http://www.weiloving.com</a></div></li>
									<li><div class="cc">程序作者：金浩 [ admin@weiloving.com ]</div></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
								<ul class="site-stats">
									<li><div class="cc">QQ群 ： 517783507</div></li>
									<li><div class="cc">服务器版本 ：<?php echo ($_SERVER['SERVER_SOFTWARE']); ?></div></li>
									<li><div class="cc">服务器IP：<?php echo ($_SERVER['SERVER_ADDR']); ?></div></li>
									<li><div class="cc">PHP版本：<?php echo PHP_VERSION;?></div></li>
									<li><div class="cc">数据库信息：<?php echo mysql_get_client_info();?></div></li>
								</ul>
							</div>		
						</div>							
					</div>
				</div>					
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="widget-box">
					<div class="widget-title"><span class="icon"><i class="fa fa-comment"></i></span><h5>评论</h5></div>
					<div class="widget-content nopadding">
						<ul class="recent-posts">
						<?php if(is_array($s_content)): $i = 0; $__LIST__ = $s_content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo["ac_id"])): ?><li>
		        				<div class="user-thumb"><img src="<?php echo ($vo["ac_img"]); ?>" width="40" height="40"/></div>
		        				<div class="article-post">
		        				<span class="user-info"> By: <?php echo ($vo["ac_name"]); ?> on <?php echo (getTime($vo["ac_time"])); ?>, IP：<?php echo ($vo["ac_ip"]); ?> 在文章中评论</span>
		          				<p>&nbsp;&nbsp;<?php echo (msubstr(strip_tags(delFace($vo["ac_content"])),0,19,'utf-8',ture)); ?></p>
		          				<?php if(($vo["ac_rtime"]) != "0"): ?><a class="btn btn-primary btn-xs">已回复</a>
		          				<?php else: ?>
		          				<a href="<?php echo U('Admin/Article/articleContentEdit',array('id'=>$vo['ac_id']));?>" class="btn btn-primary btn-xs">回复</a><?php endif; ?>
		          				 <a href="<?php echo U('Admin/Article/articleContentList');?>" class="btn btn-danger btn-xs">删除</a>
		          				</div>
		        			</li><?php endif; ?>
			        		<?php if(!empty($vo["alc_id"])): ?><li>
			        			<div class="user-thumb"><img src="<?php echo ($vo["alc_img"]); ?>" width="40" height="40"/></div>
		        				<div class="article-post">
		        				<span class="user-info"> By: <?php echo ($vo["alc_name"]); ?> on <?php echo (getTime($vo["alc_time"])); ?>, IP：<?php echo ($vo["alc_ip"]); ?> 在相册中评论</span>
		          				<p>&nbsp;&nbsp;<?php echo (msubstr(strip_tags(delFace($vo["alc_content"])),0,19,'utf-8',ture)); ?></p>
		          				<?php if(($vo["alc_rtime"]) != "0"): ?><a class="btn btn-primary btn-xs">已回复</a>
		          				<?php else: ?>
		          				<a href="<?php echo U('Admin/Album/albumContentEdit',array('id'=>$vo['alc_id']));?>" class="btn btn-primary btn-xs">回复</a><?php endif; ?>
		          				<a href="<?php echo U('Admin/Album/albumContentList');?>" class="btn btn-danger btn-xs">删除</a>
		          				</div>
		          				</li><?php endif; ?>
			        		<?php if(!empty($vo["sc_id"])): ?><li>
			        			<div class="user-thumb"><img src="<?php echo ($vo["sc_img"]); ?>" width="40" height="40"/></div>
		        				<div class="article-post">
		        				<span class="user-info"> By: <?php echo ($vo["sc_name"]); ?> on <?php echo (getTime($vo["sc_time"])); ?>, IP：<?php echo ($vo["sc_ip"]); ?> 在相册中评论</span>
		          				<p>&nbsp;&nbsp;<?php echo (msubstr(strip_tags(delFace($vo["sc_content"])),0,19,'utf-8',ture)); ?></p>
		          				<?php if(($vo["sc_rtime"]) != "0"): ?><a class="btn btn-primary btn-xs">已回复</a>
		          				<?php else: ?>
		          				<a href="<?php echo U('Admin/Say/sayContentEdit',array('id'=>$vo['sc_id']));?>" class="btn btn-primary btn-xs">回复</a><?php endif; ?>
		          				<a href="<?php echo U('Admin/Say/sayContentList');?>" class="btn btn-danger btn-xs">删除</a>
		          				</div>
		          				</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="widget-box">
					<div class="widget-title"><span class="icon"><i class="fa fa-comments"></i></span><h5>留言</h5></div>
					<div class="widget-content nopadding">
						<ul class="recent-comments">
							<?php if(is_array($gusts)): $i = 0; $__LIST__ = $gusts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><li>
								<div class="user-thumb">
									<img width="40" height="40" src="<?php echo ($g["g_img"]); ?>">
								</div>
								<div class="comments">
									<span class="user-info"> User: <?php echo ($g["g_name"]); ?> on <?php echo (getTime($g["g_time"])); ?>, IP: <?php echo ($g["g_ip"]); ?> </span>
									<p>&nbsp;&nbsp;<?php echo (msubstr(strip_tags(delFace($g["g_content"])),0,19,'utf-8',ture)); ?></p>
									<?php if(($g["g_rtime"]) != "0"): ?><a class="btn btn-primary btn-xs">已回复</a>
		          					<?php else: ?>
		          						<a href="<?php echo U('Admin/Gust/gustEdit',array('id'=>$g['g_id']));?>" class="btn btn-primary btn-xs">回复</a><?php endif; ?>
									<a href="<?php echo U('Admin/Gust/gustList');?>" class="btn btn-danger btn-xs">删除</a>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
							<li class="viewall">
								<a title="查看全部" class="tip-top" href="<?php echo U('Admin/Gust/gustList');?>"> + 查看全部 + </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>			
	</div>
</div>
		<div class="row">
			<div id="footer" class="col-xs-12">
				2015&copy; Love Admin. Brought to you by Long
			</div>
		</div>
		</div>
        <script src="/Public/Other/Js/jquery.min.js"></script>
        <script src="/Public/Other/Js/jquery-ui.custom.js"></script>
        <script src="/Public/Other/Js/bootstrap.min.js"></script>
        <script src="/Public/Other/Js/jquery.gritter.min.js"></script>
        <script src="/Public/Other/Js/jquery.nicescroll.min.js"></script>
        <script src="/Public/Other/Js/unicorn.js"></script>          
		<script src="/Public/Other/Js/my.js"></script>
		<script src="/Public/Other/Js/cropbox-min.js"></script>
		<script src="/Public/Other/Js/jquery.icheck.min.js"></script>
		<script src="/Public/Other/Js/select2.min.js"></script> 
		<script src="/Public/Other/Js/cropbox-min.js"></script>
</body>
</html>