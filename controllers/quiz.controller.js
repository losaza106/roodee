$(document).ready(function(){

    $('#btn_Quiz_Name').click(function(){
        let NAME_USER = $('#NAME_USER').val();
        if(NAME_USER == ""){
            $('#Error_Name_Empty').show();
            const element =  document.querySelector('.Error_Name_Empty')
            element.classList.add('animated', 'shake')

            element.addEventListener('animationend', function() { 
                element.classList.remove('animated', 'shake')
            })
        }else{
            $('#Show_Name_User').text(NAME_USER);
            $('#NAME_USER_RESPONSE').text(NAME_USER);
            const element =  document.querySelector('#Quiz_Name')
            element.classList.add('animated', 'fadeOutLeftBig')

            element.addEventListener('animationend', function() { 
                element.classList.remove('animated', 'fadeOutLeftBig')
                $('#Quiz_Name').hide();
                $('#Quiz_Blog').show();
                goToByScroll('Show_Name_User');
            })
        }
    });

    $('#form_Quiz').on('submit',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "ยืนยันการส่งคำตอบ!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                var formData = new FormData($(this)[0]);
                $.ajaxSetup({
                    cache: false,
                    contentType: false,
                    processData: false
                });
                $.ajax({
                    url: 'services/check_score.service.php',
                    type: 'post',
                    data: formData,
                    success: function (res) {
                        let data = $.parseJSON(res);
                        Swal.fire({
                            title: 'Success',
                            text: "Success",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            $('#SCORE_USER_RESPONSE').text(data.total_score);
                            $('#Quiz_Blog').hide();
                            $('#Quiz_Result').show();
                        })
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Process..',
                            allowOutsideClick: false
                        });
                        swal.showLoading();
                    }
                });
            }
        })
        
    });

    $('#btn_see_answer').click(function(){
        $('#see_answer').toggle();

        const element =  document.querySelector('#see_answer')
        element.classList.add('animated', 'fadeIn')
        
        element.addEventListener('animationend', function() { 
            element.classList.remove('animated', 'fadeIn')
        })
    });
});

function goToByScroll(id) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 'slow');
}