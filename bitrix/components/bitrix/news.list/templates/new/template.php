<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div>
	<form method="get">
		<a>Дата от:  <input type="date" name="fromdate"></a>
		<a>Дата по:  <input type="date" name="todate"></a>
		<input type="submit" value="поиск">
	</form>
</div>

<a href="?sort=name">По наименованию </a>
<a href="?sort=PROPERTY_AVTOR">По автору </a>
<a href="?sort=ACTIVE_FROM">По дате </a>

<div class="news-list">

	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>

<p><? if (isset($arItem["NAME"]) && isset($arItem["PREVIEW_PICTURE"])):?> </p>
<img
	class="preview_picture"
	border="0"
	src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
	width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
	height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
	alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
	title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
	style="float:left"
	/>
<?endif;?>


<?if(!empty($arItem["NAME"])):?>
<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><b><?=$arItem["NAME"]?></b></a><br />
<?endif;?>


<div>
<? if (!empty($arItem["NAME"])):?>
<?= $arItem["PREVIEW_TEXT"];?>
<?endif?>


<?if(!empty($arItem["PREVIEW_TEXT"])):?>
<p> <h4> <?=$arItem["PROPERTIES"]["AVTOR"]["VALUE"]?> </p> </h4>
<?endif;?>
<?=$arItem["ACTIVE_FROM"]?>

</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
<div class="clear"> </div>
