jQuery(document).ready(function ($) {
/////////////////////////////////////////////////////////////////////////////////////////////	
	var $window = $(window);	
	function checkWidth() {
		var windowsize = $window.width();
        /// Annuler l'envoi vers téléphone pour autre que mobile
        if (windowsize > 1025) {
            $("#number").attr("href", "javascript:void(0)");
        }

        // création du bouton pour afficher sous menu
        var zetext = $( ".navbar-collapse" ).find( ".nav-child" );
        
        var moretxt = "fa-plus-circle";
        var lesstxt = "fa-minus-circle";
       
        
        if (windowsize < 1199) {   
            
            zetext.hide();          

            $( "<i></i>" ).appendTo('li.parent').addClass( "button fa-plus-circle" ).click(function (){
                    if (zetext.is(":hidden")) {
                        zetext.slideDown("200");
                        $(this).toggleClass(lesstxt).removeClass(moretxt);      
                    } else {
                        zetext.slideUp("200");
                        $(this).toggleClass(moretxt).removeClass(lesstxt);      
                    }
            });	
       
        } else if (windowsize >= 1199) {
                
                $('li.parent').find(".button").hide();        
        };
        
    }
    
	// Execute on load
	checkWidth();	

});




jQuery(document).ready(function ($) {
	
	
	////////////////////////////////// Afficher le tél
	$("#number").click(function(){
	   $(this).find('span').text($(this).data('number')); 
	});   	
	
		
	///////////////////////////////
	// activation totop
	///////////////////////////////
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.totop');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
	//ouverture fermeture hamburgers
    $(".hamburger").click(function() {
      $(this).toggleClass("open");
    });	
   
});