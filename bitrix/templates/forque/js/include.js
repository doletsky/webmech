
// file include/partials mechanism using jquery load
// this must be run from a Web server (not file system)
$('[class^="inc_"]').each(function(i,e){
    
    try {
        var $root = $(e);
        var templatePath = $root.data("template");
        
        var $div = $('<div>');
        $div.load(templatePath,function(){
           
            var par = $(this);
            if (par.find('.inc_').length==0) {
                
                // there are no child includes, simply unwrap content
                $root.replaceWith(par.contents().unwrap());
                
                /* navgiation control */
                
                // control tabs and modals from separate nav links
                $('.navbar [data-toggle="modal"],.navbar [data-toggle="tab"]')
                    .on("click",function(e){
                    
                    var hash = $(this).attr("href").split('#')[1];
                    var elem = $('#'+hash);
                    
                    // select tab
                    $('.nav-tabs a[href*="' + hash + '"').tab("show");
                    
                    if (elem.length>0){
                        // scroll to anchor
                        $('html, body').animate({
                            scrollTop: elem.offset().top
                        },200);
                    }
                    else {
                        // navigate to url
                        // window.location.href = $(this).attr("href");
                    }
                    
                });
                
                // auto-scroll from url hash
                var hash = document.location.hash;
                if (hash && hash.length>1) {
                    var elem = $(hash);
                    if (elem.length>0) {
                        $('html, body').animate({
                            scrollTop: elem.offset().top
                        },200);
                        
                        // open navbar collapse toggler
                        if ($('.navbar a[href*="' + hash + '"').parents(".collapse").length>0) {
                            var toggler = $('.navbar a[href*="' + hash + '"').parents(".collapse").attr("id");
                            $('#'+toggler).collapse("show");
                        }
                    }
                }
                
                /* end navgiation control */
                
                // dynamically activate toggle-able Bootstrap components from _inc
                var toggle = $root.data("toggle");
                var target = $root.data("target");
                if (toggle && target) {
                    setTimeout(function(){
                       $(target)[toggle]($root.data("method")); 
                    },200);
                }
                
                // init tooltips
                $('[data-toggle="tooltip"]').tooltip();
                
                // load scripts
                if ($root.data("load-scripts")) {
                    $.getScript("js/loaded.js");
                }
                
            }   
            else {
                
                // replace nested child includes with content
                var done = function(parent,element){
                    parent.replaceWith(element.contents().unwrap());
                    $root.replaceWith(parent.contents().unwrap());
                    $.getScript("js/loaded.js");
                };

                // find includes in the child
                par.find('.inc_').each(function(i,el){
                    var ele = $(el);
                    var tPath= ele.data("template");
                    
                    // load the content for the child include
                    var $sub = $('<div></div>');
                    $sub.load(tPath, function(){
                        ele.replaceWith($sub.contents().unwrap());
                        done(par,ele);
                    });
                });
            } 
            
        });
    } catch (er) {
        console.log("error loading: " + templatePath + "-" + er);
    }
},function(){
    // done
});