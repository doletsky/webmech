<script type="text/javascript" src="../templates/forque/js/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        if($('#tr_PROPERTY_771 input').val().length>0){
            $('#tr_PROPERTY_771 input').before('<div class="box-icon icon x2 colorful-icon mr-20"><i class="'+$('#tr_PROPERTY_771 input').val()+'"></i></div>');
//            $('<link href="../templates/forque/css/admin_header_add.css" rel="stylesheet" type="text/css">').appendTo('head');
            $('<style>@font-face{font-family:et-line;src:url(../templates/forque/css/fonts/et-line/et-line.eot);src:url(../templates/forque/css/fonts/et-line/et-line.eot?#iefix) format("embedded-opentype"),url(../templates/forque/css/fonts/et-line/et-line.woff) format("woff"),url(../templates/forque/css/fonts/et-line/et-line.ttf) format("truetype"),url(../templates/forque/css/fonts/et-line/et-line.svg#et-line) format("svg");font-weight:400;font-style:normal}[data-icon]:before{font-family:et-line;content:attr(data-icon);speak:none;font-weight:400;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;display:inline-block}.icon-hotairballoon:before {content: "\\e044";}</style>').appendTo('head');
            };
    });
</script>
