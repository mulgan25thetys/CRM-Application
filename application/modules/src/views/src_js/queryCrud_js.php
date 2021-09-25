<script type="text/javascript">
    
    var table       = $("#table_paginate").attr("table-name");
    var formInsert  = $("#insert_"+table);
    var formEdit    = $("#edit_"+table);
    var currentPage = $(location).attr('pathname');
    var message     = $("#message");
    var inputs      = $('input').attr('class');
    $('input[name=_ci_csrf_token]').addClass('csrfName');
    var csrfName = $('.csrfName').attr('name');
    var csrfValue = $('.csrfName').val();

    fetch(1,csrfName,csrfValue);
    //recherche de données en temps réels
    $( "#search_data" ).keyup(function() {
        var search = $(this).val();
        if(search != ''){
            Load_Data(search);
        }else{
           fetch(1,csrfName,csrfValue);
        }
    });

    function getSelected_item_nbr(){
        var id = $(document).find('.checkitem:checked').map(function (argument) {
            return $(this).val();//recupere les valeur des lignes selectionnées
        });
        return id;
    }

    function reloadpage(){
        setInterval(function () {
            location.reload();
        },1000);
    }

    function regenerate_token(){
        $.ajax({
            url:'<?php echo base_url();?>src/get_query/get_token',
            dataType:'json',
            success:function(resp) {
                $(".csrfName").val(resp.token);
            },
            error:function (){toastr.error('Nous ne  pouvons pas éffectuer cette opération!');}
        });
    }

    $(document).ready(function(){

        //multiple selection
        $(document).on('change',"#checkall",function() {
            $(document).find('.checkitem').prop("checked",$(this).prop("checked"));

            if(getSelected_item_nbr().length > 0){//si aucune ligne selectionnée afficher le message
                $("#delete_multiple").show();
                $(document).find('.checkitem:checked').parent().parent().parent().addClass('selected');
            }else{
                $(document).find('.checkitem').parent().parent().parent().removeClass('selected');
                $("#delete_multiple").hide(); 
            }
        });

        $(document).on('change',".checkitem",function() {
            $(this).parent().parent().parent().removeClass('selected')
                   .addClass($(this).prop("checked") ? 'selected' : '');
            if(getSelected_item_nbr().length > 0){
                $(document).find('#checkall').prop("checked",true); 
                $("#delete_multiple").show();
            }else{
                $(document).find('#checkall').prop("checked",false);
                $("#delete_multiple").hide(); 
            }
        });

        //permet d'afficher le reste du formulire lorsque ce dernier est long
        $(".chevron-form_rest").on('click',function(){
            var icon=$(this).find('i')[0];
            $("#form_rest").toggle();//affichage et masquage du reste des champs du formulaire
            if($(icon).hasClass('ace-icon fa fa-chevron-down')){
                $(icon).prop('class','ace-icon fa fa-chevron-up');//changement de l'icon up down
            }else{
               $(icon).prop('class','ace-icon fa fa-chevron-down');//changement de l'icon up down
            }
        });
        
        //permet d'activer une ligne d'une table comme activer une campaign
        $(document).on('click','.enabledItem',function(){
            var tablename       = $("#table_paginate").attr("table-name");
            load_query_ajax_request('<?= base_url() ?>src/crud/enabledRow','GET',{enabled:1,id:$(this).val(),table:tablename,[csrfName]:csrfValue},'Activation');
        })

        //permet desactiver une ligne d'une table comme activer une campaign
        $(document).on('click','.denabledItem',function(){
            var tablename       = $("#table_paginate").attr("table-name");
            load_query_ajax_request('<?= base_url() ?>src/crud/enabledRow','GET',{enabled:0,id:$(this).val(),table:tablename,[csrfName]:csrfValue},'Activation');
        })

        //lancer le formulaire d'insertion
        $("#launchModal").on('click',function(){
            if(table == 'campaign'){
                $.ajax({
                    url:'<?= base_url() ?>src/crud/get_campaign_id',
                    dataType:'json',
                    success:function(data) {
                        $("#InsertForm input[name=campaign_id]").val(data.id);
                    },
                    error:function() {toastr.error('Nous ne  pouvons pas éffectuer cette opération!', 'Insertion');}
                });
            }
            $("#InsertForm").modal('show');
        });

        //Suppression mutiple
        $("#delete_multiple").on('click',function(e){
                swal({//permet d'afficher un message d'avertissement avant suppression
                  title: "Suppresion?",
                  text: "( "+getSelected_item_nbr().length+" ) suppresion(s) voulez-vous éffectuer cette opération!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {//en cas de confirmation lancer le proceccus de suppression
                    if(willDelete) {
                        multiple_delete();//sinon lancer la suppresion multiple
                    }
                });          
        });
    });   
	
    //permet de faire une insertion sur une table
     formInsert.submit(function(e){

        e.preventDefault();
        //regenerate_token();
        load_crud_ajax_request($(this).attr('action'),$(this).serialize(),'Insertion','InsertForm',formInsert);
    });

    //mofification
    formEdit.submit(function(e){
        e.preventDefault(); 
        ///regenerate_token();
        load_crud_ajax_request($(this).attr('action'),$(this).serialize(),'Modification','EditForm',formEdit);
    });
    //permet de faire la suppremssion d'une données
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var iddelete = $(this).attr('value');
        swal({//permet d'afficher un message d'avertissement avant suppression
              title: "Suppresion?",
              text: "Voulez-vous supprimer cet enregistrement!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {//en cas de confirmation lancer le proceccus de suppression
              if (willDelete) {
                load_query_ajax_request('<?= base_url()?>src/crud/delete','POST',{table: table, id:iddelete,[csrfName]:csrfValue},'Suppresion');
              } 
            });

    });

    function load_loader(color,text='') {
        return '<i class="ace-icon fa fa-spinner fa-spin '+color+' bigger-125"></i>'+text;
    }
    function load_crud_ajax_request(url,data,type,modalform,form){
        $.ajax({

            url:url,
            method:'POST',
            dataType:'json',
            data:data,
            beforeSend:function(){//avant d'envoyer lancer le loader
                $(".btn_submit_"+table).prop('disabled',true);
                $(".btn_submit_"+table).html(load_loader('white',"Saving ..."));
            },
            complete:function(){//a la fin de l'envoie cacher le loader
                $(".btn_submit_"+table).prop('disabled',false);
                $(".btn_submit_"+table).html('Save '+table);
            },
            success:function(resp){//en cas de success recuperation des données envoyer depuis php
                console.log(resp.data);
                regenerate_token();
                if(resp.response == "success"){//si la reponse envoyer par le serveur egale success alors
                    //fetch(1,csrfName,csrfValue);
                    $("#"+modalform).modal('hide');
                    toastr.success(type+" avec success", type);//afficher le message de success
                    form[0].reset();
                    message.html('');
                    $('.fieldset').removeClass('is-invalid').removeClass('is-valid');
                    $('.text-danger').remove();
                    //reloadpage();
                    fetch(1,csrfName,csrfValue);
                }else{//sinon
                    
                     $.each(resp.message, function (key, value){
                    var element = $('input[name='+ key+']');

                    element.closest('fieldset')
                            .removeClass('is-invalid')
                            .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                            .find('.text-danger').remove();

                    element.after(value);
                    });
                    $(".close").removeAttr('data-dismiss');
                    $(".close").removeAttr('arial-label');
                    $(".close").on('click',function (e) {
                        e.preventDefault();
                        confirmation(form);
                    });
                }
            },
            error:function(){//en cas d'echec afficher le message d'erreur renvoyer par le serveur
                toastr.error('Nous ne  pouvons pas éffectuer cette opération!', type);
            }

        });
    }
    function confirmation(form){
        swal({//permet d'afficher un message d'avertissement avant suppression
              title: "Annulation?",
              text: "Voulez-vous annuler cette opération!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willok) => {//en cas de confirmation lancer le proceccus de suppression
              if (willok) {
                form[0].reset();
                $("#InsertForm").modal( "hide" );
                reloadpage();
              } 
            });
    }

    $('.reload').on('click',function (e) {
        e.preventDefault();
        fetch(1,csrfName,csrfValue);
    });
    //permet de faire une modification des champs d'une table
    $(document).on('click',"#edit",function(e){
        $(this).addClass('editup');
        e.preventDefault();
        $(".message_campaign_id ").html('');
        var idedit = $(this).attr('value');
        load_query_ajax_request('<?= base_url()?>src/crud/get_entry','POST',{table: table, id:idedit,[csrfName]:csrfValue},'Mise à jour');
    });
    $(document).on('click','#show',function(e){
        e.preventDefault();
        $(".message_campaign_id ").html('');
        var idshow = $(this).attr('value');
        load_query_ajax_request('<?= base_url()?>src/crud/get_entry','POST',{table: table, id:idshow,[csrfName]:csrfValue},'Show');
    });
    //d'afficher les tous les enregistrement de la table
    function fetch(page,csrfName,csrfValue) {
        var path   = window.location.pathname;
        var table       = $("#table_paginate").attr("table-name");
        load_query_ajax_request('<?= base_url()?>call/campaign/read/'+page,'GET',{page:1,table:table,[csrfName]:csrfValue},'Affichage');
    }
    
    //permet de faire une recherche dans un module données
    function Load_Data(data=''){
        var table       = $("#table_paginate").attr("table-name");
        load_query_ajax_request($("#form_search").attr('action'),'POST',{query:data,table:table},'Recherche');
    }

    //permet de charger les valeurs a verifier
    function Load_value(caller,message){
        var tablename       = $("#table_paginate").attr("table-name");
        load_query_ajax_request('<?= base_url() ?>src/crud/realTime_checkValue','POST',{table:tablename,value:caller.val()},'Vérification');
    }
    //permet de faire une suppression multiple
    function multiple_delete(){
        var tablename       = $("#table_paginate").attr("table-name");//recupere la table
        var id=$(document).find('.checkitem:checked').map(function(){
            return $(this).val();
        }).get().join('/');

        load_query_ajax_request('<?= base_url() ?>src/crud/delete_multiple','POST',{id:id,table:tablename},'Suppresion multiple');
    }

    function load_query_ajax_request(url,method,data,type){
        var csrfName = $('.csrfName').attr('name');
        var csrfValue = $('.csrfName').val();
        $.ajax({
            url:url,
            method:method,
            dataType:'json',
            data:data,
            beforeSend:function(){
                $("#widget-box-1").addClass('position-relative');
                $(".widget-box-overlay").show();
            },
            complete:function(){
                $("#widget-box-1").removeClass('position-relative');
                $(".widget-box-overlay").hide();
            },
            success:function(resp){//en cas de success recuperation des données envoyer depuis php
                regenerate_token();
                switch (type) {
                    case 'Mise à jour':
                        var chk_box_arry = ['recording','answering_machine_detection'];
                        if(resp.response == "success"){
                            for(var i in resp.message){
                                if(chk_box_arry.includes(i)){
                                    if(resp.message[i] == "on"){
                                        $("#"+i).attr('checked',"true");
                                    }else{
                                        $("#"+i).removeAttr('checked');
                                    }
                                }
                                $("#"+i).val(resp.message[i]);
                            }
                            $("#EditForm").modal('show');
                            return true;
                        }else{//sinon
                            message.html(resp.message).addClass('text-danger');
                        }
                        break;
                    case 'Show':
                        if(resp.response == "success"){
                            for(var i in resp.message){
                                $("#show"+i).html(resp.message[i]);
                            }
                            $("#ShowForm").modal('show');
                        }else{//sinon
                            message.html(resp.message).addClass('text-danger');
                        }
                        break;
                    case 'Suppresion':
                        if(resp.response == "success"){
                            swal(resp.message, {icon: "success",});//afficher le message de success
                            fetch(1,csrfName,csrfValue);
                            //reloadpage();
                        }else{//sinon
                           toastr.error(resp.message, type);
                        }
                        break;
                    case 'Suppresion multiple':
                        if(resp.response == 'success'){
                            toastr.info(resp.message, 'Suppresion');
                            $(document).find("#delete_multiple").hide();
                        }else{
                            toastr.error(resp.message, 'Suppresion');
                        }
                        fetch(1,csrfName,csrfValue);
                        break;
                    case 'Vérification':
                        if(resp.response == "error"){
                            caller.css('border','1px solid red');
                            message.html(resp.message).addClass('text-danger');
                        }else if(resp.response == "success"){
                            caller.css('border','1px solid green');
                            message.html(resp.message).addClass('text-success');
                        }
                        break;
                    case 'Recherche':
                        if(resp.response == "success"){
                            $("#table_paginate").html(resp.result);
                        }else{
                            $("#table_paginate").html(resp.result);
                        }
                        break;
                    case 'Activation':
                        if(resp.response == 'success'){
                            if(resp.theme == 'info'){toastr.info(resp.message, 'Activation');}
                            else { toastr.warning(resp.message, 'Activation'); }
                        }else{
                            toastr.error(resp.message, 'Activation');
                        }
                        fetch(1,csrfName,csrfValue);
                        break;
                    default:
                        $("#table_paginate").html(resp.data_table);
                        $("#pagination_link").html(resp.pagination_link);
                        break;
                }

            },
            error:function(resp){//en cas d'echec afficher le message d'erreur renvoyer par le serveur
                if(type == 'Affichage'){
                    $("#tbody").html(resp);
                }
               toastr.error('Nous ne  pouvons pas éffectuer cette opération!', type);
            }
        });
    }
</script>
