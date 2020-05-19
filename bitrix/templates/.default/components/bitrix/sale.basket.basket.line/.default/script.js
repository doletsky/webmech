function updateTopBasket(inc)
{
    var count = parseInt($('.quantity-item').html());
    if (inc == true)
    {
        if (count == 0)
        {
            $('.cart-link').attr('href', '/cart/');
        }
        $('.cart-link .quantity-item').html(count + 1);
    }
    else
    {
        if (count == 1)
        {
            $('.cart-link').removeAttr('href');
        }
        $('.cart-link .quantity-item').html(count - 1);
    }
}

function go2basketHead(link)
{
    var url = window.window.location.href.toString();
//    url = url.replace("http://www.indigos.ru","").replace("http://dindigos.inxl.biz","").replace("http://localhost:6449","");
    setCookie("CONTINUE_BUY", url, {'path' : '/'});
    dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel': 'HeaderLink',
        'eventCallback': function() {
            document.location.href = link;}});
}

function LoadCartButtonInCart(){
    var items = $('#basket_contains').val();
    if(items){
        items = items.split(",");
        var btns = $("a[name='button_add']");
        if(btns){
            for(i=0; i < btns.length; i++){
                num_val = btns[i].id.substr('button_add_'.length);
                if(items.indexOf(num_val)>=0){
                    change_button(num_val, true);
                }
            }
        }
    }
    var btns = $("a[name='button_to_cart']");
    if(btns){
        for(i=0; i < btns.length; i++){
            num_val = btns[i].id.substr('button_add_'.length);
            if(!items || items.indexOf(num_val)<0){
                change_button(num_val, false);
            }
        }
    }
}
function change_button(id, in_basket){
    if(in_basket)
    {
        $('#button_add_' + id).css('background','#4c7221').text('В корзине');
        $('#button_add_' + id).attr("href", 'javascript:dataLayer.push({\'event\':\'gaEvent\', \'eventCategory\':\'Cart\', \'eventAction\':\'CartView\', \'eventLabel\': \'CIList\'});go2basket("/cart/")');
    }
    else{
        $('#button_add_' + id).css('background','rgb(99, 156, 35)').text('Купить');
        $('#button_add_' + id).attr("href", 'javascript:add2basket('+id+')');
    }
}
$(document).ready(function(){
    LoadCartButtonInCart();
});