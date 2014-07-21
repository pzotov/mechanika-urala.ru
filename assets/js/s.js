$(function(){
	if( typeof(thankyou)!="undefined" ) $.fancybox($(".thankyou"),{
		padding: 2,
		wrapCSS: 'thanks'
	});

	$(".menu__item").each(function(idx){
		idx++;
		$(this).prepend('<span class="menu__item-cnt">'+(idx<10 ? ('0'+idx) : idx )+'.</span>');
	});

	$(".catalog__item").mouseenter(function(){
		$(this).addClass("catalog__item_hover");
	}).mouseleave(function(){
		$(this).removeClass("catalog__item_hover");
	});

	$(".fancybox").fancybox({
		afterLoad:function(){
			if(this.type=='ajax') this.content = this.content.replace(/\?isNaked=1/,'');
		},
		padding: 2,
		helpers: {
			overlay: {
				locked: false
			}
		}
	});
});

