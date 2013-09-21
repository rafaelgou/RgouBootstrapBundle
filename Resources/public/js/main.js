$(function(){

    /**
     * localScroller activate on header
     */
    $('header').localScroll(3000);


    /**
     * Chosen activate
     */
    $('.chosen').chosen();
    /**
     * Underscore extension for Twitter Bootstrap TypeAhead
     */
    _.compile = function(templ) {
        var compiled = this.template(templ);
        compiled.render = function(ctx) {
            return this(ctx);
        }
        return compiled;
    }
    
});
