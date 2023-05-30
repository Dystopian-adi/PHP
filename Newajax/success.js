$(document).ready(function(){
    $('#load-data').on('click',function(e){
    $.ajax({
        url:'select.php',
        type:'post',
        success:function(data){
            $('#data').html(data);
        }
    })
    });
    $('#submit').on('click',function(e){
        var name=$('#name').val();
        var email=$('#email').val();
        var phone=$('#phone').val();
        $.ajax({
            url:'insert.php',
            type:'post',
            data:{fname:name,femail:email,fphone:phone},
            success:function(data){
                $('#record').html(data);
                $('#reset').trigger('reset');
            }
        });
    });
    });