// Custom scripts
$(document).ready(function () {
  
    // MetsiMenu
    $('#side-menu').metisMenu();

    // minimalize menu
    $('.navbar-minimalize:not(.binded)').addClass("binded").click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    })

    // tooltips
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // Move modal to body
    // Fix Bootstrap backdrop issu with animation.css
    $('.modal').appendTo("body")

    // Full height of sidebar
    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
    }
    fix_height();


    $(window).bind("load resize click scroll", function() {
        if(!$("body").hasClass('body-small')) {
            fix_height();
        }
    })

    $("[data-toggle=popover]")
        .popover();
});


// Minimalize menu when screen is less than 768px
$(function() {
    $(window).bind("load resize", function() {
        if ($(this).width() < 769) {
            $('body').addClass('body-small')
        } else {
            $('body').removeClass('body-small')
            $('body').removeClass('mini-navbar')
        }
    })
})

window.SmoothlyMenu = function() {
    if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
        // Hide menu in order to smoothly turn on when maximize menu
        $('#side-menu').hide();
        // For smoothly turn on menu
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 100);
    } else if ($('body').hasClass('fixed-sidebar')){
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 300);
    } else {
        // Remove all inline style from jquery fadeIn function to reset menu state
        $('#side-menu').removeAttr('style');
    }
};

/**
 * Baseado na url o menu fica ativado automaticamente.
 * A mesma logica aplica no menu de terceiro nivel é aplicada o menu de segundo nivel
 */
$( document ).ready(function() {
    
    var url = window.location;
    var newHref  = url.origin;

    // Se o pathname eh '/', o laravel não coloca no href do link, por isso so concateno pathname diferentes disso
    if(url.pathname !== '/'){
        newHref += url.pathname;
    }

    var me = $('ul.nav a[href="'+ newHref +'"]');
    var li = me.parent();
    var ul = me.parent().parent();

    // Está no terceiro nivel
    if( ul.hasClass('nav-third-level') ){

        // Ativo o li pai
        me.closest('li').addClass("active");

        // Expando o terceiro nivel and ativo o respectivo li pai
        me.closest('.nav-third-level').addClass("collapse in").attr('aria-expanded',"true");
        me.closest('.nav-third-level')
            .closest("li").addClass("active");

        // Expando o segundo nivel
        me.closest('.nav-third-level')
            .closest('.nav-second-level').addClass("collapse in").attr('aria-expanded',"true");

        // Ativo o li pai do segundo nivel
        me.closest('.nav-third-level')
            .closest('.nav-second-level')
            .closest("li").addClass("active");
    }

    if( ul.hasClass('nav-second-level') ){
        me.closest('li').addClass("active");
        me.closest('.nav-second-level').addClass("collapse in").attr('aria-expanded',"true");

        me.closest('.nav-second-level')
            .closest("li").addClass("active");
    }

    if( ul.attr("id") === 'side-menu' ){
        li.addClass("active");
    }

});

