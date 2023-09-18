//alert('loaded from admin');

jquery(document).ready(function($){

    $('#sendAjaxRequest').click(function(event){
        
        $.ajax({

            URL:'/wp-admin/admin-ajax.php',
            type:'post',
            dataType:'json',
            data: {
                action:'calculate_operation',
                numberOne:25,
                numberTwo:87
            },
            success: function(res){
                alert(res.result);
                console.log(res); 
            },
            error: function(error){
            }

        });

    });

});
