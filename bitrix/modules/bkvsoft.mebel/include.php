<?
IncludeModuleLangFile(__FILE__); 	
class bkvsoft_mebel44
{
	function ShowPanel()
	{
	
	if ($GLOBALS["USER"]->IsAdmin() && COption::GetOptionString("main", "wizard_solution", "", SITE_ID) == "bkvsoft.mebel")
		{
			$GLOBALS["APPLICATION"]->AddPanelButton(array(
				"HREF" => "/bitrix/admin/wizard_install.php?lang=".LANGUAGE_ID."&wizardName=vbi:12volt&wizardSiteID=".SITE_ID."&".bitrix_sessid_get(),
				"ID" => "bkvsoft.mebel",
				"ICON" => "bx-panel-site-wizard-icon",
				"MAIN_SORT" => 2500,
				"TYPE" => "BIG",
				"SORT" => 10,	
				"ALT" => GetMessage("SCOM_BUTTON_DESCRIPTION"),
				"TEXT" => GetMessage("SCOM_BUTTON_NAME"),
				"MENU" => array(),
			));
		}
	
	
	}
}
?>