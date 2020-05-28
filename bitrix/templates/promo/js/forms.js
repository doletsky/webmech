jQuery(function($) {
    $(document).ready(function () {

        $(document).on('click','.form-control',function (e) {
            e.preventDefault();
            if ($('form.signup-form').find('.signup_detect').val().length > 0) return false;
//            $.ajax({
//                type: "POST",
//                url: '/promo/ajax/signup.php',
//                data: 'EMAIL='+$('form.signup-form').find('[name="EMAIL"]').val()+'&COURSE='+$('form.signup-form').find('[name="COURSE"]').val(),
//                success: function (p) {
//                    console.log(p);
//                    open_saccess_popup();
//                }
//            });
            var valNum=$(this).parents('form').find('option:selected').val();
            if(valNum==1) catalogSetDefaultObj_vip.Add2Basket();
            if(valNum==2) catalogSetDefaultObj_curator.Add2Basket();
            if(valNum==3) catalogSetDefaultObj_course.Add2Basket();
        });

    });
});


