$(document).ready(function() {
	
	$('.preloader svg').fadeIn(1000, function(){
		$('.preloader').delay(3000).fadeOut(1000);
	});
	
	$( ".show-title" ).click(function() {
	    $('li.active').removeClass('active');	 	   
	});
	
	$( ".show-info span" ).click(function() {
	  $( ".modal-info" ).slideDown( 500, function() {
		   $( ".modal-show-info" ).slideDown( 500, function() {});
	  });
	});
	
	$( ".close-modal, .playAudio" ).click(function() {
		$( ".modal-show-info" ).slideUp( 500, function() {
			 $( ".modal-info" ).slideUp( 500, function() { });
		}); 
	});
	
	$( ".modal-info" ).mouseleave(function() {
		$( ".modal-show-info" ).slideUp( 500, function() {
			 $( ".modal-info" ).slideUp( 500, function() { });
		}); 
	});
	
	

    $(".audio-box .hide-audio").click(function() {
        $(".footer-audio").removeClass('show-audio');
        $(".side-buttons").addClass('show-side');
        $('.btt-footer').fadeIn(500);
        $('.audio-box').fadeOut()
    });
    $(".show-right").click(function() {
        $('.audio-box').fadeIn();
        $(".footer-audio").addClass('show-audio');
        $(".side-buttons").removeClass('show-side');
        $('.btt-footer').fadeIn(500)
    });
    $(".close-audio, .vid-link").click(function() {
        $(".footer-audio").removeClass('show-audio');
        $(".side-buttons").removeClass('show-side');
        document.getElementById('audio').pause();
        $('.btt-footer').fadeIn(500);
        $('.playAudio').removeClass('active');
        $('.audio-box').fadeOut()
    });
    
    
     $(".play-audio, .juke-play-audio").click(function() {
        $('.audio-box').fadeIn();
        $('.myAudio').attr("src", $(this).attr("audioUrl"));
        $(".footer-audio").addClass('show-audio');
        document.getElementById('audio').play();
        $('.audioplayer').addClass("audioplayer-playing");
        $(".side-buttons").removeClass('show-side');
        $('.btt-footer').fadeOut(500);
        $('.play-audio, .juke-play-audio').removeClass('active');
        $(this).addClass('active').siblings().removeClass('active')
    });
    
    $(".audio-footer").click(function() {
        $('.audio-box').fadeIn();
        $('.myAudio').attr("src", $(this).attr("audioUrl"));
        $(".footer-audio").addClass('show-audio');
        document.getElementById('audio').play();
        $('.audioplayer').addClass("audioplayer-playing");
        $(".side-buttons").removeClass('show-side');
        $('.btt-footer').fadeOut(500);
        $('.play-audio, .juke-play-audio').removeClass('active');
        $(this).addClass('active').siblings().removeClass('active')
    });
    
    
    $(".audio-box .hide-audio").click(function() {
        $(".footer-audio").removeClass('show-audio');
        $(".side-buttons").addClass('show-side');
        $('.btt-footer').fadeIn(500);
        $('.audio-box').fadeOut()
    });
    $(".show-right").click(function() {
        $('.audio-box').fadeIn();
        $(".footer-audio").addClass('show-audio');
        $(".side-buttons").removeClass('show-side');
        $('.btt-footer').fadeIn(500)
    });
    $(".close-audio, .vid-link").click(function() {
        $(".footer-audio").removeClass('show-audio');
        $(".side-buttons").removeClass('show-side');
        document.getElementById('audio').pause();
        $('.btt-footer').fadeIn(500);
        $('.play-audio, .juke-play-audio').removeClass('active');
        $('.audio-box').fadeOut()
    });
    
    
     $(".play-audio").click(function() {
        $('.audio-box').fadeIn();
        $('.myAudio').attr("src", $(this).attr("audioUrl"));
        $(".footer-audio").addClass('show-audio');
        document.getElementById('audio').play();
        $('.audioplayer').addClass("audioplayer-playing");
        $(".side-buttons").removeClass('show-side');
        $('.btt-footer').fadeOut(500);
        $('.playAudio, .juke-play-audio').removeClass('active');
        $(this).parent().addClass('active')
    });
    
	
	$('.menu-btn, .show-menu').click(function () {
		$('.main-menu').fadeIn(500, function(){
		   
	    	});
		});
	
	$('.close-btn').click(function () {
		$('.main-menu').fadeOut(500, function(){
		   
	    	});
		});
	
	$( function()
		{
			$( '#player' ).audioPlayer();
		});				
			 
});

window.document.onkeydown = function (e) {
    if (!e) e = event;
    if (e.keyCode == 27) {
		$( ".modal-show-info" ).slideUp( 500, function() {});
    }
};
