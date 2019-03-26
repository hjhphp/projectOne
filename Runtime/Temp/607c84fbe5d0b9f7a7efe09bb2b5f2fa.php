<?php
//000000000010a:24:{s:4:"a_id";s:3:"110";s:5:"a_img";s:28:"/Upload/Thumb/1457318158.jpg";s:7:"a_title";s:24:"PHP实现下载TXT文件";s:8:"a_remark";s:214:"在项目有终于到一个问题，就是当我用a链接打开的是文件的时候大部分是可以下载的，在TXT的时候却是在浏览器中直接打开，于是在网上找了下下载TXT文件的方法";s:9:"a_keyword";s:19:"下载TXT,PHP下载";s:3:"pid";s:1:"1";s:6:"a_time";s:10:"1449643683";s:9:"a_content";s:1506:"<p>在项目有终于到一个问题，就是当我用a链接打开的是文件的时候大部分是可以下载的，在TXT的时候却是在浏览器中直接打开，于是在网上找了下下载TXT文件的方法</p><p>首先是看下效果图：</p><p style="text-align:center"><img src="/Upload/20151209/1449643851536989.png" title="1449643851536989.png" alt="blob.png"/></p><p>要实现的效果是：</p><p style="text-align:center"><img src="/Upload/20151209/1449643867176044.png" title="1449643867176044.png" alt="QQ截图20151209144614.png"/></p><p>这里用到的函数：</p><pre class="brush:php">&lt;?php
function&nbsp;download($filename){
//检测是否设置文件名和文件是否存在&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;((isset($filename))&amp;&amp;(file_exists($filename))){&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header(&quot;Content-length:&nbsp;&quot;.filesize($filename));&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header(&#39;Content-Type:&nbsp;application/octet-stream&#39;);&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header(&#39;Content-Disposition:&nbsp;attachment;&nbsp;filename=&quot;&#39;&nbsp;.&nbsp;$filename&nbsp;.&nbsp;&#39;&quot;&#39;);&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;readfile(&quot;$filename&quot;);&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;&quot;文件不存在!&quot;;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;
}
download(&#39;./now.txt&#39;);</pre><p><br/></p>";s:6:"a_view";s:1:"2";s:5:"a_hit";s:3:"544";s:10:"a_original";s:1:"1";s:6:"a_from";s:5:"Win 7";s:8:"a_author";s:6:"隆航";s:4:"a_ip";s:9:"127.0.0.1";s:5:"a_num";s:1:"0";s:4:"t_id";s:1:"1";s:6:"t_name";s:12:"学习笔记";s:6:"t_time";s:10:"1447661369";s:6:"t_sort";s:3:"100";s:6:"t_view";s:1:"1";s:8:"t_remark";s:51:"自己学习上的一些笔记总结和经验分享";s:4:"t_ip";s:15:"111.172.255.211";s:6:"t_from";s:5:"Win 7";s:6:"t_root";s:5:"admin";}
?>