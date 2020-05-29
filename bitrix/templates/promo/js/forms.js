jQuery(function($) {
    $(document).ready(function () {
        $(document).on('click','.error',function (e) {
            $(this).parents('form').find('.error').removeClass('error');
        });
        $(document).on('click','.form-control',function (e) {
            e.preventDefault();
            if ($('form.signup-form').find('.signup_detect').val().length > 0) return false;
            var email=$(this).parents('form').find('[type="email"]').val();
            console.log(email);
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(reg.test(email) == false) {
                $(this).parents('form').find('[type="email"]').addClass('error');
                return false;
            }
            if($(this).parents('form').find('option:selected:disabled').length>0){
                $(this).parents('form').find('option:selected:disabled').parent('select').addClass('error');
                return false;
            }
            var valNum=$(this).parents('form').find('option:selected').val();
            console.log(valNum);
            console.log('EMAIL='+email+'&packet='+valNum);
            $.ajax({
                type: "POST",
                url: '/bitrix/templates/promo/ajax/signup.php',
                data: {EMAIL:email, packet:valNum},
                success: function (p) {
                    console.log(p);
                    if(valNum==1) catalogSetDefaultObj_vip.Add2Basket();
                    if(valNum==2) catalogSetDefaultObj_curator.Add2Basket();
                    if(valNum==3) catalogSetDefaultObj_course.Add2Basket();
                }
            });
;
        });

    });
});


