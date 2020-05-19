<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
<!--<div id="--><?//echo $CONTAINER_ID?><!--">-->
    <div class="page_head_search">
        <form action="<?echo $arResult["FORM_ACTION"]?>" class="page_head_search_form">
            <input type="text" id="<?echo $INPUT_ID?>" name="q" size="40" maxlength="50" autocomplete="off" value="<?if (isset($_REQUEST["q"])) echo htmlspecialcharsbx($_REQUEST["q"])?>" placeholder="<?=GetMessage("CT_BST_SEARCH_BUTTON")?>"/>
            <input type="submit" value="" name="s">
        </form>
    </div>
<!--</div>-->

<?endif?>
<script type="text/javascript">
var jsControl = new JCTitleSearch({
	//'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif',
	'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
	'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
	'INPUT_ID': '<?echo $INPUT_ID?>',
	'MIN_QUERY_LEN': 2
});

	$("#<?=$INPUT_ID?>").attr("value", "<?if (isset($_REQUEST["q"])) echo htmlspecialcharsbx($_REQUEST["q"])?>");
</script>
