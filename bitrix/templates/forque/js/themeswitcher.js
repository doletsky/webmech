// bootstrap 4 theme switcher intended for demonstration purposes
var $;
var container = $('<div class="bg-dark shadow rounded-left text-center" style="position:fixed;top:22%;right:0;z-index:2000"><a href class="p-2 text-white h3" data-toggle="collapse" data-target="#themer" title="Change theme"><span class="m-1 my-2 d-inline-block lnr lnr-cog"></span></a></div>');
var themer = $('<div class="collapse border border-right-0 bg-light pb-1" id="themer"></div>');
var themes = [
    {name:'turquoise',color:'MediumTurquoise',file:'theme-turquoise.css'},
    {name:'red',color:'orangered',file:'theme-red.css'},
    {name:'blue',color:'skyblue',file:'theme-blue.css'},
    {name:'hotpink',color:'hotpink',file:'theme-hotpink.css'},
    {name:'slateblue',color:'#3f6dda',file:'theme-slateblue.css'},
    {name:'lime',color:'limegreen',file:'theme-lime.css'},
    {name:'black',color:'black',file:'theme-black.css'}
];

for (var t in themes) {
    var theme = themes[t];
    var themeLink = $('<a class="nav-link theme-selector" data-toggle="collapse" data-target="#themer" title="'+theme.name+'" data-idx="'+t+'" data-theme="'+theme.name+'" data-file="'+theme.file+'" href><span class="badge badge-pill" style="background-color:'+theme.color+';">&nbsp;</span></a>');
    themeLink.on('click',function(){
        var file = $(this).data("file");
        var idx = $(this).data("idx");
        if (file && file.length>0) {
            localStorage.setItem('themeFile', file);
            localStorage.setItem('themeIdx', idx);
            location.reload();
        }
        return;
    });
    themeLink.appendTo(themer);
}

themer.appendTo(container);
container.appendTo('body');

function reload_js(src) {
    $('script[src$="' + src + '"]').remove();
    $('<script>').attr('src', src).appendTo('body');
}
    
if (localStorage.getItem('themeFile')) {
    var file = localStorage.getItem('themeFile');
    var idx = localStorage.getItem('themeIdx');
    
    $('link[href*="css/theme"]').remove();
    if (file && file.length>0) {
        $('head').append('<link rel="stylesheet" href="css/'+file+'" type="text/css" />').ready(function(){
            // refresh scripts
            reload_js('js/scripts.js');
        });
    }
}