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
		<?php if(empty($info['a_id'])): ?><h1>发表文章</h1>
		<?php else: ?>
		<h1>修改文章</h1><?php endif; ?>
		<div class="btn-group">
			<a href="<?php echo U('Admin/Article/articleList');?>" class="btn btn-large" title="文章列表"><i class="fa fa-tasks"></i></a>
			<a href="<?php echo U('Admin/Article/articleContentList');?>" class="btn btn-large" title="文章评论"><i class="fa fa-comment"></i></a>
		</div>
	</div>
	<div id="breadcrumb">
		<a href="index.html" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> 首页</a>
		<a href="#">发布内容</a>
		<?php if(empty($info['a_id'])): ?><a href="#" class="current">发表文章</a>
		<?php else: ?>
		<a href="#" class="current">修改文章</a><?php endif; ?>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="fa fa-flask"></i>									
						</span>
						<?php if(empty($info['a_id'])): ?><h5>发表文章</h5>
						<?php else: ?>
						<h5>修改文章</h5>
						<input id="aid" value="<?php echo ($info["a_id"]); ?>" type="hidden"/><?php endif; ?>
					</div>
					<div class="widget-content nopadding">
						<form method="get" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">文章标题</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<input type="text" class="form-control input-sm" id="title" value="<?php echo ($info["a_title"]); ?>"/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">文章类别</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<select id="tag">
										<?php if(is_array($tag)): $i = 0; $__LIST__ = $tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["t_id"]); ?>" <?php if($info['pid'] == $v['t_id']): ?>selected<?php endif; ?> ><?php echo ($v["t_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-3 col-md-3 col-lg-1 control-label">关键词</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
										<input type='text' class="form-control input-sm" placeholder="一个关键词" id="keyword" value="<?php echo ($info["a_keyword"]); ?>"/>
										<span class="input-group-addon"><i class="fa fa-quote-right"></i></span>
									</div>
								</div>											
							</div>
							
							                                                   
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">封面</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
					                <div class="imageBox-article">
					                    <div class="thumbBox-article"></div>
					                    <div class="spinner" style="display: none">Loading...</div>
					                </div>
					                <?php if(!empty($info['a_id'])): ?><input id="img" value="<?php echo ($info["a_img"]); ?>" type="hidden" /><?php endif; ?>
									<input type="file" id="file"/>
								</div>
                            </div>
							
							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">描述</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<textarea rows="3" class="form-control" id="remark"><?php echo ($info["a_remark"]); ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">文章内容</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<script id="container" name="content" type="text/plain"><?php echo ($info["a_content"]); ?></script>
								</div>
							</div>
							
							<div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">发表时间</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    	<input type="text" <?php if(empty($info['a_id'])): ?>value="<?php echo date("Y-m-d H:i:s",time());?>"<?php else: ?>value="<?php echo (date("Y-m-d H:i:s",$info["a_time"])); ?>"<?php endif; ?> class="form-control input-sm" id="time"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">显示</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<label><input type="radio" name="show" value="0" <?php if(($info['a_view']) == "0"): ?>checked<?php endif; ?> > Not show</label>
									<label><input type="radio" name="show" value="1" <?php if(($info['a_view']) == "1"): ?>checked<?php endif; ?> /> Show</label>
									<label><input type="radio" name="show" value="2" <?php if(($info['a_view']) == "2"): ?>checked<?php endif; ?> /> Hot</label>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 col-md-3 col-lg-1 control-label">原创</label>
								<div class="col-sm-9 col-md-9 col-lg-10">
									<label><input type="radio" name="org" value="1" <?php if(($info['a_original']) == "1"): ?>checked<?php endif; ?>/> Yes</label>
									<label><input type="radio" name="org" value="0" <?php if(($info['a_original']) == "0"): ?>checked<?php endif; ?> /> No</label>
								</div>
							</div>
							
							<div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">发表人</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    	<input type="text" <?php if(empty($infp['a_id'])): ?>value="<?php echo (C("ADMIN_NAME")); ?>"<?php else: ?>value="<?php echo ($info["a_author"]); ?>"<?php endif; ?>  class="form-control input-sm" id="root"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-1 control-label">点击量</label>
                                <div class=" col-sm-9 col-md-9 col-lg-10">
                                	<div class="input-group input-group-sm">
										<span class="input-group-addon"><i class="fa fa-fire"></i></span>
                                    	<input type="text" <?php if(empty($info['a_id'])): ?>value="<?php echo (C("HIT")); ?>"<?php else: ?>value="<?php echo ($info["a_hit"]); ?>"<?php endif; ?> class="form-control input-sm" id="hit"/>
                                    </div>
                                </div>
                            </div>
							<div class="form-actions">
								<?php if(empty($info['a_id'])): ?><button type="button" class="btn btn-success btn-sm" id="addA">存入数据库</button>&nbsp;&nbsp;  
								<?php else: ?>
								<button type="button" class="btn btn-success btn-sm" id="editA">存入数据库</button>&nbsp;&nbsp;<?php endif; ?>
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
<script src="/Public/Ueditor/ueditor.config.js"></script>
<script src="/Public/Ueditor/ueditor.all.min.js"></script>
<script>
	$(document).ready(function(){	
		$('input[type=checkbox],input[type=radio]').iCheck({
	    	checkboxClass: 'icheckbox_flat-blue',
	    	radioClass: 'iradio_flat-blue'
		});
		var ue = UE.getEditor('container');
		$('select').select2();
	    $('.spinner').spinner();
	    var head = $('#img').val();
	    if(!head){
	    	head = '/Public/Other/Img/default.png';
	    }
	    var options = {
        thumbBox: '.thumbBox-article',
        spinner: '.spinner',
        imgSrc: head
    	};
    	var cropper = $('.imageBox-article').cropbox(options);
    	$('#file').on('change', function() {
        	var reader = new FileReader();
        	reader.onload = function(e) {
            options.imgSrc = e.target.result;
            cropper = $('.imageBox-article').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        this.files = [];
    	});
	    $('#addA').click(function(){
	    	var title = $('#title').val();
	    	var tag = $('#tag').val();
	    	var keyword = $('#keyword').val();
	    	var remark = $('#remark').val();
	    	var img = cropper.getDataURL();
	    	var content = UE.getEditor('container').getContent();
	    	var time = $('#time').val();
	    	var show = $('input[name="show"]:checked').val();
	    	var org = $('input[name="org"]:checked').val();
	    	var root = $('#root').val();
	    	var hit = $('#hit').val();
	    	if(!title){
	    		err("文章标题不能为空!");
	    		return false;
	    	}else if(!tag){
	    		err("文章类别不能为空!");
	    		return false;
	    	}else if(!keyword){
	    		err("关键词不能为空!");
	    		return false;
	    	}else if(!remark){
	    		err("文章描述不能为空!");
	    		return false;
	    	}else if(!content){
	    		err("正文不能为空!");
	    		return false;
	    	}else if(!time){
	    		err("发表时间不能为空!");
	    		return false;
	    	}else if(!show){
	    		err("请选择是否显示!");
	    		return false;
	    	}else if(!org){
	    		err("请选择是否原创!");
	    		return false;
	    	}else if(!root){
	    		err("作者不能为空!");
	    		return false;
	    	}else if(!hit){
	    		err("默认点击量不能为空!");
	    		return false;
	    	}
	    	$("#addA").attr("disabled",true);
	    	$.ajax({
	    		type:"post",
	    		url:"/Admin/Article/articleAdd",
	    		async:true,
	    		data:{"a_title":title,"a_remark":remark,"a_img":img,"a_keyword":keyword,"pid":tag,"a_time":time,"a_content":content,"a_view":show,"a_hit":hit,"a_original":org,"a_author":root},
				success:function(data){
					if(data.error==0){
						succ("添加文章完成!",data.msg,"/Admin/Article/articleList");
					}else{
						err(data.msg);
						$("#addA").removeAttr('disabled');
					}
				},
				eerror:function(data){
					err("网络错误!");
					$("#addA").removeAttr('disabled');
				}
	    	});
	    });
	    
	    $('#editA').click(function(){
	    	var img = cropper.getDataURL();
	    	var aid = $('#aid').val();
	    	var title = $('#title').val();
	    	var tag = $('#tag').val();
	    	var keyword = $('#keyword').val();
	    	var remark = $('#remark').val();
	    	var content = UE.getEditor('container').getContent();
	    	var time = $('#time').val();
	    	var show = $('input[name="show"]:checked').val();
	    	var org = $('input[name="org"]:checked').val();
	    	var root = $('#root').val();
	    	var hit = $('#hit').val();
	    	if(!title){
	    		err("文章标题不能为空!");
	    		return false;
	    	}else if(!tag){
	    		err("文章类别不能为空!");
	    		return false;
	    	}else if(!keyword){
	    		err("关键词不能为空!");
	    		return false;
	    	}else if(!remark){
	    		err("文章描述不能为空!");
	    		return false;
	    	}else if(!content){
	    		err("正文不能为空!");
	    		return false;
	    	}else if(!time){
	    		err("发表时间不能为空!");
	    		return false;
	    	}else if(!show){
	    		err("请选择是否显示!");
	    		return false;
	    	}else if(!org){
	    		err("请选择是否原创!");
	    		return false;
	    	}else if(!root){
	    		err("作者不能为空!");
	    		return false;
	    	}else if(!hit){
	    		err("默认点击量不能为空!");
	    		return false;
	    	}
	    	$("#editA").attr("disabled",true);
	    	$.ajax({
	    		type:"post",
	    		url:"/Admin/Article/articleEditH",
	    		async:true,
	    		data:{"a_img":img,"a_id":aid,"a_title":title,"a_remark":remark,"a_keyword":keyword,"pid":tag,"a_time":time,"a_content":content,"a_view":show,"a_hit":hit,"a_original":org,"a_author":root},
				success:function(data){
					if(data.error==0){
						succ("修改文章完成!",data.msg,"/Admin/Article/articleList");
					}else{
						err(data.msg);
						$("#editA").removeAttr('disabled');
					}
				},
				eerror:function(data){
					err("网络错误!");
					$("#editA").removeAttr('disabled');
				}
	    	});
	    });
	});
</script>
</body>
</html>