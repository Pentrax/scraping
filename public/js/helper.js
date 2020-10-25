
 var select = $("#select-categoria").val();
console.log(select);
 switch (select){
     case "tecnologia":
         $("#tecno").prop("checked", true);
         break;
     case "indumentaria":
         $("#indumentaria").prop("checked", true);
         break;
     case "accesorios":
         $("#deportes").prop("checked", true);
         break;
     default:
         break;
 }

// $("#fravega-filter").click(function (){
//
//     $("#badge-filter").html("<span class=\"badge badge-info\">Tecnologia <a href=\"#\" style=\"color: black\">X</a></span>")
// });

