var folder = "";
$(document).ready(function() {
    if($('#input-date-actu').html() != undefined) {
        $('#input-date-actu').datetimepicker({
                                format: 'DD-MM-YYYY',
                            });
    } 
    if($('#mot-accueil').html() != undefined ) {
        CKEDITOR.replace("mot-accueil");
    } 
    if($('#ppo-contenu').html() != undefined ) {
        CKEDITOR.replace("ppo-contenu");
    }
    
    $(document).on('change','#image-accueil-propos', function() {
       readURL($(this),'#image-accueil');
    });
    
    $(document).on('change','#image-organigramme', function() {
       readURL($(this),'#image-org');
    });
    
    $(document).on('change','#image-directeur', function() {
       readURL($(this),'#image-dir');
    });
    
    $(document).on('click','#save-accueil', function() {
        var titre = $('#titre-accueil').val();
        var content = CKEDITOR.instances['mot-accueil'].getData();
        if(titre == "" || content == "") {
            $('.alert-danger').html('Tous les champs sont obligatoires').show().delay(3000).fadeOut(600);
        } else {
            var fdata = new FormData();
            if ($('#image-directeur')[0].files && $('#image-directeur')[0].files[0]) {
                fdata.append('fichier', $('#image-directeur')[0].files[0]);
            }
            fdata.append('titre', titre);
            fdata.append('contenu', content);
            $.ajax({
               type: 'POST',
               url: base_url()+'administration/sauver_accueil',
               data: fdata,
               processData: false,
               contentType: false,
               dataType: "JSON",
               success: function(data) {
                   if(data.status == 1) {
                       $('.alert-success').show().delay(2000).fadeOut(500);
                   } else {
                        $('.alert-danger').html(data.message != undefined ? data.message : 'Erreur lors du traitement. Veuillez réessayer').show().delay(3000).fadeOut(500);
                   }
               },
               error: function() {
                   $('.alert-danger').html('Erreur lors du traitement. Actualisez puis réessayer').show().delay(3000).fadeOut(500);
               }
           });
        }
    });
    
    $(document).on('click','#save-propos', function() {
        var titreorg = $('#titre-organigram').val();
        var contenu = CKEDITOR.instances['ppo-contenu'].getData();
        if(titreorg == "" || contenu == "") {
            $('.alert-danger').html('Tous les champs sont obligatoires').show().delay(3000).fadeOut(500);
        } else {
            var fdata = new FormData();
            if ($('#image-accueil-propos')[0].files && $('#image-accueil-propos')[0].files[0]) {
                fdata.append('fichieraccueil', $('#image-accueil-propos')[0].files[0]);
            }
            if ($('#image-organigramme')[0].files && $('#image-organigramme')[0].files[0]) {
                fdata.append('fichierorganigramme', $('#image-organigramme')[0].files[0]);
            }
            fdata.append('titre_org', titreorg);
            fdata.append('contenu', contenu);
            $.ajax({
               type: 'POST',
               url: base_url()+'administration/sauver_propos',
               data: fdata,
                contentType: false,
                processData: false,
               dataType: "JSON",
               success: function(data) {
                   if(data.status == 1) {
                       $('.alert-success').show().delay(2000).fadeOut(500);
                   } else {
                        $('.alert-danger').html(data.message != undefined ? data.message : 'Erreur lors du traitement. Veuillez réessayer').show().delay(3000).fadeOut(500);
                   }
               },
               error: function() {
                   $('.alert-danger').html('Erreur lors du traitement. Actualisez puis réessayer').show().delay(3000).fadeOut(500); 
               }
            });
        }
    });
    
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
    
    //Gérer actualité
    $(document).on('click', '.delete-actu', function() {
        if(confirm('Voulez-vous supprimer cette actualité ainsi que ses articles ? Cette action est irréversible')) {
            var selector = $(this).parent().parent();
            var idactu = selector.attr('id').split('-')[1];
            $.ajax({
                url:  base_url()+'administration/supprimer_actualite/'+idactu,
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('.error').html(data.message == undefined ? "Erreur lors de la suppression de l'actualité" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('.error').html("Erreur lors du traitement, veuillez actualiser puis réessayez.").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click', '#ajouter-actu', function() {
        $('#id-actualite').val('');
        $('#input-titre-actu').val('');
        $('#input-date-actu').val('');
        $('#modal-gereractualite .modal-title').html('Ajouter une actualité');
        $('#data-article').html('<div class = "article row row-fluid">'+
                    '<div class = "col-sm-11">'+
                        '<div class = "form-group row">'+
                            '<label class = "col-sm-3">Titre</label>'+
                            '<input class = "input-titre-article col-sm-9" name = "input-titre-article" />'+
                       ' </div>'+
                        '<div class = "form-group row margin-top-five">'+
                            '<label class = "col-sm-12" >Contenu</label>'+
                            '<textarea id = "editor_1" class = "input-contenu-article col-sm-9" name = "input-date-article placeholder="Contenu de l\'article" ></textarea>'+
                       ' </div>'+
                    '</div>'+
                   ' <div class="col-sm-1">'+
                        '<i class = "glyphicon glyphicon-remove-sign delete-article" title = "Supprimer article"></i>'+
                   ' </div>'+
                '</div>');
        CKEDITOR.replace('editor_1');
        $('#modal-gereractualite').modal('show');
    });   
    
    $(document).on('click','#add-article-actu', function() {
        var numeditor = $('.input-contenu-article').html() == undefined ? 1 : (parseInt($('.input-contenu-article').last().attr('id').split('_')[1])+1);
        $('#data-article').append('<div class = "article row row-fluid">'+
                    '<div class = "col-sm-11">'+
                        '<div class = "form-group row">'+
                            '<label class = "col-sm-3">Titre</label>'+
                            '<input class = "input-titre-article col-sm-9" name = "input-titre-article" />'+
                       ' </div>'+
                        '<div class = "form-group row margin-top-five">'+
                            '<label class = "col-sm-12" >Contenu</label>'+
                            '<textarea id = "editor_'+numeditor+'" class = "input-contenu-article col-sm-9" name = "input-contenu-article" placeholder="Contenu de l\'article" ></textarea>'+
                       ' </div>'+
                    '</div>'+
                   ' <div class="col-sm-1">'+
                        '<i class = "glyphicon glyphicon-remove-sign delete-article" title = "Supprimer article"></i>'+
                   ' </div>'+
                '</div>');
        CKEDITOR.replace("editor_"+numeditor);
    });
    
    $(document).on('click', '.delete-article', function() {
        var idart = $(this).parent().parent().attr('id_article');
        if(idart == undefined) {
            $(this).parent().parent().remove();
        } else {
            if(confirm('Supprimer cet article? Cette action est irréversible')) {
                var selector = $(this).parent().parent();
                $.ajax({
                    url:  base_url()+'administration/supprimer_article/'+idart,
                    dataType: 'JSON',
                    success: function(data) {
                        if(data.status == 1) {
                            selector.remove();
                        } else {
                            $('.error').html(data.message == undefined ? "Erreur lors de la suppression de l'article" : data.message).show().delay(3000).fadeOut(600);
                        }
                    },
                    error: function() {
                        $('.error').html("Erreur lors du traitement, veuillez actualiser puis réessayez.").show().delay(3000).fadeOut(600);
                    }
                });
            }
        }
    });
    
    $(document).on('click', '#valider-actualite', function() {
        var titreactu = $('#input-titre-actu').val();
        var dateactu = $('#input-date-actu').val();
        var articles = new Array();
        var idactu = $('#id-actualite').val();
        var letsave = true, message = "";
        if(titreactu == "") {
            letsave = false;
            message = "Vous devez ajouter un titre à l'actualité";
        } else if(dateactu == "") {
            letsave = false;
            message = "La date de l'actualité doit être renseignée";
        }
        $('.article').each(function() {
            var ideditor = $(this).find('.input-contenu-article').attr('id');
            var idart = $(this).attr('id_article') == undefined ? "" : $(this).attr('id_article');
            var content = CKEDITOR.instances[ideditor+''].getData();
            var titrearticle = $(this).find('.input-titre-article').val();
            if(letsave && (titrearticle == "" || content == "")) {
                letsave = false;
                message = "Le titre et le contenu d'un article doivent être renseigné ou vous devez le supprimer";
            }
           articles.push({
              id: idart,
              titre: titrearticle,
              contenu: content
           });
        });
        if(articles.length <= 0) {
            letsave = false;
            message = "Vous devez ajouter au moins un article pour cette actualité";
        }
        if(!letsave) {
            $('#error-saveactu').html(message).show().delay(3000).fadeOut(600);
        } else {
            $.ajax({
                url:  base_url()+'administration/sauver_actualite',
                data: {id:idactu, titre: titreactu, date: dateactu, articles: articles},
                dataType: 'JSON',
                type: "POST",
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-saveactu').html(data.message == undefined ? "Erreur lors du traitement. Veuillez actualiser puis réessayer" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveactu').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click', '.edit-actu', function() {
        var id_actu = $(this).parent().parent().attr('id').split('-')[1];
        $.ajax({
            url:  base_url()+'administration/get_detailactualite/'+id_actu,
            dataType: 'JSON',
            type: "POST",
            success: function(data) {
                if(data.articles == undefined) {
                    $('#error').html("Erreur lors de la récupération des informations. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                } else {
                    var tmpdate = data.actualite.aact_dateajout.split('-');
                    $('#id-actualite').val(data.actualite.aact_id);
                    $('#input-titre-actu').val(data.actualite.aact_titre);
                    $('#input-date-actu').val(tmpdate[2]+'-'+tmpdate[1]+'-'+tmpdate[0]);
                    $('#modal-gereractualite .modal-title').html('Modifier actualité');
                    $('#data-article').html('');
                    $.each(data.articles, function(i, article) {
                        $('#data-article').append('<div class = "article row row-fluid" id_article = "'+article.aart_id+'">'+
                                '<div class = "col-sm-11">'+
                                    '<div class = "form-group row">'+
                                        '<label class = "col-sm-3">Titre</label>'+
                                        '<input class = "input-titre-article col-sm-9" name = "input-titre-article" value = "'+article.aart_titre+'" />'+
                                   ' </div>'+
                                    '<div class = "form-group row margin-top-five">'+
                                        '<label class = "col-sm-12" >Contenu</label>'+
                                        '<textarea id = "editor_'+(i+1)+'" class = "input-contenu-article col-sm-9" name = "input-titre-actu" placeholder="Contenu de l\'article" >'+article.aart_contenu+'</textarea>'+
                                   ' </div>'+
                                '</div>'+
                               ' <div class="col-sm-1">'+
                                    '<i class = "glyphicon glyphicon-remove-sign delete-article" title = "Supprimer article"></i>'+
                               ' </div>'+
                            '</div>');
                        CKEDITOR.replace('editor_'+(i+1));
                    });
                    $('#modal-gereractualite').modal('show');
                }
            },
            error: function() {
                $('#error').html("Erreur lors de la récupération des informations. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
            }
        });
    });
    
    //Gestion de la gallerie photo
    $(document).on('click', '#ajouter-galerie', function() {
        $('#id-galerie').val(""); 
        $('#input-lib-galerie').val('');
        $('#input-img-galerie').val('');
        $('#input-dir-galerie option[appended=appended]').remove();
        $('#modal-gerergalerie .modal-title').html('Ajouter une gallerie');
        $('#modal-gerergalerie').modal('show');
    });
    
    $(document).on('click', '.delete-galerie', function() {
       if(confirm('Voulez-vous supprimer cette galerie ?')) {
           var selector = $(this).parent().parent();
           $.ajax({
                url:  base_url()+'administration/supprimer_galerie/'+selector.attr('id').split('-')[1],
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('#error-savegalerie').html(data.message == undefined ? "Erreur lors du traitement. Veuillez actualiser puis réessayer" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-savegalerie').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
       }
    });
    
    $(document).on('click', '.edit-galerie', function() {
        $('#input-dir-galerie option[appended=appended]').remove();
        var selector = $(this).parent().parent()
        var idgal = selector.attr('id').split('-')[1];
        $('#id-galerie').val(idgal); 
        $('#input-dir-galerie').append('<option value="'+selector.attr('repertoire')+'" appended = "appended" selected>'+selector.attr('repertoire')+'</option>');
        $('#input-lib-galerie').val(selector.attr('libelle'));
        $('#input-img-galerie').val(selector.attr('imagemenu'));
        $('#modal-gerergalerie .modal-title').html('Modifier gallerie');
        $('#modal-gerergalerie').modal('show');
    });
    
    $(document).on('click', '#valider-galerie', function() {
       var idgal = $('#id-galerie').val(); 
       var rep = $('#input-dir-galerie').val(); 
       var libl = $('#input-lib-galerie').val(); 
       var img = $('#input-img-galerie').val(); 
        if(rep == undefined || rep == "") {
            $('#error-savegalerie').html("Vous devez avoir un répertoire pour créer une galerie").show().delay(2000).fadeOut(600);
        } else if(libl == "") {
            $('#error-savegalerie').html("Vous devez entrer un libellé pour la galerie").show().delay(2000).fadeOut(600);
        } else if(img == "") {
            $('#error-savegalerie').html("Vous devez entrer le nom de l'image qui représentera la galerie").show().delay(2000).fadeOut(600);
        } else {
            $.ajax({
                url:  base_url()+'administration/sauver_galerie',
                data: {id:idgal, rep: rep, lib: libl, img: img},
                dataType: 'JSON',
                type: "POST",
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-savegalerie').html(data.message == undefined ? "Erreur lors du traitement. Veuillez actualiser puis réessayer" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-savegalerie').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click', '.edit-procedure', function() {
        var selector = $(this).parent().parent();
        $('#id-procedure').val(selector.attr('id').split('-')[1]);
        $('#input-lang-proc').val(selector.attr('langage')).attr('disabled', 'disabled');
        $('#input-rub-proc').val(selector.attr('id').split('-')[2]).attr('disabled', 'disabled');
        if(CKEDITOR.instances['input-cont-proc'] == undefined) {
            $('#input-cont-proc').val(selector.attr('contenu'));
            CKEDITOR.replace('input-cont-proc');
        } else {
            CKEDITOR.instances['input-cont-proc'].setData(selector.attr('contenu'));
        }
        $('#modal-gererprocedure').modal('show');
    });
    
    $(document).on('click', '#valider-procedure', function() {
        var id = $('#id-procedure').val();
        var langage = $('#input-lang-proc').val();
        var idproced = $('#input-rub-proc').val();
        var contenu = CKEDITOR.instances['input-cont-proc'].getData();
        if(contenu == "") {
            $('#error-saveprocedure').html("Le contenu de la procédure ne doit pas être vide.").show().delay(3000).fadeOut(600);
        } else {
            $.ajax({
                url:  base_url()+'administration/sauver_procedure',
                data: {id:id, idproced: idproced, langage: langage, contenu: contenu},
                dataType: 'JSON',
                type: "POST",
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-saveprocedure').html(data.message == undefined ? "Erreur lors du traitement. Veuillez actualiser puis réessayer" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveprocedure').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click', '#add-procedure', function() {
        $('#id-procedure').val("");
        $('#input-lang-proc').val("fr").removeAttr('disabled');
        $('#input-rub-proc').val(1).removeAttr('disabled');
        if(CKEDITOR.instances['input-cont-proc'] == undefined) {
            $('#input-cont-proc').val("");
            CKEDITOR.replace('input-cont-proc');
        } else {
            CKEDITOR.instances['input-cont-proc'].setData("");
        }
        $('#modal-gererprocedure').modal('show');
    });
    
    $(document).on('click', '.delete-procedure', function() {
       if(confirm('Voulez-vous supprimer cette procédure ? Cette action est irréversible')) {
           var selector = $(this).parent().parent();
           $.ajax({
                url:  base_url()+'administration/supprimer_procedure/'+selector.attr('id').split('-')[1],
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('#error-saveprocedure').html(data.message == undefined ? "Erreur lors du traitement. Veuillez actualiser puis réessayer" : data.message).show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveprocedure').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
       }
    });
    
    //Gestion des cadres légaux
    $(document).on('dblclick','.cadre-folder', function() {
        folder = $(this).attr('repertoire');
        $('#folder-selected').html('<span class="glyphicon glyphicon-chevron-right"></span>'+$(this).find('.libelle').html());
        $.ajax({
            url:  base_url()+'administration/get_contenurepertoire',
            type: 'POST',
            data: {repertoire: folder},
            success: function(data) {
                $('#bouton-fichier').show();
                $("#folder-container").hide();
                $("#back-to-top").show();
                $("#pdf-container").html(data).show();
            },
            error: function() {
                $('#folder-selected').html("");
                $('#error-cadre').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
            }
        });
    });
    
    $(document).on('click', '#back-to-top', function() {
        $('#bouton-fichier, #bouton-image-stat').hide();
        $('#pdf-container, #image-container').html("").hide();
        $('#folder-selected').html("");
        $("#folder-container, #bouton-add-annee-stat").show();
        $("#back-to-top").hide();
    });
    
    $(document).on('change', '#file-1', function() {
        if(folder != "") {
            if($(this)[0].files != undefined) {
                var fdata = new FormData();
                var errmsg = "";
                var nbfile = 0;
                $.each($(this)[0].files, function(i,file) {
                    var extension = file.name.slice((Math.max(0, file.name.lastIndexOf(".")) || Infinity) + 1);
                    if("pdf" == extension.toLowerCase()) {
                        fdata.append(i, file);
                        nbfile++;
                    } else {
                        errmsg += errmsg == "" ? "Les fichiers de type "+extension+" ne sont pas acceptés.": " Les fichiers de type "+extension+" ne sont pas acceptés.";
                    }
                });
                if(nbfile != 0) {
                    fdata.append('repertoire', folder);
                    fdata.append('nbfichier', nbfile);
                    $.ajax({
                        enctype: 'multipart/data',
                        type: 'POST',
                        dataType: "JSON",
                        data: fdata,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                        url: base_url()+'administration/uploader_cadre',
                        success: function(data) {
                            if(data.status == 1) {
                                if(errmsg != "") {
                                    $('#warning-cadre').html(errmsg).show().delay(3000).fadeOut(600);
                                }
                                $('div[repertoire='+folder+']').trigger('dblclick');
                            } else {
                                $('#error-cadre').html(data.message != undefined ? data.message+' \n '+data.erreurs : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                            }
                        },
                        error: function() {
                            $('#error-cadre').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                        }
                    })
                }
            }
        }
    });
    
    $(document).on('click','.delete-cadre', function() {
        if(confirm('Supprimer ce document ? Cette action est irréversible')) {
            var li = $(this).parent().parent();
            var nom = li.find('label').html();
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_fichier',
                data: {repertoire: 'documents/cadres/'+folder, nom: nom},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        $('div[repertoire='+folder+']').trigger('dblclick');
                    } else {
                        $('#error-cadre').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-cadre').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click','#valider-annee', function() {
       var annee = $('#input-lib-annee').val();
        if(annee == "") {
            $('#error-saveannee').html("Vous devez ajouter une année").show().delay(3000).fadeOut(600);
        } else if(isNaN(parseInt(annee))) {
            $('#error-saveannee').html("Entrer une valeur exacte s'il vous plait").show().delay(3000).fadeOut(600);
        } else {
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/save_annee',
                data: {nom: parseInt(annee), folder: parseInt(annee), id: $('#id-annee').val()},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-saveannee').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveannee').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('dblclick','.stat-folder', function() {
        folder = $(this).attr('repertoire');
        $('#folder-selected').html('<span class="glyphicon glyphicon-chevron-right"></span>'+$(this).find('.libelle').html());
        $.ajax({
            url:  base_url()+'administration/get_contenustat',
            type: 'POST',
            data: {repertoire: folder},
            success: function(data) {
                $('#bouton-image-stat').show();
                $("#folder-container, #bouton-add-annee-stat").hide();
                $("#back-to-top").show();
                $("#image-container").html(data).show();
            },
            error: function() {
                $('#folder-selected').html("");
                $('#error-stat').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
            }
        
        });
    });
    
    $(document).on('change', '#file-image', function() {
        if(folder != "") {
            if($(this)[0].files != undefined) {
                var fdata = new FormData();
                var errmsg = "";
                var nbfile = 0;
                $.each($(this)[0].files, function(i,file) {
                    var extension = file.name.slice((Math.max(0, file.name.lastIndexOf(".")) || Infinity) + 1);
                    if("png" == extension.toLowerCase() || "jpeg" == extension.toLowerCase() || "jpg" == extension.toLowerCase() || "gif" == extension.toLowerCase()) {
                        fdata.append(i, file);
                        nbfile++;
                    } else {
                        errmsg += errmsg == "" ? "Les fichiers de type "+extension+" ne sont pas acceptés.": " Les fichiers de type "+extension+" ne sont pas acceptés.";
                    }
                });
                if(nbfile != 0) {
                    fdata.append('repertoire', folder);
                    fdata.append('nbfichier', nbfile);
                    $.ajax({
                        enctype: 'multipart/data',
                        type: 'POST',
                        dataType: "JSON",
                        data: fdata,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                        url: base_url()+'administration/uploader_statistique',
                        success: function(data) {
                            if(data.status == 1) {
                                if(errmsg != "") {
                                    $('#warning-stat').html(errmsg).show().delay(3000).fadeOut(600);
                                }
                                $('div[repertoire='+folder+']').trigger('dblclick');
                            } else {
                                $('#error-stat').html(data.message != undefined ? data.message+' \n '+data.erreurs : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                            }
                        },
                        error: function() {
                            $('#error-stat').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                        }
                    })
                }
            }
        }
    });

    $(document).on('click','.delete-image-stat', function() {
        if(confirm('Supprimer cet image ? Cette action est irréversible')) {
            var tmpimg = $(this).parent().find('img').attr("src").split('/');
            var nom = tmpimg[tmpimg.length - 1];
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_fichier',
                data: {repertoire: 'documents/statistiques/'+folder, nom: nom},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        $('div[repertoire='+folder+']').trigger('dblclick');
                    } else {
                        $('#error-stat').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-stat').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click','.delete-folder-stat', function() {
        if(confirm('Voulez-vous supprimer ce dossier ? Cette action est irréversible')) {
            var selector = $(this).parent();
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_dossierstatistique',
                data: {repertoire: selector.attr("repertoire"), id: selector.attr('id').split('-')[1]},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-stat').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-stat').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    /** Début traitement des comptoirs **/
    $(document).on('click', '#ajouter-comptoir', function() {
        $('#modal-gerercomptoir h4').html('Ajouter comptoir');
        $('#id-comptoir').val('');
        $('#input-lib-comptoir').val('');
        $('#modal-gerercomptoir').modal('show');
    });    
    
    $(document).on('click', '.edit-comptoir', function() {
        $('#modal-gerercomptoir h4').html('Modifier comptoir');
        $('#id-comptoir').val($(this).parent().parent().attr('id').split('-')[1]);
        $('#input-lib-comptoir').val($(this).parent().parent().attr('libelle'));
        $('#modal-gerercomptoir').modal('show');
    });
    
    $(document).on('click','#valider-comptoir', function() {
        var lib =  $('#input-lib-comptoir').val();
        var id = $('#id-comptoir').val();
        if(lib == "") {
            $('#error-savecomptoir').html("Vous devez ajouter un libellé s'il vous plait").show().delay(3000).fadeOut(600);
        } else {
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/sauver_comptoir',
                data: {libelle: lib, id: id},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-savecomptoir').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-savecomptoir').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    $(document).on('click','.delete-comptoir', function() {
       if(confirm('Voulez-vous supprimer ce comptoir ?')) {
           var selector = $(this).parent().parent();
           $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_comptoir',
                data: {id: selector.attr('id').split('-')[1]},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('#error-comptoir').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-comptoir').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
       } 
    });
    
    $(document).on('click','#add-link', function() {
        $('#modal-gererlien h4').html('Ajouter un lien');
        $('#id-colab').val('');
        $('#input-nom-colab').val('');
        $('#input-url-colab').val('');
        $('img#logo-collaborateur').attr('src', base_url()+'assets/image/logos_collab/image_logo_default.png');
        $('#modal-gererlien').modal('show');
    });
    
    $(document).on('click','.edit-link', function() {
        var selector = $(this).parent().parent();
        $('#modal-gererlien h4').html('Modifier lien');
        $('#id-colab').val(selector.attr('id').split('-')[1]);
        $('#input-nom-colab').val(selector.find('.nom-colab').html());
        $('#input-url-colab').val(selector.find('.url-colab').html());
        $('img#logo-collaborateur').attr('src',  base_url()+'assets/image/logos_collab/'+(selector.attr('logo') == "" ? 'image_logo_default.png' : selector.attr('logo')));
        $('#modal-gererlien').modal('show');
    });
    
    $(document).on('click','.delete-link', function(){
       if(confirm('Voulez-vous supprimer ce lien ?')) {
           var selector = $(this).parent().parent();
           $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_lien',
                data: {id: selector.attr('id').split('-')[1]},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('#error-colab').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-colab').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
       } 
    });
    
    $(document).on('change','#file-logo', function() {
       readURL($(this),'#logo-collaborateur');
    });
    
    $(document).on('click','#valider-colab', function() {
       var id = $('#id-colab').val();
        var nom = $('#input-nom-colab').val();
        var url = $('#input-url-colab').val();
        if(nom == "") {
            $('#error-savelink').html("Ajouter un nom s'il vous plait").show().delay(3000).fadeOut(600);
        } else if(url == "") {
            $('#error-savelink').html("Ajouter un url s'il vous plait").show().delay(3000).fadeOut(600);
        } else {
            var fdata = new FormData();
            if ($('#file-logo')[0].files && $('#file-logo')[0].files[0]) {
                fdata.append('fichier', $('#file-logo')[0].files[0]);
            }
            fdata.append('id', id);
            fdata.append('nom', nom);
            fdata.append('url', url);
            $.ajax({
               type: 'POST',
                dataType: 'JSON',
                data: fdata,
                processData: false,
                contentType: false,
                url: base_url()+'administration/sauver_lien',
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-savelink').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-savelink').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
    
    //Gestion du profil
    $(document).on('click','#valider-profil', function() {
       var id = $('#id-user').val(); 
       var login = $('#input-login-user').val(), lastpass = $('#input-last-pass').val(), newpass = $('#input-new-pass').val(), confirmpass = $('#input-confirm-pass').val(); 
        if(login == "") {
            $('#error-saveprofil').html("Entrez le nom d'utilisateur").show().delay(3000).fadeOut(600);
        } else {
            var ok = true;
            if(lastpass != "" || newpass != "" || confirmpass != "") {
                if(lastpass == "") {
                    ok = false;
                    $('#error-saveprofil').html("Entrez votre mot de passe actuel").show().delay(3000).fadeOut(600);
                } else if(newpass == "") {
                    ok = false;
                    $('#error-saveprofil').html("Entrez le nouveau mot de passe").show().delay(3000).fadeOut(600);
                } else if(confirmpass == "") {
                    ok = false;
                    $('#error-saveprofil').html("Veuillez confirmer le nouveau mot de passe").show().delay(3000).fadeOut(600);
                } else if(confirmpass != newpass) {
                    ok = false;
                    $('#error-saveprofil').html("Les mots de passe ne correspondent pas").show().delay(3000).fadeOut(600);
                }
            }
            if(ok) {
                $.ajax({
                type: 'POST',
                url: base_url()+'administration/sauver_profil',
                data: {id: id, login: login, pass: lastpass, newpass: newpass},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        $('#modal-gererprofil').modal('hide');
                    } else {
                        $('#error-saveprofil').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveprofil').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
            }
        }
    });
    
    $(document).on('click','#add-administrateur', function() {
       $('#id-adm').val(''); 
       $('#input-adm-nom').val(''); 
       $('#input-adm-prenom').val(''); 
       $('#modal-gereradmin h4').html('Ajouter administrateur');
       $('#modal-gereradmin').modal('show');
    });
    
    $(document).on('click','.edit-administrateur', function() {
        var selector = $(this).parent().parent();
       $('#id-adm').val(selector.attr('id').split('-')[1]); 
       $('#input-adm-titre').val(selector.attr('id').split('-')[2]); 
       $('#input-adm-civ').val(selector.find('.civilite-adm').html()); 
       $('#input-adm-nom').val(selector.find('.nom-adm').html()); 
       $('#input-adm-prenom').val(selector.find('.prenom-adm').html()); 
       $('#modal-gereradmin h4').html('Modifier administrateur');
       $('#modal-gereradmin').modal('show');
    });
    
    $(document).on('click','.delete-administrateur', function(){
       if(confirm('Voulez-vous supprimer cette personne ?')) {
           var selector = $(this).parent().parent();
           $.ajax({
                type: 'POST',
                url: base_url()+'administration/supprimer_administrateur',
                data: {id: selector.attr('id').split('-')[1]},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        selector.remove();
                    } else {
                        $('#error-colab').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-colab').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
       } 
    });
    
    $(document).on('click','#valider-admin', function() {
        var id = $('#id-adm').val();
        var titre = $('#input-adm-titre').val(); 
        var civ = $('#input-adm-civ').val(); 
        var nom = $('#input-adm-nom').val(); 
        var prenom = $('#input-adm-prenom').val(); 
        if(nom == "") {
            $('#error-saveadmin').html("Vous devez ajouter un nom s'il vous plait").show().delay(3000).fadeOut(600);
        } else {
            $.ajax({
                type: 'POST',
                url: base_url()+'administration/sauver_administrateur',
                data: {id: id, civ: civ, titre: titre, nom: nom, prenom: prenom},
                dataType: 'JSON',
                success: function(data) {
                    if(data.status == 1) {
                        window.location.reload();
                    } else {
                        $('#error-saveadmin').html(data.message != undefined ? data.message : "Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                    }
                },
                error: function() {
                    $('#error-saveadmin').html("Erreur lors du traitement. Veuillez actualiser puis réessayer").show().delay(3000).fadeOut(600);
                }
            });
        }
    });
});
       
function base_url() {
   return $('#base-url').val();
}

function readURL(input, output) {
    if (input[0].files && input[0].files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('img'+output).attr('src', e.target.result);
        }
        reader.readAsDataURL(input[0].files[0]);
    } else alert('error');
}