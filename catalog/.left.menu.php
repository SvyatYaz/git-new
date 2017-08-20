<?
global $APPLICATION;
$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
"IS_SEF" => "Y",
"SEF_BASE_URL" => "",
"SECTION_PAGE_URL" => "?SECTION_ID=#ID#",
"DETAIL_PAGE_URL" => "?SECTION_ID=#ID#&ELEMENT_ID=#ID#",
"IBLOCK_TYPE" => "tip",
"IBLOCK_ID" => "47",
"DEPTH_LEVEL" => "",
"CACHE_TYPE" => "A",
"CACHE_TIME" => "36000000"
),
false
);

$aMenuLinks = array_merge(
$aMenuLinks,
$aMenuLinksExt 
);
?>