<?php
//000000000010a:24:{s:4:"a_id";s:3:"115";s:5:"a_img";s:28:"/Upload/Thumb/1457318139.jpg";s:7:"a_title";s:27:"PHP获取时间戳的毫秒";s:8:"a_remark";s:106:"php获取时间戳就是time()函数，那么当我们需要毫秒级别的时间的时候怎么获取呢?";s:9:"a_keyword";s:16:"毫秒,PHP时间";s:3:"pid";s:1:"1";s:6:"a_time";s:10:"1456495260";s:9:"a_content";s:1802:"<p>php获取时间的方式是time();<br/></p><p>那么如果是涉及游戏或者其他需要精细的时间，那么怎么获取呢？</p><pre class="brush:php">&nbsp;/**&nbsp;获取当前时间戳，精确到毫秒&nbsp;*/
function&nbsp;microtime_float()
{
&nbsp;&nbsp;&nbsp;list($usec,&nbsp;$sec)&nbsp;=&nbsp;explode(&quot;&nbsp;&quot;,&nbsp;microtime());
&nbsp;&nbsp;&nbsp;return&nbsp;((float)$usec&nbsp;+&nbsp;(float)$sec);
}
/**&nbsp;格式化时间戳，精确到毫秒，x代表毫秒&nbsp;*/
function&nbsp;microtime_format($tag,&nbsp;$time)
{
&nbsp;&nbsp;&nbsp;list($usec,&nbsp;$sec)&nbsp;=&nbsp;explode(&quot;.&quot;,&nbsp;$time);
&nbsp;&nbsp;&nbsp;$date&nbsp;=&nbsp;date($tag,$usec);
&nbsp;&nbsp;&nbsp;return&nbsp;str_replace(&#39;x&#39;,&nbsp;$sec,&nbsp;$date);
}</pre><p><br/>使用方法：<br/>1.&nbsp;获取当前时间戳(精确到毫秒)：microtime_float()<br/>2.&nbsp;时间戳转换时间：microtime_format(&#39;Y年m月d日&nbsp;H时i分s秒&nbsp;x毫秒&#39;,&nbsp;1270626578.66000000)&nbsp;<br/></p><p>这里需要用到的是list()函数</p><blockquote><p>list（）定义和用法</p></blockquote><p style="margin-top: 12px; margin-bottom: 0px; padding: 0px; border: 0px; line-height: 18px; font-family: Verdana, Arial, 宋体; font-size: 12px; white-space: normal; background-color: rgb(249, 249, 249);">list() 函数用于在一次操作中给一组变量赋值。</p><p class="note" style="margin-top: 12px; margin-bottom: 0px; padding: 0px; border: 0px; line-height: 18px; font-family: Verdana, Arial, 宋体; font-size: 12px; white-space: normal; background-color: rgb(249, 249, 249);"><span style="margin: 0px; padding: 0px; border: 0px; font-weight: bold;">注释：</span>该函数只用于数字索引的数组，且假定数字索引从 0 开始。</p><p><br/></p>";s:6:"a_view";s:1:"2";s:5:"a_hit";s:3:"125";s:10:"a_original";s:1:"1";s:6:"a_from";s:5:"Win 7";s:8:"a_author";s:6:"隆航";s:4:"a_ip";s:9:"127.0.0.1";s:5:"a_num";s:1:"0";s:4:"t_id";s:1:"1";s:6:"t_name";s:12:"学习笔记";s:6:"t_time";s:10:"1447661369";s:6:"t_sort";s:3:"100";s:6:"t_view";s:1:"1";s:8:"t_remark";s:51:"自己学习上的一些笔记总结和经验分享";s:4:"t_ip";s:15:"111.172.255.211";s:6:"t_from";s:5:"Win 7";s:6:"t_root";s:5:"admin";}
?>