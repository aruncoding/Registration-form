// $(document).ready(function() {
//     $(".btn-submit").click(function(e){
//         e.preventDefault();

//         var _token = $("input[name='_token']").val();
//         var name = $("#name").val();
//         var email = $("#email").val();
//         var phone = $("#phone").val();
//         var country = $("#country-dropdown").val();
//         var state = $("#state-dropdown").val();
//         var city = $("#city-dropdown").val();
//         var address = $("#address").val();
        

//         $.ajax({
//             url: "{{route('ajax.validation.store')}}",
//             type:'POST',
//             data: {_token:_token, name:name, email:email,phone:phone,country:country,state:state,city:city,address:address},
//             success: function(data) {
//               console.log(data.error)
//                 if($.isEmptyObject(data.error)){
//                     alert(data.success);
//                 }else{
//                     printErrorMsg(data.error);
//                 }
//             }
//         });
//     }); 

//     function printErrorMsg (msg) {
//         $.each( msg, function( key, value ) {
//         console.log(key);
//           $('.'+key+'_err').text(value);
//         });
//     }
// });

