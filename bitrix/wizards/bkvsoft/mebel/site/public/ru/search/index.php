<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск по сайту");?>
<article class="text-section text-quote clearfix m-center inforow">
            <section>
<div style="padding: 50px ;">

<style>
.search-page input[type=text]{
    width: 80%;
}
.search-page input[type=submit]{
    padding: 7px !important;
}
</style>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"tags",
	Array(
		"USE_SUGGEST" => "N",
		"SHOW_RATING" => "N",
		"RATING_TYPE" => "",
		"PATH_TO_USER_PROFILE" => "",
		"AJAX_MODE" => "N",
		"RESTART" => "N",
		"NO_WORD_LOGIC" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "50",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"arrFILTER" => array("no"),
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?></div>
     </section>
        </article>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>