var s = window.s || {};

s.getLocation = function(){
	return history.location || document.location || window.location;
};

s.share = {};
s.share.links = {
	vk: 'https://vk.com/share.php?url=',
	fb: 'https://www.facebook.com/sharer/sharer.php?u=',
	ok: 'https://connect.ok.ru/offer?url='
};
s.share.og = function(){
	var list = {};

	$('head').find("meta[property^='og:']").each(function(){
		list[this.getAttribute("property")] = this.getAttribute("content");
	});
	
	return list;
};
s.share.popup = function(src) {
	var width = 626;
	var height = 436; 
	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2;
	
	window.open(src, "", "toolbar=0,status=0,width="+width+",height="+height+",left="+left+",top="+top);
};
s.share.init = function(selector){
	$('body').on("click", selector, function(e){
		e.preventDefault();
		
		var resource = $(this).data("resource");
		var src = s.share.links[resource];
		if ( ! src) {
			return;
		}
		
		var og = s.share.og();
		var url = og["og:url"];
		if ( ! url) {
			url = s.getLocation().href;
		}
		
		src += encodeURIComponent(url);
		if (resource === "vk" && og["og:title"]) {
			src += "&title="+encodeURIComponent(og["og:title"]);
		}
		
		s.share.popup(src);
	});
};