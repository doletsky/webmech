$(function(){
    // Slider code: use .slider-wrapper as parent element, place buttons into it
    // and use .slider-item for slides
    // for buttons use .nav-prev, .nav-next

    function showHideButton(slider){
        if(slider.find('.slider-item:last').is(":visible")){
            slider.find('.nav-next').hide();
        }
        else{
            slider.find('.nav-next').show();
        }

        if(slider.find('.slider-item:first').is(":visible")){
            slider.find('.nav-prev').hide();
        }
        else{
            slider.find('.nav-prev').show();
        }
    }

    var shownSlides = 3;
    var slideStep = 3;
    $('.slider-wrapper').each(function(){
        $(this).find('.slider-item:gt( ' + (shownSlides - 1) + ' )').hide();
        showHideButton($(this));
    });

    $('.slider-wrapper .nav-next').click(function(event){
        event.preventDefault();
        var slider = $(this).parents('.slider-wrapper');

        var firstShownElem = slider.find('.slider-item:visible:first');
        var firstShownElemIndex = slider.find('.slider-item').index(firstShownElem);
        slider.find('.slider-item').hide();
        //проверка, что вылетели за край слайдера и можем показать последние 3 элемента
        if (firstShownElemIndex + shownSlides + slideStep >= slider.find('.slider-item').length){
            slider.find('.slider-item:gt(' + (-1 - shownSlides) + ')').show();
        } else {
            slider.find('.slider-item').slice(firstShownElemIndex + slideStep,
                firstShownElemIndex + slideStep + shownSlides).show();
        }
        showHideButton(slider);
    });

    $('.slider-wrapper .nav-prev').click(function(event){
        event.preventDefault();
        var slider = $(this).parents('.slider-wrapper');

        var firstShownElem = slider.find('.slider-item:visible:first');
        var firstShownElemIndex = slider.find('.slider-item').index(firstShownElem);
        slider.find('.slider-item').hide();
        //проверка, что вылетели за пределы слайдера и можем показать первые 3 элемента
        if (firstShownElemIndex - slideStep <= 0){
            slider.find('.slider-item:lt(' + shownSlides + ')').show();
        } else {
            slider.find('.slider-item').slice(firstShownElemIndex - slideStep,
                firstShownElemIndex - slideStep + shownSlides).show();
        }
        showHideButton(slider);
    });


    if($(".product-about-wrap").hasClass("littlebox")){

        var parent = $(".product-about-wrap");
        var list = parent.find(".product-detailed-content").find("ul");

        parent.removeClass("littlebox");
        list.data("listheight",list.height());
        parent.addClass("littlebox");

    }

    $(".product-detail-content-show a").click(function(event){

        event.preventDefault();

        var thislink = $(this);
        var parent = thislink.parents(".product-about-wrap");
        var list = thislink.parents(".product-detailed-content").find("ul");
        var listheight = list.data("listheight");

        if(parent.hasClass("littlebox")){

            list.animate({
                height: listheight 
            }, 500);

            setTimeout(function(){
                parent.removeClass("littlebox");
                thislink.text("Свернуть");
                setTimeout(function(){
                    list.removeAttr("style");
                }, 50);
            }, 500);


        } else {

            list.animate({
                height: 190 
            }, 500);

            setTimeout(function(){
                parent.addClass("littlebox");
                thislink.text("Развернуть");
                setTimeout(function(){
                    list.removeAttr("style");
                }, 50);
            },500);

        }

    });

});