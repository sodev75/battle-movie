jQuery(document).ready(function () {
 
	jQuery('.rating').on('rating.change', function() {
	
		var note = jQuery(this).val();
		var idFilm = jQuery(this).attr("id");
		var url = jQuery(location).attr('href');
		var id =  url.split('/').pop();
		//var idSaga = "1";
		console.log("idfilm : "+idFilm+ "  id : "+id);
		
		$.ajax({
	       url : path,
	       type : 'POST',
	       dataType : 'json',
	       data: {note : note, id_film: idFilm, id_utilisateur: id},
	       success : function(code_html, statut){
	           
	       },

	       error : function(resultat, statut, erreur){

	       },

	       complete : function(resultat, statut){

	       }

	    });
	});
	jQuery('.imgsaga').on('click', function(){
		jQuery('#periode').show();
		jQuery(this).addClass("sagachoix");
		
	});
	jQuery('#periode').on('change', function(){
		
		var saga = jQuery('.sagachoix').attr("id");
		
		if(saga == "starwars"){
			saga = 1;
		}
		else{
			saga = 2;
		}
		var periode = jQuery(this).val();
		
		console.log("saga : "+saga+ " periode : "+periode);
		$.ajax({
		       url : urlvote,
		       type : 'POST',
		       dataType : 'json',
		       data: {saga : saga, periode: periode},

		       complete : function(resultat, statut){
		    	    jQuery('#listfilms').html(resultat.responseJSON);
		    	 
		       }

		    });
	});

});