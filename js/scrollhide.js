(function(){
    function Menu($element, options){

        var handler,
        defaults = {
            domObj : $element,
            position : '100px',
            onIntellingenceMenu : function(){},
            onNormalMenu : function(){}
        },
        config = $.extend({}, defaults, options),
        coreFuns = {
            displayMenu : function(){
                if ( config.domObj.hasClass(config.className) ) {
                    config.domObj.removeClass(config.className);
                }
            },
            hideMenu : function(){
                if ( !config.domObj.hasClass(config.className) ) {
                    config.domObj.addClass(config.className);
                }
            }
        },
        publicFuns = {
            intelligent_menu : function(){

                var lastScrollTop = 0, direction;

                if ( handler != undefined ) {
                    $(window).unbind('scroll', handler);
                }

                handler = function(e){
                    if (e.currentTarget.scrollY > lastScrollTop){
                        direction = 'down';
                    } else {
                        direction = 'up';
                    }
                    lastScrollTop = e.currentTarget.scrollY;

                    // check is user scrolling to up or down?
                    if ( direction == 'up' ) {
                    // so you are scrolling to up...

                        // lets display menu
                        coreFuns.displayMenu();

                    } else {
                    // so you are scrolling to down...

                        // se we have to hide only the small menu because the normal menu isn't sticky!
                        coreFuns.hideMenu();
                    }
                };
                $(window).bind('scroll', handler);

                config.onNormalMenu();
            },
            fixed_menu : function(){
                if ( handler != undefined ) {
                    $(window).unbind('scroll', handler);
                }

                handler = function(e){
                    // check have we display small menu or normal menu ?
                    coreFuns.displayMenu();
                };

                $(window).bind('scroll', handler);

                config.onNormalMenu();
            },
            mobile_intelligent_menu : function(){

                if ( jQuery.browser.mobile === true ) {
                    this.intelligent_menu();
                } else {
                    this.fixed_menu();
                }
            }
        };

        return publicFuns;
    }

    $.fn.menu = function( options ){
        var $element = this.first();
        var menuFuns = new Menu( $element, options );
        return menuFuns;
    };

})();
var menuFun = $('.intelligent-header').menu({
    className : 'hide-menu',
    position : '100px'
});

window.menuFun = menuFun;
menuFun.intelligent_menu();