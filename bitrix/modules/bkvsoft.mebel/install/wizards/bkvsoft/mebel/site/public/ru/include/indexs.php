<?$APPLICATION->IncludeComponent(
	"bitrix:news.line",
	"slaider",
	Array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCKS" => array("#slider_IBLOCK_ID#"),
		"NEWS_COUNT" => "999",
		"FIELD_CODE" => array("PREVIEW_TEXT","PREVIEW_PICTURE","SILKA",""),
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"DETAIL_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300",
		"CACHE_GROUPS" => "Y",
		"ACTIVE_DATE_FORMAT" => ""
	)
);?>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.line",
	"index",
	Array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCKS" => array("#katalogtovarov_IBLOCK_ID#"),
		"NEWS_COUNT" => "9",
		"FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", ""),
		"SORT_BY1" => "ID",
		"SORT_ORDER1" => "RAND",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "",
		"DETAIL_URL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "300",
		"CACHE_GROUPS" => "Y",
		"ACTIVE_DATE_FORMAT" => ""
	)
);?>