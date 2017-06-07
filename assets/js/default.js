var base_url;
$(document).ready(function() {
    base_url = $('#base-url').val();
   $(document).on('click','.carousel-caption', function(e) {
       var target = e.target;
       var rep = $(this).parent().attr('dir');
       if($(target).is("p") || $(target).is("h3")) {
           $.ajax({
               url: base_url+'index.php/Anor/get_imagegalerie/'+rep,
               success: function(data) {
                   $('#content-photo-galerie').html(data);
                   $('#modal-galerie').modal('show');
               },
               function: function() {
                   alert('echec de l\'affichage des photos');
               }
           });
       }
   });
    
    $('.image-stat').on('click', function(){
        show_modal('modalImgStat');
        $('#img-zoom').attr('src', $(this).attr('src'));
        $('#caption').html($(this).attr('alt'));
    });
});

function hide_modal(id) {
    $('#'+id).attr('style','display:none;');
}

function show_modal(id) {
    $('#'+id).attr('style','display:block;');
}