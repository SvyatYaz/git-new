<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>


        <article class="text-section text-quote clearfix m-center inforow">
            <section>
                <div class="col-sm-1 no-padding">
                    <div class="icon icon-xs" data-icon="-"></div>
                </div>
                <div class="col-sm-8">
                    <blockquote>
                    <?
            $APPLICATION->IncludeFile(
                SITE_DIR."include/404.php",
                Array(),
                Array("MODE"=>"html")
            );?>
                    
                    </blockquote>
                </div>
            </section>
        </article>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>