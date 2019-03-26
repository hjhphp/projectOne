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
	<div id="content-header">
		<?php if(empty($info['al_id'])): ?><h1>添加相册</h1>
			<?php else: ?>
			<h1>修改相册</h1><?php endif; ?>			
		<div class="btn-group">
			<a href="<?php echo U('Admin/Album/albumList');?>" class="btn btn-large" title="相册列表"><i class="fa fa-tasks"></i></a>
		</div>
	</div>
	<div id="breadcrumb">
		<a href="index.html" title="回到首页" class="tip-bottom"><i class="fa fa-home"></i> 首页</a>
		<a href="#">相册管理</a>
		<?php if(empty($info['al_id'])): ?><a href="#" class="current">添加相册</a>
			<?php else: ?>
			<a href="#" class="current">修改相册</a><?php endif; ?>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="fa fa-folder-open"></i>									
						</span>
						<?php if(empty($info['al_id'])): ?><h5>添加相册</h5>
						<?php else: ?>
							<h5>修改相册</h5>
							<input value="<?php echo ($info["al_id"]); ?>" id="id" type="hidden"><?php endif; ?>
					</div>
					<div class="widget-content nopadding">
						<form method="get" class="form-horizontal">
							
							<div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">相册名</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-file"></i></span>
                                    	<input type="text" class="form-control input-sm" placeholder="相册名字" id="name" value="<?php echo ($info["al_name"]); ?>"/>
                                    </div>
                                </div>
                            </div>
                                                   
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">封面</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
					                <div class="imageBox">
					                    <div class="thumbBox"></div>
					                    <div class="spinner" style="display: none">Loading...</div>
					                </div>
					                <?php if(!empty($info['al_id'])): ?><input id="img" value="<?php echo ($info["al_img"]); ?>" type="hidden" /><?php endif; ?>
									<input type="file" id="file"/>
								</div>
                            </div>
							
							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">描述</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<textarea rows="5" class="form-control" id="remark"><?php echo ($info["al_remark"]); ?></textarea>
								</div>
							</div>
							
							<div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">添加时间</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="row">
                                		<div class="col-md-6">
                                    		<input type="text" <?php if(empty($info['al_id'])): ?>value="<?php echo date("Y-m-d H:i:s",time());?>"<?php else: ?>value="<?php echo (date("Y-m-d H:i:s",$info["al_time"])); ?>"<?php endif; ?> class="form-control input-sm" id="time" />
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            
							<div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">点击量</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    	<input type="text" <?php if(empty($info['al_id'])): ?>value="<?php echo (C("HIT")); ?>"<?php else: ?>value="<?php echo ($info["al_hit"]); ?>"<?php endif; ?> class="form-control input-sm" id="hit"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">来自</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    	<input type="text" <?php if(empty($info['al_id'])): ?>value="<?php echo getOs();?>"<?php else: ?>value="<?php echo ($info["al_from"]); ?>"<?php endif; ?> class="form-control input-sm" id="from"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">IP</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    	<input type="text" <?php if(empty($info['al_id'])): ?>value="<?php echo get_client_ip();?>"<?php else: ?>value="<?php echo ($info["al_ip"]); ?>"<?php endif; ?> class="form-control input-sm" id="ip"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">添加人</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    	<input type="text" <?php if(empty($info['al_id'])): ?>value="<?php echo (session('uname')); ?>"<?php else: ?>value="<?php echo ($info["al_root"]); ?>"<?php endif; ?> class="form-control input-sm" id="root"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">显示</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<label><input type="radio" name="show" value="1" <?php if(($info['al_view']) == "1"): ?>checked<?php endif; ?> /> Yes</label>
									<label><input type="radio" name="show" value="0" <?php if(($info['al_view']) == "0"): ?>checked<?php endif; ?> /> No</label>
								</div>
							</div>
							
							<div class="form-actions">
								<?php if(empty($info['al_id'])): ?><button type="button" class="btn btn-success btn-sm" id="addAl">存入数据库</button> 
								<?php else: ?>
								<button type="button" class="btn btn-success btn-sm" id="editAl">存入数据库</button><?php endif; ?>
								<button type="button" class="btn btn-danger btn-sm">取消</button>
							</div>
						</form>
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
    <script>
	$(document).ready(function(){
		$('input[type=checkbox],input[type=radio]').iCheck({
	    	checkboxClass: 'icheckbox_flat-blue',
	    	radioClass: 'iradio_flat-blue'
		});
		$('select').select2();
	    $('.spinner').spinner();
	    var head = $('#img').val();
	    if(!head){
	    	head = '/Public/Other/Img/default.png';
	    }
	    var options = {
        thumbBox: '.thumbBox',
        spinner: '.spinner',
        imgSrc: head
    	};
    	var cropper = $('.imageBox').cropbox(options);
    	$('#file').on('change', function() {
        	var reader = new FileReader();
        	reader.onload = function(e) {
            options.imgSrc = e.target.result;
            cropper = $('.imageBox').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        this.files = [];
    	});
	    $('#addAl').click(function(){
	    	var name = $('#name').val();
	    	var remark = $('#remark').val();
	    	var time = $('#time').val();
	    	var hit = $('#hit').val();
	    	var root = $('#root').val();
	    	var ip = $('#ip').val();
	    	var from = $('#from').val();
	    	var img = cropper.getDataURL();
	    	var show = $('input[name="show"]:checked').val();
	    	$("#addAl").attr("disabled",true);
	    	if(!name){
	    		err("相册名不能为空！");
	    		return false;
	    	}else if(!remark){
	    		err("相册描述不能为空！");
	    		return false;
	    	}else if(!time){
	    		err("请勿删除时间！");
	    		return false;
	    	}else if(!hit){
	    		err("点击量不能为空！");
	    		return false;
	    	}else if(!show){
	    		err("请选择是否显示！");
	    		return false;
	    	}else if(!ip){
	    		err("请勿删除IP！");
	    		return false;
	    	}else if(!from){
	    		err("请选择来自！");
	    		return false;
	    	}else if(!root){
	    		err("添加人不能为空！");
	    		return false;
	    	}
	    	$.ajax({
	    		type:"post",
	    		url:"/Admin/Album/albumAdd",
	    		async:true,
	    		data:{"al_name":name,"al_img":img,"al_remark":remark,"al_time":time,"al_hit":hit,"al_view":show,"al_ip":ip,"al_from":from,"al_root":root},
	    		success:function(data){
					if(data.error==0){
						succ("添加相册完成!",data.msg,"/Admin/Album/albumList");
				}else{
						err(data.msg);
						$("#addAl").removeAttr('disabled');
					}
				},
				eerror:function(data){
					err("网络错误!");
					$("#addAl").removeAttr('disabled');
				}
	    	});
	    });
	    $('#editAl').click(function(){
	    	var id = $('#id').val();
	    	var name = $('#name').val();
	    	var remark = $('#remark').val();
	    	var time = $('#time').val();
	    	var hit = $('#hit').val();
	    	var root = $('#root').val();
	    	var ip = $('#ip').val();
	    	var from = $('#from').val();
	    	var img = cropper.getDataURL();
	    	var show = $('input[name="show"]:checked').val();
	    	if(!name){
	    		err("相册名不能为空！");
	    		return false;
	    	}else if(!remark){
	    		err("相册描述不能为空！");
	    		return false;
	    	}else if(!time){
	    		err("请勿删除时间！");
	    		return false;
	    	}else if(!hit){
	    		err("点击量不能为空！");
	    		return false;
	    	}else if(!show){
	    		err("请选择是否显示！");
	    		return false;
	    	}else if(!ip){
	    		err("请勿删除IP！");
	    		return false;
	    	}else if(!from){
	    		err("请选择来自！");
	    		return false;
	    	}else if(!root){
	    		err("添加人不能为空！");
	    		return false;
	    	}
	    	$("#editAl").attr("disabled",true);
	    	$.ajax({
	    		type:"post",
	    		url:"/Admin/Album/albumEditH",
	    		async:true,
	    		data:{"al_id":id,"al_name":name,"al_img":img,"al_remark":remark,"al_time":time,"al_hit":hit,"al_view":show,"al_ip":ip,"al_from":from,"al_root":root},
	    		success:function(data){
					if(data.error==0){
						succ("添加相册完成!",data.msg,"/Admin/Album/albumList");
				}else{
						err(data.msg);
						$("#editAl").removeAttr('disabled');
					}
				},
				eerror:function(data){
					err("网络错误!");
					$("#editAl").removeAttr('disabled');
				}
	    	});
	    });
	});
</script>
</body>
</html>