$(document).ready(function() {
   $(document).on('submit','#login-form',function(e) {
       e.preventDefault();
       $.ajax({
          type: 'POST',
            url: base_url+'index.php/liens_professionnels/authentifier',
           data: {login: $('#login_username').val(), pass: $('#login_password').val()},
           dataType: 'JSON',
           success: function(data) {
               if(data.status == 1) {
                   window.location.reload()
               } else {
                   show_errorauthent(data.message)
               }
           },
           error: function() {
               show_errorauthent(null);
           }
       });
   });
    
    $(document).on('click','.observe', function() {
        $('#infoexport-modal .modal-body').html($(this).parent().parent().find('.content-export').html());
        $('#infoexport-modal').modal('show');
    });
    
    $(document).on('click', '.btn-apercu', function(e){
        e.preventDefault();
        console.log('appel');
        show_modal('modalImgZoom');
        $('#img-zoom').attr('src', $(this).parent().parent().find('img').attr('src'));
        $('#caption').html($(this).attr('alt'));
    });
});

function show_errorauthent(msg) {
    $('#div-login-msg').addClass('error');
    $('#icon-login-msg').removeClass('glyphicon-chevron-right').addClass('glyphicon-remove error');
    $('#text-login-msg').html(msg == null || msg == undefined ? 'Echec de l\'authentification. Réessayer' : msg);
    setTimeout(function() {
        $('#div-login-msg').removeClass('error');
        $('#icon-login-msg').removeClass('error').removeClass('glyphicon-remove').addClass('glyphicon-chevron-right');
        $('#text-login-msg').html('Entrer votre login et votre mot de passe.');
    }, 2000);
}