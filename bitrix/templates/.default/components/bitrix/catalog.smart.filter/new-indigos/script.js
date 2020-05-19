$(function() {
    $(".show-link").click(function(){
        var link = $(this);
        $("." + link.data("target")).slideDown(250);
        link.hide();
        link.next().show();
        return false;
    })
    $(".hide-link").click(function(){
        var link = $(this);
        $("." + link.data("target")).slideUp(250);
        link.hide();
        link.prev().show();
        return false;
    })
});

function JCSmartFilter(ajaxURL)
{
	this.ajaxURL = ajaxURL;
	this.form = null;
	this.timer = null;
}
JCSmartFilter.prototype.showLoader = function(element) {
	var modef = BX('modef');
	var modef_num = BX('modef_num');
	var show_link = BX('js-smart-filter-apply-button');
    element.position = BX.pos(element, true); 
	modef_num.innerHTML = '<img src="/images/smartfilter/loader.gif"/>';
	if(modef.style.display == 'none')
		modef.style.display = 'block';
		modef.style.top = element.position.top + 'px';
}

JCSmartFilter.prototype.getUrl = function(tabParam) {

		var minVal = $('#arrFilter_P1_MIN').val();
		var maxVal = $('#arrFilter_P1_MAX').val();

		var priceStr = '';

		var params = [];

		if (minVal && maxVal) {
			var priceStr = minVal+','+maxVal;
		} else if (minVal || maxVal) {
			if (minVal) {
				var priceStr = minVal+',99999';
			} else if(maxVal) {
				var priceStr = '0,'+maxVal;
			};
		};

		if (priceStr) {
			params.push('цена='+priceStr);
		};

	var getCheckboxValue = function(checkbox){
		var values = [];
		$(checkbox).each(function() {
			if ($(this).is(':checked')) {
				inputClass = $(this).data('value');
				values.push(inputClass);
			};
		});
		
		var s = values.join();
		return s.length == 0 ? null : s;
	};

    var paramsCheckbox = {
        CLASS: "класс",
        ED_TYPE: "тип",
        SUBJECT: "предмет",
        DL_COUNT: "скачиваний",
        YEAR: "возраст",
        LANG: "язык_интерфейса",
        POSTAVSHIK: "поставщик",
        PROP_16: "область_применения",
        PLATFORM: "платформа"
    };

    for (var containerId in paramsCheckbox){
        var checkboxValue = getCheckboxValue("#"+containerId+" input[type=checkbox]");
        if (checkboxValue != null){
            params.push(paramsCheckbox[containerId]+"="+checkboxValue);
        }
    }
//	var rdyClassStr = getCheckboxValue('#CLASS input[type=checkbox]');
//	var rdyTypeStr = getCheckboxValue('#ED_TYPE input[type=checkbox]');
//	var rdySubjStr = getCheckboxValue('#SUBJECT input[type=checkbox]');
//	var rdyDownStr = getCheckboxValue('#DL_COUNT input[type=checkbox]');
//	var rdyAgeStr = getCheckboxValue('#YEAR input[type=checkbox]');
//    var rdyLangStr = getCheckboxValue('#LANG input[type=checkbox]');
    var rdyScreenStr = getCheckboxValue('#SCREEN_IDS input[type=radio]');
//
//	if (rdyClassStr != null) {
//		params.push('класс='+rdyClassStr);
//	};
//
//	if (rdyTypeStr != null) {
//		params.push('тип='+rdyTypeStr);
//	};
//
//	if (rdySubjStr != null) {
//		params.push('предмет='+rdySubjStr);
//	};
//
//	if (rdyDownStr != null) {
//		params.push('скачиваний='+rdyDownStr);
//	};
//	if (rdyAgeStr != null) {
//		params.push('возраст='+rdyAgeStr);
//	};
//
//    if (rdyLangStr != null) {
//        params.push('язык интерфейса='+rdyLangStr);
//    };

    if ((rdyScreenStr != null) && (rdyScreenStr.length>0)) {
        params.push('скриншоты=есть');
    };




	if(!tabParam)
		tabParam = $('.filter-tabs-item.active').text();

	if(tabParam){
		params.push('направление='+tabParam.trim());
	} else {
		params.push('направление=обучение');
	};

	if (params) {
		var rdyLink = '/catalog.php?'+params.join('&')+'#filter-tabs';
	};

	$('#js-smart-filter-apply-button').attr("href", rdyLink.toLowerCase());
	return rdyLink.toLowerCase();
}


JCSmartFilter.prototype.keyup = function(input) {
    this.showLoader(input);

    this.getUrl();

	if(this.timer)
		clearTimeout(this.timer);
	this.timer = setTimeout(BX.delegate(function(){
		this.reload(input);
	}, this), 1000);
}

JCSmartFilter.prototype.click = function(checkbox){
	this.getUrl();
	this.showLoader(checkbox);

	if(this.timer)
		clearTimeout(this.timer);
	this.timer = setTimeout(BX.delegate(function(){
		this.reload(checkbox);
	}, this), 1000);
}

JCSmartFilter.prototype.reload = function(input){
	this.position = BX.pos(input, true);
	this.form = BX.findParent(input, {'tag':'form'});
	if(this.form)
	{
		var values = new Array;
		values[0] = {name: 'ajax', value: 'y'};
		this.gatherInputsValues(values, BX.findChildren(this.form, {'tag':'input'}, true));
		BX.ajax.loadJSON(
			this.ajaxURL,
			this.values2post(values),
			BX.delegate(this.postHandler, this)
		);
	}
}

JCSmartFilter.prototype.postHandler = function (result){
    if(result.ITEMS)
	{
		for(var PID in result.ITEMS)
		{
			var arItem = result.ITEMS[PID];
			if(arItem.PROPERTY_TYPE == 'N' || arItem.PRICE)
			{
			}
			else if(arItem.VALUES)
			{
				for(var i in arItem.VALUES)
				{
					var ar = arItem.VALUES[i];
					var control = BX(ar.CONTROL_ID);
					if(control)
					{
						control.parentNode.className = ar.DISABLED? 'lvl2 lvl2_disabled': 'lvl2';
					}
				}
			}
		}
		var modef = BX('modef');
		var modef_num = BX('modef_num');
		if(modef && modef_num)
		{
			modef_num.innerHTML = result.ELEMENT_COUNT;
			var hrefFILTER = BX.findChildren(modef, {tag: 'A'}, true);

			//if(result.FILTER_URL && hrefFILTER)
				//hrefFILTER[0].href = BX.util.htmlspecialcharsback(result.FILTER_URL) + '#filter-tabs';

			if(result.FILTER_AJAX_URL && result.COMPONENT_CONTAINER_ID)
			{
				BX.bind(hrefFILTER[0], 'click', function(e)
				{
					var url = BX.util.htmlspecialcharsback(result.FILTER_AJAX_URL);
					BX.ajax.insertToNode(url, result.COMPONENT_CONTAINER_ID);
					return BX.PreventDefault(e);
				});
			}

			if (result.INSTANT_RELOAD && result.COMPONENT_CONTAINER_ID)
			{
				var url = BX.util.htmlspecialcharsback(result.FILTER_AJAX_URL);
				BX.ajax.insertToNode(url, result.COMPONENT_CONTAINER_ID);
			}
			else
			{
				if(modef.style.display == 'none')
					modef.style.display = 'block';
				//modef.style.top = this.position.top + 'px';
			}
		}
	}
}

JCSmartFilter.prototype.gatherInputsValues = function (values, elements)
{
	if(elements)
	{
		for(var i = 0; i < elements.length; i++)
		{
			var el = elements[i];
			if (el.disabled || !el.type)
				continue;

			switch(el.type.toLowerCase())
			{
				case 'text':
				case 'textarea':
				case 'password':
				case 'hidden':
				case 'select-one':
					if(el.value.length)
						values[values.length] = {name : el.name, value : el.value};
					break;
				case 'radio':
				case 'checkbox':
					if(el.checked)
						values[values.length] = {name : el.name, value : el.value};
					break;
				case 'select-multiple':
					for (var j = 0; j < el.options.length; j++)
					{
						if (el.options[j].selected)
							values[values.length] = {name : el.name, value : el.options[j].value};
					}
					break;
				default:
					break;
			}
		}
	}
}

JCSmartFilter.prototype.values2post = function (values)
{
	var post = new Array;
	var current = post;
	var i = 0;
	while(i < values.length)
	{
		var p = values[i].name.indexOf('[');
		if(p == -1)
		{
			current[values[i].name] = values[i].value;
			current = post;
			i++;
		}
		else
		{
			var name = values[i].name.substring(0, p);
			var rest = values[i].name.substring(p+1);
			if(!current[name])
				current[name] = new Array;

			var pp = rest.indexOf(']');
			if(pp == -1)
			{
				//Error - not balanced brackets
				current = post;
				i++;
			}
			else if(pp == 0)
			{
				//No index specified - so take the next integer
				current = current[name];
				values[i].name = '' + current.length;
			}
			else
			{
				//Now index name becomes and name and we go deeper into the array
				current = current[name];
				values[i].name = rest.substring(0, pp) + rest.substring(pp+1);
			}
		}
	}
	return post;
}
