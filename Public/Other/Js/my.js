function succ(title,msg,url){
	$.gritter.add({
		title:	title,
		text:	msg,
		time: 200,  
		speed:1000,
		sticky: false,
		after_close: function(){
			window.location.href=url;
		}
	});
}

function err(msg){
		$.gritter.add({
		title:	"错误!",
		text:	msg,
		time: 1000,  
		speed:1000,
		sticky: false,
	});
}
	