 $(document).ready(function() {
            $('#minibasket').load('/ajax/litelbasket.php');
            });
  
  
function ajaxcoment() { //Отправка коментария
    var msg = $("#comentform").serialize();
    $.ajax({
        type: "POST",
        url: "/ajax/comment.php",
        data: msg,
        success: function(data) {
            $("#results").html(data);
        },
        error:  function(xhr, str){
            alert("Возникла ошибка!");
        }
    });
} ;

  function ajaxaddcat() { //Добавления в корзинку
    var msg = $("#addcat").serialize();
    $.ajax({
        type: "POST",
        url: "/ajax/addcat.php",
        data: msg,
        success: function(data) {
            $("#resaddcat").html(data);
            $('#minibasket').load('/ajax/litelbasket.php');
            $('#addcat').css('display', 'none'); 
      
        },
        error:  function(xhr, str){
            alert("Возникла ошибка!");
        }
    });
} ;

function ajaxreg() { //Регистрация
    var msg = $("#regform").serialize();
    $.ajax({
        type: "POST",
        url: "/ajax/reg.php",
        data: msg,
        success: function(data) {
            $("#results").html(data);
        },
        error:  function(xhr, str){
            alert("Возникла ошибка!");
        }
    });
} ;
    

function addzakaz() { //Оформления заказа
    var msg = $("#addzakaz").serialize();
    $.ajax({
        type: "POST",
        url: "/ajax/reszakaz.php",
        data: msg,
        success: function(data) {
            $("#reszakaz").html(data);
        },
        error:  function(xhr, str){
            alert("Возникла ошибка!");
        }
    });
} ; 


(function ($, window, document) {
    'use strict';
    var pluginName = "Aisconverse",
        defaults = {
            sliderFx: 'crossfade',		// Slider effect. Can be 'slide',
                                        // 'fade', 'crossfade', 'directscroll'
            sliderInterval: 6000,		// Interval
            speedAnimation: 600,        // Default speed of the animation
            scrollTopButtonOffset: 500, // when scrollTop Button will show
            locations: [51.5134476, -0.1159143],    // contact map center coords
            mapZoom: 11                             // map zoom
        },
        $win = $(window),
        $html = $('html'),
        onMobile = false;

    // The plugin constructor
    function Plugin(element, options) {
        var that = this;
        that.element = $(element);
        that.options = $.extend({}, defaults, options);

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            onMobile = true;
            $(document.body).addClass('mobile');
        } else {
            $(document.body).addClass('no-mobile');
        }

        that.init();

        // onLoad function
        $win.load(function(){
            $('#status').fadeOut(defaults.speedAnimation);
            $('#preloader').delay(defaults.speedAnimation)
                .fadeOut(defaults.speedAnimation/2);

            if (that.body.hasClass('error404')){
                $html.addClass('html404');
            }

            that.activate();
            that.sliders();
            that.countUp();
            that.sendform();
            that.fResize();

            if ($win.scrollTop() > $('.header').outerHeight() - 50){
                $('.sidemenu-toggle').css('top', 50);
            } else if ($win.width() > 640){
                $('.sidemenu-toggle').css('top', 360);
            } else if ($win.width() < 640){
                $('.sidemenu-toggle').css('top', 430);
            }

        }).scroll(function(){  // onScroll function
            that.countUp();

            ($win.scrollTop() > defaults.scrollTopButtonOffset) ?
            (that.scrTop.fadeIn(defaults.speedAnimation)) :
            (that.scrTop.fadeOut(defaults.speedAnimation));

            if ($win.scrollTop() > $('.header').outerHeight() - 50){
                $('.sidemenu-toggle').css('top', 50);
            } else{
                $('.sidemenu-toggle').css('top', 360);
            }

        }).resize(function(){  // onResize function
            if (that.modal.length === 1) {
                that.modal.height($win.height());
            }

            that.fResize();
        });
    }

    Plugin.prototype = {
        init: function () {
            this.body = $(document.body);
            this.wrapper = $('.wrapper');
            this.slider = $('.slider');
            this.oneslider = $('.oneslider');
            this.gallery = $('.gallery');
            this.internalLinks = $('.internal');
            this.audio = $('audio');
            this.select = $('select');
            this.scrTop = $('.scrolltop');
            this.mask = $('.mask');
            this.faqGroup = $('.faq-group');
            this.faqBody = this.faqGroup.find('.panel-body');
            this.expandLink = $('.expand-link');
            this.collapseLink = $('.collapse-link');
            this.map = $('#map');
            this.mapPopup = $('#map-popup');
            this.modal = $('.modal');
            this.magnific = $('.magnific');
            this.magnificWrap = $('.magnific-wrap');
            this.magnificGallery = $('.magnific-gallery');
            this.magnificVideo = $('.magnific-video');
            this.addCart = $('.add-cart');
            this.jslider = $('.jslider');
            this.rating = $('.raty');
            this.counting = $('.counting');
            this.product = $('.product');
            this.quantity = $('.product-quantity');
            this.minus = $('.minus');
            this.plus = $('.plus');
            this.remove = $('.remove');
            this.navCategory = $('.nav-category');
            this.countup = $('.countup');
            this.mixList = $('.mix-list');
            this.tabLink = $('.tab-link');
        },
        activate: function () {
            var instance = this;

            if (instance.audio.length > 0){
                instance.audio.mediaelementplayer();
            }

            instance.internalLinks.on('click', function(e){
                e.preventDefault();
                var $this = $(this),
                    url = $this.attr('href'),
                    urlTop = $(url).offset().top;

                $('body, html').stop(true, true)
                    .animate({ scrollTop: urlTop },
                    instance.options.speedAnimation);

                setTimeout(function(){
                    window.location.hash = url;
                }, instance.options.speedAnimation);
            });

            // Custom Select
            if (instance.select.length > 0){
                instance.select.chosen({width: '100%'});
            }

            // Custom input[type=range]
            if (instance.jslider.length > 0) {
                instance.jslider.slider({
                    from: 0,
                    to: 1000,
                    step: 1,
                    limits: false,
                    scale: [0, 1000],
                    dimension: "$&nbsp;"
                });
            }

            // RATING
            if (instance.rating.length > 0){
                instance.rating.raty({
                    half: true,
                    starType: 'i',
                    readOnly   : function() {
                        return $(this).data('readonly');
                    },
                    score: function() {
                        return $(this).data('score');
                    },
                    starOff: 'fa fa-star-o',
                    starOn: 'fa fa-star',
                    starHalf: 'fa fa-star-half-o'
                });
            }

            instance.tabLink.on('click', function (e) {
                e.preventDefault();
                var $this = $(this),
                    hrf = $this.attr("href"),
                    top = $(hrf).parent().offset().top;

                $this.tab('show');
                $('.nav li').removeClass('active');

                setTimeout(function() {
                    $('.nav li a[href="' + $this.attr("href") + '"]').parent().addClass('active');
                }, 300);

                $('html, body').animate({scrollTop: top - 50}, instance.options.speedAnimation/2);
            });

           /* instance.addCart.on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                var self = $(this);
                if (self.text() == 'Remove'){
                    self.removeClass('active').text('Add to Cart');
                } else {
                    self.addClass('active').text('Remove');
                }
            });*/

            instance.product.on('click', function(){
                var self = $(this);
                window.location = self.find('h6 > a').attr('href');
            });

            if (instance.quantity.length > 0){
                instance.productQuantity();
            }

            instance.expandLink.on('click', function(e){
                e.preventDefault();
                instance.faqBody.collapse('show');
                instance.faqGroup.find('[data-toggle]').removeClass('collapsed');
            });

            instance.collapseLink.on('click', function(e){
                e.preventDefault();
                instance.faqBody.collapse({toggle: false});
                instance.faqBody.collapse('hide');
                instance.faqGroup.find('[data-toggle]').addClass('collapsed');
            });

            // scrollTop function
            if (instance.scrTop.length === 1) {
                instance.scrTop.click(function(e){
                    $('html, body').stop(true,true).animate({ scrollTop: 0 }, instance.options.speedAnimation);
                    e.preventDefault();
                });
            }

            if (instance.navCategory.length > 0){
                var hsh = window.location.hash.replace('#','.'),
                    worksNavArr = [];

                if (hsh == '.all' ) {
                    hsh = 'all';
                }

                instance.navCategory.find('li').each(function(){
                    var $this = $(this);
                    worksNavArr.push($this.children().data('filter'));
                });

                if (instance.mixList.length > 0){
                    instance.mixList.mixItUp({
                        load: {
                            filter: hsh !== '' ? hsh : 'all'
                        }
                    });
                }
            }

            instance.magnificWrap.each(function() {
                $(this).find(instance.magnific).magnificPopup({
                    type: 'image',
                    tLoading: '',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true
                    },
                    image: {
                        titleSrc: function (item) {
                            return item.el.attr('title');
                        }
                    }
                });
            });

            instance.magnificVideo.magnificPopup({
                type: 'iframe',
                fixedContentPos: true
            });

            instance.magnificGallery.on('click', function(e) {
                e.preventDefault();

                var $this = $(this),
                    items = [],
                    im = $this.data('gallery'),
                    imA = im.split(','),
                    imL = imA.length,
                    titl = $this.attr('title');

                for (var i = 0; i < imL; i++){
                    items.push({
                        src: imA[i]
                    });
                }

                $.magnificPopup.open({
                    items: items,
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    image: {
                        titleSrc: function () {
                            return titl;
                        }
                    }
                });
            });

            instance.remove.on('click', function(e){
                e.preventDefault();
                var $this = $(this);

                $this.parents('tr').fadeOut(instance.options.speedAnimation/2, function(){
                    $(this).remove();
                });
            });

            if (instance.map.length === 1){
                instance.contactMap();
                $('[data-target="#contact-modal"]').on('click', function(){
                    setTimeout(function(){
                        instance.contactMap();
                    }, instance.options.speedAnimation/2);
                });
            }

        },
        fResize: function(){
            if ($win.width() > 967) {
                $('.no-mobile .dropdown > a, .no-mobile .cart-list > a').on('mouseenter',function () {
                    $(this).parent().find('.dropdown-menu').stop(true, true).fadeIn(defaults.speedAnimation/2);
                });
                $('.no-mobile .dropdown, .no-mobile .cart-list').on('mouseleave', function () {
                    $(this).find('.dropdown-menu').stop(true, true).fadeOut(defaults.speedAnimation/2);
                });
            } else {
                $('.no-mobile .dropdown > a, .no-mobile .cart-list > a').off('mouseenter');
                $('.no-mobile .dropdown, .no-mobile .cart-list').off('mouseleave');
            }

            if ($win.height() < 800 || $win.width() < 1600){
                $('.footer.navbar-fixed-bottom').addClass('navbar-static');
            } else {
                $('.footer.navbar-fixed-bottom').removeClass('navbar-static');
            }
        },
        sliders: function(){
            var instance = this;


            if (instance.slider.length > 0){
                instance.slider.each(function(e){
                    var $this = $(this),
                        slidewrap = $this.find('ul:first'),
                        sliderFx = slidewrap.data('fx'),
                        sliderAuto = slidewrap.data('auto'),
                        sliderCircular = slidewrap.data('circular'),
                        sliderPrefix = '#slider-',
                        sliderItems = (!$this.hasClass('oneslider')) ?
                        {
                            width: 400,
                            height: 'variable',
                            visible : {
                                min : 1,
                                max : 5
                            }
                        } :
                        {
                            visible     : 1,
                            width       : 870,
                            height      : "variable"
                        };

                    $this.attr('id', 'slider-'+e);

                    slidewrap.carouFredSel({
                        responsive:true,
                        infinite: (typeof sliderCircular) ? sliderCircular : true,
                        circular: (typeof sliderCircular) ? sliderCircular : true,
                        auto : sliderAuto ? sliderAuto : false,
                        scroll : {
                            fx : sliderFx ? sliderFx : 'crossfade',
                            duration : instance.options.speedAnimation,
                            timeoutDuration : instance.options.sliderInterval,
                            items: 'page',
                            onBefore: function(items) {
                                if (items.items.visible.hasClass('video-wrap')){
                                    $this.find('.action-link').show();
                                } else {
                                    $this.find('.action-link').hide();
                                }
                            }
                        },
                        onCreate: function(){
                            if ($this.hasClass('products')){
                                $this.find('li:nth-child(2n)').addClass('even');
                                $this.find('li:nth-child(2n+1)').addClass('odd');
                            }
                        },
                        items: sliderItems,
                        swipe : {
                            onTouch : true,
                            onMouse : false
                        },
                        prev : $(sliderPrefix + e).find('.prev'),
                        next : $(sliderPrefix + e).find('.next'),
                        pagination : {
                            container: $(sliderPrefix + e).find('.nav-pages')
                        }
                    }).parent().css('margin', 'auto');

                        $this.find('.nav-pages').css('marginTop', -$this.find('.nav-pages').height()/2);

                });
            }

        },
        productQuantity: function(){
            var instance = this;
            instance.plus.on('click',function(e){
                e.preventDefault();
                var $this = $(this),
                    valIn = $this.parent().find('input').val();
                valIn++;
                $this.parent().find('input').val(valIn);

                if ($this.parent().find('input').val() <= 1){
                    $this.parent().find(instance.minus).addClass('disabled');
                } else {
                    $this.parent().find(instance.minus).removeClass('disabled');
                }
            });

            instance.counting.find('input').on('change', function(){
                var $this = $(this);
                if ($this.parent().find('input').val() <= 1){
                    $this.parent().find(instance.minus).addClass('disabled');
                } else {
                    $this.parent().find(instance.minus).removeClass('disabled');
                }
            });

            // Product counting less
            instance.minus.on('click',function(e){
                e.preventDefault();
                var $this = $(this),
                    valIn = $this.parent().find('input').val();
                if($this.parent().find('input').val() != 1){
                    valIn--;
                    $this.parent().find('input').val(valIn);
                    $this.removeClass('disabled');
                } else{
                    $this.addClass('disabled');
                    return false;
                }
                if ($this.parent().find('input').val() <= 1){
                    $this.addClass('disabled');
                }
            });
        },
        countUp: function(){
            var instance = this,
                obj = {
                signPos: 'after',
                delay: 30,
                orderSeparator: ' ',
                decimalSeparator: ','
            };

            if (instance.countup.length > 0){
                this.countup.hsCounter(obj);
            }
        },
        contactMap: function() {
            var instance = this,
                x = instance.options.locations[0],
                y = instance.options.locations[1],
                cmyLatlng = new google.maps.LatLng(x, y),
                cmapOptions = {
                    zoom: instance.options.mapZoom,
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: true,
                    center: cmyLatlng
                },
                cmap = new google.maps.Map(document.getElementById('map'), cmapOptions),
                cmapPopup = (instance.mapPopup.length === 1) ? new google.maps.Map(document.getElementById('map-popup'), cmapOptions) : '';

            new google.maps.Marker({
                position: cmyLatlng,
                map: cmap
            });

            if (instance.mapPopup.length === 1){
                instance.mapPopup.height($win.height());

                new google.maps.Marker({
                    position: cmyLatlng,
                    map: cmapPopup
                });
            }

        },
     /*   sendform: function () {
            var contactForm = $('#send-form'),
                contactFormName = $('#send-form-name'),
                contactFormEmail = $('#send-form-email'),
                contactFormMessage = $('#send-form-message'),
                emailValidationRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            contactForm.find('input, textarea').focusout(function(){
                var self = $(this);

                if (self.attr('id') == 'send-form-email'){
                    if ((self.val() === '') || (!emailValidationRegex.test(self.val()))) {
                        self.parent().addClass('has-error');
                    }
                } else {
                    if (self.val() === '')
                        self.parent().addClass('has-error');
                }
            }).focusin(function(){
                $(this).parent().removeClass('has-error');
            });

            contactForm.on('submit', function(){
                var isHaveErrors = false;

                if (contactFormName.val() === '') {
                    isHaveErrors = true;
                    contactFormName.parent().addClass('has-error');
                }

                if (contactFormMessage.val() === '') {
                    isHaveErrors = true;
                    contactFormMessage.parent().addClass('has-error');
                }

                if ((contactFormEmail.val() === '') || (!emailValidationRegex.test(contactFormEmail.val()))) {
                    isHaveErrors = true;
                    contactFormEmail.parent().addClass('has-error');
                }

                if (!isHaveErrors) {
                    $.ajax({
                        type: 'POST',
                        url: 'php/email.php',
                        data: {
                            name: contactFormName.val(),
                            email: contactFormEmail.val(),
                            message: contactFormMessage.val()
                        },
                        dataType: 'json'
                    })
                        .done(function(answer){
                            if ((typeof answer.status != 'undefined') && (answer.status == 'ok')) {
                                $('.succs-msg').fadeIn().css("display","inline-block");
                                contactFormName.val('');
                                contactFormEmail.val('');
                                contactFormMessage.val('');
                            } else {
                                alert('Message was not sent. Server-side error!');
                            }
                        })
                        .fail(function(){
                            alert('Message was not sent. Client error or Internet connection problems.');
                        });
                }

                return false;
            });
        }*/
    };
    
    

    

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                    new Plugin(this, options));
            }
        });
    };
})(jQuery, window, document);

(function ($) {
    $(document.body).Aisconverse();
})(jQuery);

