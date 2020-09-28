
$(function (){

    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });

    $("a#fravega-filter").click(function (){
        $.ajax({
            type:'GET',
            url:'/fravega',
            data:"search="+$("#text-search").val() + "&empresa=Fravega",
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });

    });

    // $("#search-form").submit(function(e) {
    //   //  e.preventDefault();
    //
    //     var $search = $("#spinner")
    //     $search.html('<div class="spinner-border text-primary" role="status">\n' +
    //         '                <span class="sr-only">Loading...</span>\n' +
    //         '            </div>');
    //
    //     setTimeout(function() {
    //         // for (var i = 0; i < 50000; i++){
    //         //     console.log(i)
    //         // }
    //
    //         $search.empty();
    //     }, 50);
    // })

});
