$(document).ready(function() {
   $('#btn-authentification').on('click', function() {
      var login = $('input[name=login]').val();
      var password = $('input[name=password]').val();
       if(login == "" || password == "") {
           $('#error-login').html('Veuillez remplir correctement les champs').show().delay(3000).fadeOut(500);
       } else {
           $('#circleG').show();
           $.ajax({
               type: 'POST',
               url: base_url()+'administration/authentifier',
               data: {login: login, pass: password},
               dataType: "JSON",
               success: function(data) {
                   if(data.status == 1) {
                       document.location.href = base_url()+'administration';
                   } else {
                        $('#error-login').html(data.message != undefined ? data.message : 'Erreur lors de l\'authentification. Veuillez réessayer').show().delay(3000).fadeOut(500);
                   }
                   $('#circleG').hide();
               },
               error: function() {
                   $('#error-login').html('Erreur lors de l\'authentification. Actualisez puis réessayer').show().delay(3000).fadeOut(500);
                   $('#circleG').hide();
               }
           })
       }
   });
});
       
function base_url() {
   return $('#base-url').val();
}