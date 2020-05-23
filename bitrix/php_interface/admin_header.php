<script type="text/javascript" src="../templates/forque/js/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        if($('#tr_PROPERTY_771 input').val().length>0){
            $('#tr_PROPERTY_771 input').before('<div class="box-icon icon x2 colorful-icon mr-20"><i class="'+$('#tr_PROPERTY_771 input').val()+'"></i></div>');
//            $('<link href="../templates/forque/css/admin_header_add.css" rel="stylesheet" type="text/css">').appendTo('head');
            $('<style>.icon-hotairballoon:before {content: "\\e044";}</style>').appendTo('head');
            };
    });
</script>
