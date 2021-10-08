<script type="text/javascript">
	var current_url = window.location.href;

	navigation(current_url);
	
	var homepage  = '<?php echo base_url(); ?>';
	if(homepage == current_url || document.title == "Page not found!"){
		$("#menu-toggler").hide();
	}
	//apres le chargement de la page lancer la function Statistic_table pour recupere les données d'une table afin de faire la statique
	Statistic_table('campaign');
	Statistic_table('user');


	function load_ajax_request(url) {
        $.ajax({
        	url:url,
        	method:'GET', 
        	dataType:'text',
        	error:function(data){
        		debug(data.status);
        		if(data.status == 404){
        			$.get('<?=base_url() ?>src/errors', function( data ) {
        				const state = { 'page_id': 1, 'user_id': 5 };
						const title = 'Page not found';
        				history.pushState(state, title, url);
        				$(document).find("#sidebar").removeClass("display");
						$(document).find("#contents").html(data);
					});
        		}
        	},
        	success:function(response){
        		window.location = url;
        	}
        });
    }
	//navigation avec javascript
	function navigation(current_url){
		$(document).find('.navigation').on('click',function(e){
			e.preventDefault();
			
			var this_link_url    = $(this).attr('href');
			if(current_url != this_link_url || current_url != this_link_url+'#'){
				load_ajax_request(this_link_url);
			}
		});
	}

	//permet d'afficher les informations statiques a propos de la campagne realiser
	function TableAnalytic(tablename,nbrtotal,actifItems){
		$("."+tablename+"-nbr").html(nbrtotal);//noombre total de campagne crées
		$('.infobox-'+tablename).html(tablename);//nom de la table
		$('.increase-'+tablename).html(actifItems);//information sur les camapgne actives
	}

	//permet de lancer une requeste ajax pour recupere les infos de maniere stastitiques sur une table donnée
	function Statistic_table(table){
		$.ajax({
			url:'<?= base_url() ?>src/requests/statistic',//url de recherche a laquelle la requete est envoyé
			method:'GET',//methode d'envoie de la requete
			dataType:'json', //type de retour de la reponse
			data:{table: table},//les données a envoyer 
			success:function (data) {//en cas d'aboutissement de la requeste recupere la reponse recut
				TableAnalytic(data.table,data.nbr_total,data.nbr_actif);//appeler la fonction tableanalytic pour charger les données recuperés a la vue selon la table en question
			},
			error:function (response){//en cas d'erreur au niveau du serveur ou du traitement de la requeste afficher ce message dans un alert
				toastr.error('Nous ne pouvons pas effectuer cette opération!');
			}
		});
	}

	function debug(value){
		console.log(value);
	}
</script>