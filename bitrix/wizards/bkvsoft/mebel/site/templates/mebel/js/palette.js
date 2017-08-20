var AppPalette = (function(){

    var $body = $(document.body),
        $palette = $('<div id="palette"/>'),
        $paletteStructure = '<a href="" id="palette-toggle"><img src="images/ico-settings.png" alt=""></a>' +
        '<div class="pa-row">' +
        '<div class="pa-label">Color Skin</div>' +
        '<nav class="pa-radio" id="pa-skin">' +
        '<a href="" class="active" id="skin-light" style="background-color: #E6E6E6;"></a>' +
        '<a href="" id="skin-dark" style="background-color: #2D2D2D;"></a>' +
        '</nav>' +
        '</div>',
        $stylize = $('<style id="palette-style"/>'),
        $stylizeStructure = '#palette{position:fixed;left:-120px;top:10%;z-index:9999;background-color:#212121;width:120px;border-radius:0 0 4px 0;padding:28px 21px;}#palette-toggle{width:50px;height:50px;text-align:center;position:absolute;right:-50px;display:block;line-height:50px;font-size:1px;top:0;border-radius:0 4px 4px 0;background-color:#212121;}#palette-toggle img{vertical-align:middle; -webkit-transition:all 4s ease;-ms-transition:all 4s ease;transition:all 4s ease;-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);}#palette-toggle:hover img{-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}.pa-row{margin-bottom:30px;float:left;width:100%;}.pa-row:last-child{margin-bottom:0;}.pa-col.pa-wide{float:left;width:141px;}.pa-col.pa-thin{float:right;width:62px;}.pa-label{font-size:15px;color:#666;line-height:1;margin-bottom:10px;}.pa-radio a{float:left;width:31px;height:31px;position:relative;}.pa-radio a:first-child{border-radius:2px 0 0 2px;}.pa-radio a:last-child,.pa-radio a:nth-child(7){border-radius:0 2px 2px 0;}.pa-radio a:nth-child(8){border-radius:0 0 0 2px;}#pa-skin a:first-child{border-radius:2px 0 0 2px;}#pa-skin a:last-child{border-radius:0 0 2px;}.pa-radio a.active:after{position:absolute;width:10px;height:7px;display:block;content:" ";top:13px;left:11px;}#pa-skin a.active:after{background:url(images/ico-color-active.png);}#palette .chosen-container,#palette .chosen-container .chosen-drop{background-color:#404040;border:0;border-radius:2px; line-height:31px; max-width: 141px;}#palette .chosen-container .chosen-results{padding:0;}#palette .chosen-container-single .chosen-single,#palette .chosen-container .chosen-results li{border:0;font-size:15px;color:#ccc;line-height:31px;} #palette .chosen-single{height: 31px;}',
        $P,
        $S,
        timer = 500;

    return {
        init: function(){
            this.creating();
        },
        creating: function(){
            $body.append($palette);
            $body.append($stylize);

            $P = $('#palette');
            $S = $('#palette-style');
            $P.prepend($paletteStructure);
            $S.prepend($stylizeStructure);

            $Pwid = $P.outerWidth();

            $P.on('click', 'a', function(e){
                e.preventDefault();
            });

            // Panel Toggle
            this.toggleF();

            // Cookie Functions
            this.skinCookie();
        },
        toggleF: function(){
            $P.on('click', '#palette-toggle', function(){
                if (parseInt($P.css('left')) === 0 ) {
                    $P.stop(true, true).animate({'left': -$Pwid}, timer);
                } else {
                    $P.stop(true, true).animate({'left': 0}, timer);
                }
            });
        },
        skinCookie: function(){
            var skin = $.cookie('skin'),
                $navSkin = $('#pa-skin');

            $navSkin.children().on('click', function(){
                var $this = $(this),
                    theme = $this.attr('id');

                $this.addClass('active').siblings().removeClass('active');
                $body.removeClass('skin-light skin-dark').addClass(theme);

                $.cookie('skin',theme);

            });

            if (skin) {
                $navSkin.find('a[id='+skin+']').addClass('active').siblings().removeClass('active');
                if (skin == 'skin-light') {
                    $body.removeClass('skin-light skin-dark');
                } else {
                    $body.addClass(skin);
                }
            }

        }
    }
})();

AppPalette.init();