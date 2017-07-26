$(document).ready(function() {
   $(document).on('click','.pagination li a:not(#a-forward,#a-backward)', function() {
        var nbelement = parseInt($('#total-element').html()); 
        var perpage = parseInt($('#nombre-affichage').val());
        var pageaffiche = parseInt($(this).html());
        var nbperpage = Math.ceil(nbelement/perpage);
        var i = 0;
        $('.pagination li').removeClass('active');
        if(pageaffiche == 1 ) {
            $('#a-backward').parent().addClass('disabled');
            $('#a-forwward').parent().removeClass('disabled');
        } else if(pageaffiche == nbperpage) {
            $('#a-backward').parent().removeClass('disabled');
            $('#a-forwward').parent().addClass('disabled');
        } else {
             $('#a-backward, #a-forwward').parent().removeClass('disabled');
        }
        $(this).parent().addClass('active');
        var indexmin = ( pageaffiche - 1)*perpage, indexmax = pageaffiche*perpage - 1;
        $('.list-group-item').each(function() {
            var index = parseInt($(this).index());
           if(indexmin <= index && index <= indexmax) {
               $(this).show();
           } else {
               $(this).hide();
           }
        });
   });
    
    $(document).on('change','#nombre-affichage', function() {
        if($('.list-group-item').html() != undefined) {
            var nbelement = parseInt($('#total-element').html()); 
            var perpage = parseInt($(this).val());
            var nbli = Math.ceil(nbelement/perpage);
            var li_perpage = '<li class="disabled"><a id = "a-backward">«</a></li>';
            for(i=0; i < nbli; i++) {
                li_perpage += '<li><a '+(i == 0 ? 'class = "active"' : "")+'>'+(i+1)+'</a></li>';
            }
            li_perpage += '<li><a id="a-forward">»</a></li>';
            $('.pagination').html(li_perpage);
            $('.pagination li.active a').trigger('click');
        }
    });
    
    $(document).on('click','#a-backward', function() {
        $('.pagination li a').each(function() {
            if($(this).html() == "1") {
                $(this).click();
            }
        });
    });
    
    $(document).on('click','#a-forward', function() {
        var nbelement = parseInt($('#total-element').html()); 
        var perpage = parseInt($(this).val());
        var nbli = Math.ceil(nbelement/perpage);
        $('.pagination li a').each(function() {
            if($(this).html() == nbli) {
                $(this).click();
            }
        });
    });
});