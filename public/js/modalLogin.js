$("#loginBtn").on("click",function (event){
    event.preventDefault();

    let email = $("#email").val();
    let password = $("#password").val();

    // let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/login",
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

$("#registerBtn").on("click",function (event){
    event.preventDefault();

    let email = $("#email").val();
    let password = $("#password").val();

    // let _token   = $('meta[name="csrf-token"]').attr('content');
        console.log("sfasfa");
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
