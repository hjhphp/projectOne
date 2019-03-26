<?php
//000000000010a:24:{s:4:"a_id";s:3:"112";s:5:"a_img";s:28:"/Upload/Thumb/1450067094.jpg";s:7:"a_title";s:32:"支付宝即时交易整合TP3.2";s:8:"a_remark";s:261:"因为公司的项目需要用到支付宝的即时交易，而且个人是有轻微强迫症，不太喜欢把不相关的集成到一起，所以这里单独整合了支付宝的即时交易，和担保交易很类似的，于是写下来方便之后再用。";s:9:"a_keyword";s:22:"即时交易,支付宝";s:3:"pid";s:1:"1";s:6:"a_time";s:10:"1450065488";s:9:"a_content";s:13440:"<p>做支付宝或者其他第三方的都需要去申请接口，需要自己的去申请的。</p><p><span style="color: rgb(255, 0, 0);">即时交易需要企业支付宝和备案号的网站，而且网站是建设的完全。</span></p><blockquote><p>注册地址：<a href="https://www.alipay.com/" _src="https://www.alipay.com/">https://www.alipay.com/</a> </p></blockquote><p>注册的时候选择企业版的支付宝，然后按照他的流程注册，注册完成后就可以去 <span style="color: rgb(255, 0, 0);">产品商店</span> 去签约 <span style="color: rgb(255, 0, 0);">即时交易&nbsp;</span>了</p><p style="text-align:center"><img src="/Upload/20151214/1450066035717394.png" title="1450066035717394.png" alt="blob.png"/></p><p>签约之后就是等待了，在这里就可以去整合支付宝了，等申请的 KEY 和 PID 下来就可以测试了。</p><p>支付宝签约后的即时交易下载包地址：（我自己留了一份）<a href="http://pan.baidu.com/s/1pJRcYvT" _src="http://pan.baidu.com/s/1pJRcYvT">http://pan.baidu.com/s/1pJRcYvT</a> </p><p>下载好之后解压-文件里面有详细的说明，这里目录我就不一一介绍了，自己看说明文档</p><p>第一步就是完成集成，所以需要做的是：</p><p style="text-align: center;"><img src="/Upload/20151214/1450066119162449.png" title="1450066119162449.png" alt="blob.png"/></p><blockquote><p>文件重命名</p></blockquote><pre class="brush:php">alipay_core.function.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Corefunction.php
alipay_notify.class.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notify.php
alipay_submit.class.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit.php
alipay_md5.function.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Md5function.php</pre><p>这样的话就符合TP的命名方式了。</p><blockquote><p>修改文件</p></blockquote><p>其中 Notify.php 和 Md5function.php 需要删除前面引入的两行代码</p><pre class="brush:php">require_once(&quot;alipay_core.function.php&quot;);
require_once(&quot;alipay_md5.function.php&quot;);</pre><p>然后把文件放入&nbsp;<span style="color: rgb(255, 0, 0);">\ThinkPHP\Library\Vendor\Alipay</span> 目录下</p><blockquote><p>增加配置文件</p></blockquote><p>把 签名文件 <span style="color: rgb(255, 0, 0);">cacert.pem</span> 放在网站的跟目录</p><p>然后再对应需要支付的模块的conf/config.php中添加支付宝的参数：(没申请下来这里就先预留)</p><pre class="brush:php">	&#39;alipay_config&#39;		=&gt;	array(									//支付宝配置参数
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;partner&#39;&nbsp;		=&gt;	&#39;2088021447698852&#39;,&nbsp;&nbsp;&nbsp;					//这里是你在成功申请支付宝接口后获取到的PID；
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;key&#39;			=&gt;	&#39;m94r73neschynziad6kx3ovgu19p0ikn&#39;,		//这里是你在成功申请支付宝接口后获取到的Key
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;sign_type&#39;		=&gt;	strtoupper(&#39;MD5&#39;),
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;input_charset&#39;	=&gt;	strtolower(&#39;utf-8&#39;),
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;cacert&#39;		=&gt;	getcwd().&#39;\\cacert.pem&#39;,				//liunx这里需要注意&nbsp;\\&nbsp;和&nbsp;/&nbsp;在liunx的区别
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;transport&#39;		=&gt;	&#39;http&#39;,
	&nbsp;&nbsp;&nbsp;&nbsp;&#39;seller_email&#39;	=&gt;	&#39;mingyu_lmy@foxmail.com&#39;,				//&nbsp;这里是你的收款账号，
	),
	
	&#39;alipay&#39;&nbsp;&nbsp;	&nbsp;		=&gt;	array(
		&#39;notify_url&#39;	=&gt;	&#39;http://www.7fei.wang/Home/Alipay/notifyurl&#39;,
		&#39;return_url&#39;	=&gt;	&#39;http://www.7fei.wang/Home/Alipay/returnurl&#39;,	&nbsp;	
	),</pre><blockquote><p>添加逻辑方法</p></blockquote><pre class="brush:php">&lt;?php
//&nbsp;+----------------------------------------------------------------------
//&nbsp;|&nbsp;ThinkPHP&nbsp;[&nbsp;WE&nbsp;CAN&nbsp;DO&nbsp;IT&nbsp;JUST&nbsp;THINK&nbsp;IT&nbsp;]
//&nbsp;+----------------------------------------------------------------------
//&nbsp;|&nbsp;Copyright&nbsp;(c)&nbsp;2015&nbsp;http://ming-yu.com&nbsp;All&nbsp;rights&nbsp;reserved.
//&nbsp;+----------------------------------------------------------------------
//&nbsp;|&nbsp;Licensed&nbsp;(&nbsp;http://www.apache.org/licenses/LICENSE-2.0&nbsp;)
//&nbsp;+----------------------------------------------------------------------
//&nbsp;|&nbsp;Author:&nbsp;long&nbsp;&lt;admin@loveteemo.com&gt;
//&nbsp;+----------------------------------------------------------------------
namespace&nbsp;Home\Controller;
use&nbsp;Think\Controller;
class&nbsp;AlipayController&nbsp;extends&nbsp;Controller{
	
	/**
	&nbsp;*&nbsp;函数说明：引入支付宝参数
	&nbsp;*/
	public&nbsp;function&nbsp;&nbsp;_initialize(){
		vendor(&#39;Alipay.Corefunction&#39;);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vendor(&#39;Alipay.Md5function&#39;);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vendor(&#39;Alipay.Notify&#39;);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vendor(&#39;Alipay.Submit&#39;);&nbsp;
	}
	
	/**
	&nbsp;*&nbsp;函数说明：生成订单-支付
	&nbsp;*&nbsp;传递参数：
	&nbsp;*&nbsp;$_POST[&#39;WIDout_trade_no&#39;];&nbsp;	商户订单号
	&nbsp;*&nbsp;$_POST[&#39;WIDsubject&#39;];&nbsp;		订单名称&nbsp;必填
	&nbsp;*&nbsp;$_POST[&#39;WIDtotal_fee&#39;];		付款金额&nbsp;必填
	&nbsp;*&nbsp;$_POST[&#39;WIDbody&#39;];			订单描述&nbsp;&nbsp;
	&nbsp;*&nbsp;$_POST[&#39;WIDshow_url&#39;];		商品展示地址&nbsp;
	&nbsp;*/
	//生成订单
	public&nbsp;function&nbsp;dowithpay(){
		if(!IS_POST){
			$this-&gt;error(&quot;非法请求&quot;);
		}
		$info&nbsp;				=		xxx;//根据传递的订单号，信息查询
		if(!$info){
			$this-&gt;error(&quot;参数非法&quot;);
		}&nbsp;
		$alipay_config		=		C(&#39;alipay_config&#39;);		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$payment_type&nbsp;		=&nbsp;		&quot;1&quot;;							//支付类型&nbsp;必填，不能修改&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$notify_url&nbsp;		=&nbsp;		C(&#39;alipay.notify_url&#39;);			//服务器异步通知页面路径&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$return_url&nbsp;		=&nbsp;		C(&#39;alipay.return_url&#39;);			//页面跳转同步通知页面路径
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$out_trade_no&nbsp;		=&nbsp;		$info[&#39;onumber&#39;];				//商户订单号&nbsp;商户网站订单系统中唯一订单号，必填
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$subject&nbsp;			=&nbsp;		$info[&#39;oname&#39;];					//订单名称&nbsp;必填
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$total_fee&nbsp;			=&nbsp;		$info[&#39;opay&#39;];					//付款金额&nbsp;必填
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$body&nbsp;				=&nbsp;		$info[&#39;oname&#39;];					//订单描述&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$show_url&nbsp;			=&nbsp;		&#39;&#39;;								//商品展示地址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$anti_phishing_key&nbsp;	=&nbsp;		&quot;&quot;;								//防钓鱼时间戳
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$exter_invoke_ip&nbsp;	=&nbsp;		&quot;&quot;;								//非局域网的外网IP地址，如：221.0.0.1
		/************************************************************/
		$parameter&nbsp;			=&nbsp;		array(
				&quot;service&quot;&nbsp;			=&gt;&nbsp;&quot;create_direct_pay_by_user&quot;,
				&quot;partner&quot;&nbsp;			=&gt;&nbsp;trim($alipay_config[&#39;partner&#39;]),
				&quot;seller_email&quot;&nbsp;		=&gt;&nbsp;trim($alipay_config[&#39;seller_email&#39;]),
				&quot;payment_type&quot;		=&gt;&nbsp;$payment_type,
				&quot;notify_url&quot;		=&gt;&nbsp;$notify_url,
				&quot;return_url&quot;		=&gt;&nbsp;$return_url,
				&quot;out_trade_no&quot;		=&gt;&nbsp;$out_trade_no,
				&quot;subject&quot;			=&gt;&nbsp;$subject,
				&quot;total_fee&quot;			=&gt;&nbsp;$total_fee,
				&quot;body&quot;				=&gt;&nbsp;$body,
				&quot;show_url&quot;			=&gt;&nbsp;$show_url,
				&quot;anti_phishing_key&quot;	=&gt;&nbsp;$anti_phishing_key,
				&quot;exter_invoke_ip&quot;	=&gt;&nbsp;$exter_invoke_ip,
				&quot;_input_charset&quot;	=&gt;&nbsp;trim(strtolower($alipay_config[&#39;input_charset&#39;]))
		);
		//建立请求
		$alipaySubmit&nbsp;		=&nbsp;		new&nbsp;\AlipaySubmit($alipay_config);
		$html_text&nbsp;			=&nbsp;		$alipaySubmit-&gt;buildRequestForm($parameter,&quot;get&quot;,&nbsp;&quot;确认&quot;);
		echo&nbsp;$html_text;
	}
	
	/**
	&nbsp;*&nbsp;函数说明：支付宝回调异步函数
	&nbsp;*&nbsp;附带操作数据库
	&nbsp;*/
	public&nbsp;function&nbsp;notifyurl(){		
		header(&quot;Content-Type:text/html;charset=utf-8&quot;);&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$alipay_config		=	C(&#39;alipay_config&#39;);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$alipayNotify&nbsp;		=&nbsp;	new&nbsp;\AlipayNotify($alipay_config);
		$verify_result&nbsp;		=	$alipayNotify-&gt;verifyNotify();			//计算得出通知验证结果
		if($verify_result)&nbsp;{											//验证成功	
			$out_trade_no&nbsp;	=	$_POST[&#39;out_trade_no&#39;];					//商户订单号			
			$trade_no&nbsp;		=	$_POST[&#39;trade_no&#39;];						//支付宝交易号		
			$trade_status&nbsp;	=	$_POST[&#39;trade_status&#39;];					//交易状态	
		&nbsp;&nbsp;&nbsp;&nbsp;if($_POST[&#39;trade_status&#39;]&nbsp;==&nbsp;&#39;TRADE_FINISHED&#39;)&nbsp;{
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
					//如果有做过处理，不执行商户的业务程序
					//用户登陆支付宝的时候把支付宝的订单存入数据库，而状态修改为&nbsp;98
					//M(&#39;order&#39;)-&gt;where(array(&quot;onumber&quot;=&gt;$out_trade_no,&quot;ostatic&quot;=&gt;98))-&gt;save(array(&quot;ostatic&quot;=&gt;1,&quot;etime&quot;=&gt;time()));					
				//注意：
				//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
		&nbsp;&nbsp;&nbsp;&nbsp;}
		&nbsp;&nbsp;&nbsp;&nbsp;else&nbsp;if&nbsp;($_POST[&#39;trade_status&#39;]&nbsp;==&nbsp;&#39;TRADE_SUCCESS&#39;)&nbsp;{
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
					//如果有做过处理，不执行商户的业务程序
					M(&#39;order&#39;)-&gt;where(array(&quot;onumber&quot;=&gt;$out_trade_no,&quot;ostatic&quot;=&gt;0))-&gt;save(array(&quot;opaynumber&quot;=&gt;$trade_no,&quot;ostatic&quot;=&gt;1));
					
				//注意：
				//付款完成后，支付宝系统发送该交易状态通知
				//logResult(&quot;付款完成，订单号：&quot;.$out_trade_no&nbsp;.&quot;,支付宝交易号：&quot;.$trade_no.&quot;,交易状态：&quot;.$trade_status.&quot;&quot;);
		&nbsp;&nbsp;&nbsp;&nbsp;}
			echo&nbsp;&quot;success&quot;;												//请不要修改或删除
		}else&nbsp;{
		&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;&quot;fail&quot;;												//验证失败
		}
	}

	/**
	&nbsp;*&nbsp;函数说明：支付宝成功支付后的转跳页面
	&nbsp;*&nbsp;
	&nbsp;*/
	public&nbsp;function&nbsp;returnurl(){
		header(&quot;Content-Type:text/html;charset=utf-8&quot;);&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$alipay_config		=	C(&#39;alipay_config&#39;);
		$alipayNotify&nbsp;		=	new&nbsp;\AlipayNotify($alipay_config);
		$verify_result&nbsp;		=	$alipayNotify-&gt;verifyReturn();
		if($verify_result)&nbsp;{											//验证成功
			$out_trade_no&nbsp;	=	$_GET[&#39;out_trade_no&#39;];					//商户订单号
			$trade_no&nbsp;		=	$_GET[&#39;trade_no&#39;];						//支付宝交易号
			$trade_status	=	$_GET[&#39;trade_status&#39;];					//交易状态
		&nbsp;&nbsp;&nbsp;&nbsp;if($_GET[&#39;trade_status&#39;]&nbsp;==&nbsp;&#39;TRADE_FINISHED&#39;&nbsp;||&nbsp;$_GET[&#39;trade_status&#39;]&nbsp;==&nbsp;&#39;TRADE_SUCCESS&#39;)&nbsp;{
				redirect(U(&#39;Home/Member/orderpay&#39;,array(&quot;onumber&quot;=&gt;$out_trade_no)));
		&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;		else&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			echo&nbsp;&quot;trade_status=&quot;.$_GET[&#39;trade_status&#39;];
&nbsp;&nbsp;&nbsp;&nbsp;		}
			echo&nbsp;&quot;验证成功&lt;br&nbsp;/&gt;&quot;;
		}
		else&nbsp;{
		&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;&quot;验证失败&quot;;
		}
	}
		
}</pre><p>到这里基本算完成了，需要等到申请的 KEY 和 PID 下来就可以测试了，需要注意的是：<br/></p><p><span style="color: rgb(255, 0, 0);">notifyurl需要在服务器上才能用，本地测试这里写的任何逻辑是无效的。</span></p><p>文章写到这里基本完成了，自己做过的东西拿出来分享，有疑问请留言告诉我，谢谢~</p>";s:6:"a_view";s:1:"2";s:5:"a_hit";s:3:"594";s:10:"a_original";s:1:"1";s:6:"a_from";s:5:"Win 7";s:8:"a_author";s:6:"隆航";s:4:"a_ip";s:13:"111.172.247.5";s:5:"a_num";s:1:"0";s:4:"t_id";s:1:"1";s:6:"t_name";s:12:"学习笔记";s:6:"t_time";s:10:"1447661369";s:6:"t_sort";s:3:"100";s:6:"t_view";s:1:"1";s:8:"t_remark";s:51:"自己学习上的一些笔记总结和经验分享";s:4:"t_ip";s:15:"111.172.255.211";s:6:"t_from";s:5:"Win 7";s:6:"t_root";s:5:"admin";}
?>