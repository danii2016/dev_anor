var base_url;
$(document).ready(function() {
    base_url = $('#base-url').val();
   $(document).on('click','.image-galerie img', function(e) {
       var rep = $(this).parent().attr('dir');
       var title1 = $(this).parent().find('h5').html()
       $.ajax({
           url: base_url+'index.php/Anor/get_imagegalerie/'+rep,
           success: function(data) {
               $('#title-galerie').html(title1);
               $('#content-photo-galerie').html(data);
               $('#modal-galerie').modal('show');
           },
           function: function() {
               alert('echec de l\'affichage des photos');
           }
       });
       
   });
    
    $('.image-stat').on('click', function(){
        show_modal('modalImgStat');
        $('#img-zoom').attr('src', $(this).attr('src')).attr('numero',  $(this).parent().attr('numero'));
        $('#caption').html($(this).attr('alt'));
    });
    
    $('.actualite h5').on('click', function() {
       window.location.href = base_url+'actualites/consulter/'+$(this).attr('id').split('-')[1]; 
    });
    
    $(document).on('click','#prev-stat', function() {
        var numero = parseInt($('#img-zoom').attr('numero')) - 1;
        if($('.tab-pane.active div[numero='+numero+']').html() != undefined) {
            $('#img-zoom').attr('src', $('.tab-pane.active div[numero='+numero+'] img').attr('src')).attr('numero',  $('.tab-pane.active div[numero='+numero+']').attr('numero'));
            $('#caption').html($('.tab-pane.active div[numero='+numero+'] img').attr('alt'));
        } else {
             $('#img-zoom').attr('src', $('.tab-pane.active .stat-image-container').last().find('img').attr('src')).attr('numero', $('.tab-pane.active .stat-image-container').last().attr('numero'));
             $('#caption').html($('.tab-pane.active .stat-image-container').last().find('img').attr('alt'));
        }
    });   
    
    $(document).on('click','#next-stat', function() {
        var numero = parseInt($('#img-zoom').attr('numero')) + 1;
        if($('.tab-pane.active div[numero='+numero+']').html() != undefined) {
            $('#img-zoom').attr('src', $('.tab-pane.active div[numero='+numero+'] img').attr('src')).attr('numero',  $('.tab-pane.active div[numero='+numero+']').attr('numero'));
            $('#caption').html($('.tab-pane.active div[numero='+numero+'] img').attr('alt'));
        } else {
            $('#img-zoom').attr('src', $('.tab-pane.active div[numero=0] img').attr('src')).attr('numero',  $('.tab-pane.active div[numero=0]').attr('numero'));
            $('#caption').html($('.tab-pane.active div[numero=0] img').attr('alt'));
        }
    });
});

function hide_modal(id) {
    $('#'+id).attr('style','display:none;');
}

function show_modal(id) {
    $('#'+id).attr('style','display:block;');
}