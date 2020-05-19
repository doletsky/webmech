$(document).ready(function(){

	var scrollLinks = [];
	var countElemsInBasket = 0;
    var basketSum = 0;
	var pre_id;
	var basketButton = $(".basketbox_content_topline_button");
	var canCloseBasket = true;
	var canCloseBasketItem = true;

	function countObjectProperty(obj){

		i=0;
		for(k in obj){
			i++;
		}

		return i;

	}

	function closeBasket(){

		

		if(canCloseBasket == true){

			$(".basketbox_wrapper").css("display","none");

			$.each(scrollLinks, function(i){
				this.destroy();
			});

			scrollLinks = [];
			$(".basketbox_content").removeAttr("style");
			$(".basketbox_content_items").removeAttr("style");
			$(".basketbox_content_preloader").removeAttr("style");
			$(".basketbox_content_message").removeAttr("style");

			$(".basketbox_content_items").unbind("click");

			basketButton.removeClass("disabled");

			clearInterval(pre_id);

		}

	}

	$(".basketbox_bg").click(function(){

		closeBasket();

	});

	$(".basketbox_header_close").click(function(){

		closeBasket();
        $('.basketbox_note_update').css('display','none');

	});

	$(".basketbox_content_topline_button").click(function(event){

		event.preventDefault();

		var link = $(this).attr("href");

		if(!$(this).hasClass("disabled")){
            $.post('/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/importing.php',function(data){
                if(data==1){
                    $('.basketbox_note_update').css('display','none');
                    location.href=link;
                }
            });
            $('.basketbox_note_update').css('display','block');
            return false;
		}

	});



	$(".cart-link").click(function(event){
		event.preventDefault();

        if(!event.isTrigger){
            dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'HeaderLink', 'eventAdd':null});
        }

		var preloader = $(".basketbox_content_preloader").find("img");
		var plat_img_macos = "/img/basket/macos.png";
		var plat_img_ios = "/img/basket/ios.png";
		var plat_img_windows = "/img/basket/windows.png";
		var plat_img_android = "/img/basket/android.png";
		var imagesArray =[];

		var docHeight = $(document).height();
		var dHeight = $(window).height();
		var basketContentObj = $(".basketbox_content");
		var basketItemsObj = $(".basketbox_content_items");
		var basketContentHeight;
		var basketItemsHeight;
		var topLineHeight = 100;

		imagesArray.push(plat_img_macos);
		imagesArray.push(plat_img_ios);
		imagesArray.push(plat_img_windows);
		imagesArray.push(plat_img_android);

		$.ajax({
			url: "/bitrix/templates/.default/basket_json.php",
			type: "POST",
			dateType: "json",
			data: {},
			beforeSend: function(){

				var i = 0;
				canCloseBasket = false;

				$(".basketbox_content_topline").css("display", "none");
				$(".basketbox_content_items").empty();
				$(".basketbox_content_items").css("display","none");
				$(".basketbox_content_preloader").css("display", "block");
				
				preloader.attr("status","true");


				pre_id = setInterval(function(){

					i = i + 1;
					preloader.css("transform", "rotate(" + i +"deg)");


				}, 20);
				

			},
			success: function(obj, status, xhr){

				data = JSON.parse(obj);

				sum = data["sum"];

				$(".basketbox_content_topline_totalprice_count").find("span").text(sum);

				delete data.sum;

				countElemsInBasket = countObjectProperty(data);
                basketSum = sum;

				if(countElemsInBasket == 0){

								basketButton.addClass("disabled");

								$(".basketbox_content_items").css("display","none");

								$(".basketbox_content_message").css("display", "block");

				} else {

								for(k in data){


										id = k
										name = data[k].name;
										about = data[k].text;
										type = data[k].type;
										subject = data[k].subject;
										price = data[k].price;
                                        quantity = data[k].quantity;

										if(data[k].platform == null || data[k].platform == ""){
											plat = null;
										} else {
											regExp = new RegExp(" ", "g");
											strPlat = data[k].platform.toLowerCase().replace(regExp,"");
											plat = strPlat.split(",");
										}

										pic = data[k].pic;
										link = data[k].link;
										interval = data[k].interval;
                                        var arItemId=link.split('/');
                                        var eventId='';
                                        if(arItemId[1]=='products'){eventId=arItemId[2];}
                                        else {eventId='P'+arItemId[2];}

                                        imagesArray.push("/" + pic);

										var itembox = $("<div>");
										itembox.attr("class", "basketbox_content_item");

										var picbox = $("<div>").attr("class","basketbox_content_item_picbox");
										var picbox_img = $("<img>").attr("alt","").attr("src", pic);
										var picbox_border = $("<div>").attr("class","basketbox_content_item_picbox_picborder");
										picbox.append(picbox_img).append(picbox_border);

										var infobox = $("<div>").attr("class","basketbox_content_item_infobox");
										var infobox_name = $("<div>").attr("class", "basketbox_content_item_infobox_name");
										var infobox_pred = $("<div>").attr("class", "basketbox_content_item_infobox_pred");
										var infobox_type = $("<div>").attr("class", "basketbox_content_item_infobox_type");

										infobox_name.html("<a href=\"" + link + "\">" + name + "</a>");
										infobox_pred.html(subject).append(" - " + interval);
										infobox_type.html(type);

										if(plat != null){
											var infobox_platform = $("<div>").attr("class", "basketbox_content_item_infobox_platform");
											var infobox_platform_label = $("<div>").attr("class", "basketbox_content_item_infobox_platform_label");
											var infobox_platform_item = $("<li>");

											infobox_platform_label.text("Доступно для скачивания:");

											infobox_platform.append(infobox_platform_label);
											infobox_platform.append($("<ul>"));

											infobox_platform_item.append("<img alt=\"\" src=\"\">");
											infobox_platform_item.append("<span></span>");


											
											if(plat.indexOf("macos") != -1){
												var infobox_platform_item_this = infobox_platform_item.clone();

												infobox_platform_item_this.find("img").attr("src", plat_img_macos);
												infobox_platform_item_this.find("span").text("MacOS");

												infobox_platform.find("ul").append(infobox_platform_item_this);
											}

											if(plat.indexOf("ios") != -1){
												var infobox_platform_item_this = infobox_platform_item.clone();

												infobox_platform_item_this.find("img").attr("src", plat_img_ios);
												infobox_platform_item_this.find("span").text("iOS");

												infobox_platform.find("ul").append(infobox_platform_item_this);
											}

											if(plat.indexOf("windows") != -1){
												var infobox_platform_item_this = infobox_platform_item.clone();

												infobox_platform_item_this.find("img").attr("src", plat_img_windows);
												infobox_platform_item_this.find("span").text("Windows");

												infobox_platform.find("ul").append(infobox_platform_item_this);
											}

											if(plat.indexOf("android") != -1){
												var infobox_platform_item_this = infobox_platform_item.clone();

												infobox_platform_item_this.find("img").attr("src", plat_img_android);
												infobox_platform_item_this.find("span").text("Android");

												infobox_platform.find("ul").append(infobox_platform_item_this);
											}

										}



										infobox.append(infobox_name);
										infobox.append(infobox_pred);
										infobox.append(infobox_type);
										infobox.append(infobox_platform);

                                        var quantitybox=$("<div>").attr("class","basketbox_content_item_quantity");
                                        quantitybox.append("<input type='text' value=' " + parseInt(quantity) + "' name='quantity_"+k+"'>");

                                        var quantityctrl=$('<div>').attr("class","basketbox_content_item_quantity_ctrl");
                                        quantityctrl.append('<div class="basketbox_content_item_quantity_ctrl_up"></div><div class="basketbox_content_item_quantity_ctrl_down"></div>');

										var pricebox = $("<div>").attr("class", "basketbox_content_item_price item_price");
										pricebox.append("<span>" + price + "</span> р.");

                                        var itempricebox = $("<div>").attr("class", "basketbox_content_item_price sum_price");
                                        itempricebox.append("<span>" + (price*quantity) + ".00</span> р.");

										var closeButton =	$("<div>").attr("class", "basketbox_content_item_close");
										var clearBox = $("<div>").attr("class", "basketbox_clear");

										itembox.attr("itemid", id);
                                        itembox.attr("eventid", eventId);
										itembox.append(picbox);
										itembox.append(infobox);
                                        itembox.append(quantitybox);
                                        itembox.append(quantityctrl);
										itembox.append(pricebox);
                                        itembox.append(itempricebox);
										itembox.append(closeButton);
										itembox.append(clearBox);

										$(".basketbox_content_items").append(itembox);
								}

								$(".basketbox_content_items").css("display", "block");

				}

                $(".basketbox_content_items").on("keyup", ".basketbox_content_item_quantity", function()
                {

                    var curquan=$(this).children('input').val();
                    var qid=$(this).parent("div").attr('itemid');
                    var sum=curquan*parseInt($(this).parent("div").children("div.item_price").children("span").html());
                    $(this).parent("div").children("div.sum_price").children("span").html(sum+'.00');
                    var allItem=0;
                    $("div.sum_price").each(function(){
                        allItem+=parseInt($(this).children("span").html());
                    });
                    $(".basketbox_content_topline_totalprice_count").children("span").html(allItem);
                    $.post('/bitrix/templates/.default/edit_quantity_basket.php',{id:qid, quan: curquan});
                });

                $(".basketbox_content_items").on("click", ".basketbox_content_item_quantity_ctrl_up", function()
                {
                    var input=$(this).parent().parent().children().children('input');
                    var quant=parseInt(input.val())+1;
                    input.val(quant);
                    input.keyup();
                });
                $(".basketbox_content_items").on("click", ".basketbox_content_item_quantity_ctrl_down", function()
                {
                    var input=$(this).parent().parent().children().children('input');
                    if(parseInt(input.val())>1){
                        var quant=parseInt(input.val())-1;
                        input.val(quant);
                        input.keyup();
                    }

                });

				canCloseBasket = true;

				$(".basketbox_content_items").on("click", ".basketbox_content_item_close", function(){

					if(canCloseBasketItem){

							canCloseBasketItem = false;

							var thisElem = $(this);
							var itemId = thisElem.parents(".basketbox_content_item").attr("itemId");
		                    var contId = thisElem.parents(".basketbox_content_item").attr("eventid");
							var parent = thisElem.parents(".basketbox_content_item");

							canCloseBasket = false;

							$.ajax({
								url: "/bitrix/components/indigos/sale.order.basket/component.php",
								type: "POST",
								dateType: "json",
								data: {
										AJAX : 'Y', 
										TYPE : 'DELETE', 
										ID : itemId
									},
									success: function(obj, status, xhr){

		                                dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartRemove', eventLabel:'', 'eventAdd':{'ContentId': contId} });

										res = obj.split("#");
										$(".basketbox_content_topline_totalprice_count").find("span").text(res[2]);
		                                basketSum = res[2];
		                                var listCartId=$('.quantity-item').attr('incart');
		                                if(listCartId!=null) {$('.quantity-item').attr('incart',listCartId.replace(itemId+',',''));}
		                                $('.btn-in-cart').css('display','none');
		                                $('.btn-buy').css('display','inline');
		                                if(listCartId!=null) {updatebb();}

									}

							});

							countElemsInBasket--;

							$(".cart-link > .quantity-item").text(countElemsInBasket);

							parent.animate({
								"opacity": "0"
							}, 500);
							
							setTimeout(function(){
								parent.animate({
									"height" : "0"
								},250);
								setTimeout(function(){
									parent.remove();
									$(".basketbox_content_items").jScrollPane();
									if(countElemsInBasket == 0){
										$(".basketbox_content_items").css("display", "none");
										$(".basketbox_content_preloader").css("display", "none");
										$(".basketbox_content_message").css("display", "block");
										basketButton.addClass("disabled");
									}
									canCloseBasket = true;
									canCloseBasketItem = true;
									}, 250);
							}, 500);

					}
				
				});

				clearInterval(pre_id);

				$(".basketbox_content_preloader").css("display", "none");

				$(".basketbox_content_topline").css("display", "block");

				scrollLinks.push($(".basketbox_content_items").jScrollPane().data().jsp);

			}
		});


		$(".basketbox_wrapper > .basketbox_bg").css("height", docHeight + "px");

		$(".basketbox_wrapper").css("display","block");

		basketContentHeight = basketContentObj.height();
		basketItemsHeight = basketItemsObj.height();

		if(dHeight < 780){

			step = 780 - dHeight;
			newSize = basketContentHeight - step;

			if(newSize < 345){
				newSize = 345
			}

			newSizeItems = newSize - topLineHeight - 12;

			basketContentObj.css("height", newSize + "px");
			basketItemsObj.css("height", newSizeItems + "px");

		} else {

			newSizeItems = basketContentHeight - topLineHeight - 12;

			basketItemsObj.css("height", newSizeItems + "px");

		}


	});

    $('.basketbox_order_to_print').click(function(){
        var userEmail='not authorized';
        var strTab='';
        if($('#user_email_add').val().length>0){
            userEmail=$('#user_email_add').val();
        }
        strTab='\n#DATA#, распечатан, User email: '+userEmail+'\nНаименование;Количество;Цена;Сумма\n';
        strPrnTable='<tr><td>Наименование</td><td>Количество</td><td>Цена</td><td>Сумма</td></tr>';
        $('.basketbox_content_item').each(function(){
            strTab+=$(this).children('.basketbox_content_item_infobox').children('.basketbox_content_item_infobox_name').children('a').html()+';';
            strPrnTable+='<tr><td>'+$(this).children('.basketbox_content_item_infobox').children('.basketbox_content_item_infobox_name').children('a').html()+'</td>';
            strTab+=$(this).children('.basketbox_content_item_quantity').children('input').val()+';';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_quantity').children('input').val()+'</td>';
            strTab+=$(this).children('.basketbox_content_item_price.item_price').children('span').html()+' руб.;';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_price.item_price').children('span').html()+' руб.</td>';
            strTab+=$(this).children('.basketbox_content_item_price.sum_price').children('span').html()+' руб.\n';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_price.sum_price').children('span').html()+' руб.</td></tr>';

        });
        strTab+=';Итого:;'+$('.basketbox_content_topline_totalprice_count span').html()+' руб.;\n';
        strPrnTable+='<tr><td></td><td>Итого:</td><td>'+$('.basketbox_content_topline_totalprice_count span').html()+' руб.</td><td></td></tr>';

        $.post(
            '/cart/logBasketPRNorEmail.php',
            {'strParam':strTab});
        winPrn=window.open('');
        winPrn.document.write('<head></head><body><table border="1">'+strPrnTable+'</table></body>');
        winPrn.print();

    });
    $('.basketbox_order_to_email').click(function(){
        $('.basketbox_order_to_email_for_send').css('display','block');
    });
    $('.basketbox_order_to_email_send_send').click(function(){
        var email=$('.basketbox_order_to_email_for_send input').val();
        var userEmail='not authorized';
        var strTab='';
        if($('#user_email_add').val().length>0){
            userEmail=$('#user_email_add').val();
        }
        strTab='\n#DATA#, отправлен на '+email+', User email: '+userEmail+'\nНаименование;Количество;Цена;Сумма\n';
        strPrnTable='<tr><td>Наименование</td><td>Количество</td><td>Цена</td><td>Сумма</td></tr>';
        $('.basketbox_content_item').each(function(){
            strTab+=$(this).children('.basketbox_content_item_infobox').children('.basketbox_content_item_infobox_name').children('a').html()+';';
            strPrnTable+='<tr><td>'+$(this).children('.basketbox_content_item_infobox').children('.basketbox_content_item_infobox_name').children('a').html()+'</td>';
            strTab+=$(this).children('.basketbox_content_item_quantity').children('input').val()+';';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_quantity').children('input').val()+'</td>';
            strTab+=$(this).children('.basketbox_content_item_price.item_price').children('span').html()+' руб.;';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_price.item_price').children('span').html()+' руб.</td>';
            strTab+=$(this).children('.basketbox_content_item_price.sum_price').children('span').html()+' руб.\n';
            strPrnTable+='<td>'+$(this).children('.basketbox_content_item_price.sum_price').children('span').html()+' руб.</td></tr>';

        });
        strTab+=';Итого:;'+$('.basketbox_content_topline_totalprice_count span').html()+' руб.;\n';
        strPrnTable+='<tr><td></td><td>Итого:</td><td>'+$('.basketbox_content_topline_totalprice_count span').html()+' руб.</td><td></td></tr>';

        $.post(
            '/cart/logBasketPRNorEmail.php',
            {'strParam':strTab});


        $.post(
            '/bitrix/templates/new-indigos/components/bitrix/sale.order.ajax/dpi/strPostToMail.php',
            {'strParam':strPrnTable, 'email':email});
        $('.basketbox_order_to_email_for_send').css('display','none');
    });
    $('.basketbox_order_to_email_for_send_close').click(function(){
        $('.basketbox_order_to_email_for_send').css('display','none');
    });

});