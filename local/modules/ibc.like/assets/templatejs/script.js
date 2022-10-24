

$(document).ready(function() {
    console.log("ibc ready");
    let articleid = $('.ibc-like').attr('ibc-data-article-id');

    $.ajax({
        url: '/ajax/like/get.php',
        method: 'post',
        dataType: 'json',
        data: {
            articleid: articleid,
            userid: ibcuserid,
        },
        success: function(data){

            $('.ibc-like').empty();
            if (data.result.like == '1'){
                $('.ibc-like').append('<img src="/local/modules/ibc.like/assets/img/icons8-like-24.png"/>');
            }else{
                $('.ibc-like').append('<img src="/local/modules/ibc.like/assets/img/icons8-like-24-empty.png"/>');
            }
            $('.ibc-like').attr('ibc-data-like', data.result.like);
        }
    });

    $(document).on('click','.ibc-like',function(event){
        let likevalue = $('.ibc-like').attr('ibc-data-like');

        if (likevalue == '0'){
            likevalue = 1;
        }else{
            likevalue = 0;
        }

        $.ajax({
            url: '/ajax/like/add.php',
            method: 'post',
            dataType: 'json',
            data: {
                articleid: articleid,
                userid: ibcuserid,
                like: likevalue,
            },
            success: function(data){
                console.log(data);    /* выведет "Текст" */
                $('.ibc-like').empty();
                if (data.result.like == '1'){
                    $('.ibc-like').append('<img src="/local/modules/ibc.like/assets/img/icons8-like-24.png"/>');
                }else{
                    $('.ibc-like').append('<img src="/local/modules/ibc.like/assets/img/icons8-like-24-empty.png"/>');
                }
                $('.ibc-like').attr('ibc-data-like', likevalue);
            }
        });
    });
});
