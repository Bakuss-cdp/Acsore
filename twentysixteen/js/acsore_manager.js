/*------------------ Page espace membre ------------- */
$(document).ready(function(){
    $(".agenda_projet_compterendu li").mouseenter(function(){
		$(this).css({"cursor":"pointer"});
	});
   $(".agenda_projet_compterendu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-contenu").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});


/*------------------ Page Page interculturalité ------------- */

		$(document).ready(function(){
		  $(".contenu_infos").hide();
			$("h2").mouseenter(function(){
				$(this).css("cursor", "pointer")
			});
			  $("h2").click(function(){
				$(this).next().slideToggle("slow");
		  });
		});
	