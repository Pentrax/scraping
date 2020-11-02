
$(document).ready(function() {

    $("#loginBtn").on("click",function (event){
        event.preventDefault();

        let email = $("#email").val();
        let password = $("#password").val();

        // let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/doLogin",
            type:"POST",
            data:{
                email:email,
                password:password,
            },
            success:function(response){

                if(response) {
                    // $('.success').text(response.success);
                    $("#comment").modal("toggle");
                     location.reload();

                }
            },
        });

    });

    $("#registerBtn").on("click", function (event) {


        event.preventDefault();

        let email = $("#email_user").val();
        let password = $("#password_user").val();
        let name = $("#name_user").val()
        // let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/register",
            type:"POST",
            data:{
                email:email,
                password:password,
                name_user: name
            },
            success:function(response){

                if(response) {
                    // $('.success').text(response.success);
                    $("#comment").modal("toggle");
                     location.reload();

                }
            },
        });

    });
});
