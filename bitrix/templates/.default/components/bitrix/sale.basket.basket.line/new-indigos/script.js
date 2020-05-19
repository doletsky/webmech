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