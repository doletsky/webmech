<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="content_search_box">
	<table>
		<tr>
			<td><?=GetMessage("SEARCH_TITLE")?></td>
			<td>
				<?$APPLICATION->IncludeComponent("bitrix:search.title", "eshop", array(
	"NUM_CATEGORIES" => "1",
	"TOP_COUNT" => "5",
	"ORDER" => "date",
	"USE_LANGUAGE_GUESS" => "Y",
	"CHECK_DATES" => "N",
	"SHOW_OTHERS" => "N",
	"PAGE" => "/books/",
	"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
	"CATEGORY_0" => array(
		0 => "iblock_books",
	),
	"CATEGORY_0_iblock_books" => array(
		0 => "9",
	),
	"SHOW_INPUT" => "Y",
	"INPUT_ID" => "title-search-input",
	"CONTAINER_ID" => "search",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"PRICE_VAT_INCLUDE" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"SHOW_PREVIEW" => "Y",
	"PREVIEW_WIDTH" => "75",
	"PREVIEW_HEIGHT" => "75",
	"CONVERT_CURRENCY" => "Y",
	"CURRENCY_ID" => "RUB"
	),
	false
);?>
			</td>
		</tr>
	</table>
</div>