$(document).ready(function(){
    $('.expandable_text').each(function(){
        var t = parseInt($(this).css('lineHeight'));
        $(this).attr('data-height',$(this).height());
        $(this).css({'height': t*6,'overflow':'hidden'});
        $(this).after('<div class="text_expand"><span>Полное описание</span></div>');
    });

    $('.qa_more').click(function(event){
        event.stopPropagation();
        event.preventDefault();
        $(this).parents('.expandable_text').find('.qa_dots, .qa_more').hide().siblings('.hidden_qa').slideDown();
    });

    $('.text_expand span').live('click',function(){
        var h=parseInt($(this).parents('.text_expand').siblings('.expandable_text').attr('data-height'));
        $(this).parents('.text_expand').siblings('.expandable_text').attr('data-height',$(this).parents('.text_expand').siblings('.expandable_text').height()).animate({'height':h},200);
        if(!$(this).hasClass('expanded')){
            $(this).addClass('expanded').text('Свернуть');
        }
        else{
            $(this).removeClass('expanded').text('Полное описание');
        }
    })
});