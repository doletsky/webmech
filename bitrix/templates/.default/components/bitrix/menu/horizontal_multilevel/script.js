$(document).ready(function(){
    var curElmenu={};
    if($('#header-menu-list').children().children('.active').length>0){
        curElmenu=$('#header-menu-list').children().children('.active');
        $('section.filter-section').children('.white-bg-wrapper:not(.wrapper-equip)').css('padding-bottom','15px');
        $('section.filter-section').attr('class','filter-section '+curElmenu.attr('class').split(' ')[1]+'-filter');

//        console.log(curElmenu.attr('class').split(' ')[1]);
    }else{
        if($('.blog_top_breadcrumbs a:eq(1)').length>0){
            var sec_link=$('.blog_top_breadcrumbs a:eq(1)').attr('href');
            curElmenu=$('.header-menu-item-link[href="'+sec_link+'"]');
            curElmenu.addClass('active');
            $('section#back-slogan').attr('class',curElmenu.attr('class').split(' ')[1]+'-section');
        }

    }

    $('li.header-menu-item').on('mouseout',function(){
        $(this).children('ul.show').removeClass('show');
    });
    $('li.header-menu-item').on('mouseover',function(){
        if(curElmenu.length>0)curElmenu.removeClass('active');
        $(this).children('ul').addClass('show');
        $(this).children('a').addClass('active');
    });
    $('.header-menu-item-link').click(function(){
        if($(this).parent().children('ul').length>0)return false;
    });
    $('#header-menu-list').on('mouseout',function(){
        $('#header-menu-list').find('.active').removeClass('active');
        if(curElmenu.length>0)curElmenu.addClass('active');
    });

});



function showSubmenu (e){

//    if($(e).parent('li').children('ul').hasClass('show')){
////        $(e).parent('li').children('ul').removeClass('show');
////        $(e).parent('li').children('a').removeClass('active');
//    }
//else{
////        $('ul.show').removeClass('show');
////        $('a.active').removeClass('active');
//        $(e).parent('li').children('ul').addClass('show');
//        $(e).parent('li').children('a').addClass('active');
//    }
}

//var jshover = function()
//{
//	var menuDiv = document.getElementById("horizontal-multilevel-menu")
//	if (!menuDiv)
//		return;
//
//	var sfEls = menuDiv.getElementsByTagName("li");
//	for (var i=0; i<sfEls.length; i++)
//	{
//		sfEls[i].onmouseover=function()
//		{
//			this.className+=" jshover";
//		}
//		sfEls[i].onmouseout=function()
//		{
//			this.className=this.className.replace(new RegExp(" jshover\\b"), "");
//		}
//	}
//}
//
//if (window.attachEvent)
//	window.attachEvent("onload", jshover);