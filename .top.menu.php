<?
$aMenuLinks = Array(
	Array(
		"Главная", 
		"/index.php",
		Array(), 
		Array("class"=>"icon-home icons"), 
		"" 
	),
	Array(
		"О проекте",
		"/promo/",
		Array(),
		Array("class"=>"icon-docs icons"),
		""
	),
    Array(
        "Каталог тренингов",
        "/catalog/",
        Array(),
        Array("class"=>"icon-layers icons"),
        ""
    ),
	Array(
		"Статьи", 
		"/articles/", 
		Array(), 
		Array("class"=>"icon-docs icons"), 
		"" 
	),
	Array(
		"Учеба", 
		"/learning/", 
		Array(), 
		Array("class"=>"icon-graduation icons"),
		"" 
	),
	Array(
		"Сервис", 
		"/service/", 
		Array(), 
		Array("class"=>"lnr lnr-magic-wand"), 
		"" 
	),
	Array(
		"Личный кабинет", 
		"/profile/", 
		Array(), 
		Array("class"=>"lnr lnr-user"), 
		"\$USER->IsAuthorized()" 
	),
	Array(
		"Авторизация", 
		"/profile/?login=yes", 
		Array(), 
		Array("class"=>"lnr lnr-enter"), 
		"!\$USER->IsAuthorized()" 
	)
);
?>