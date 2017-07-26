$(document).ready(function() {
   $('.flag-image').on('click', function() {
       if($(this).hasClass('mg-flag')) {
           if($(this).parent().parent().attr('lang') != "mg") {
               $(this).parent().parent().hide();
               $(this).parent().parent().parent().find('div[lang=mg]').show();
           }
       } else if($(this).hasClass('fr-flag')) {
           if($(this).parent().parent().attr('lang') != "fr") {
               $(this).parent().parent().hide();
               $(this).parent().parent().parent().find('div[lang=fr]').show();
           }
       }
    });
});