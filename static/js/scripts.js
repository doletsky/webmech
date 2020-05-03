// file include mechanism using jquery load
if ($('[class^="inc_"]').length > 0) {
    $.getScript("./js/include.js");
}
else {
    $.getScript("./js/loaded.js");
}