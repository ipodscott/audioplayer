<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
	<title>Dieselpunk Industries Radio</title>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Dieselpunk Industries Radio" />
	<meta property="og:image" content="https://www.radio.dieselpunkindustries.com/screen_shot.jpg" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700|Material+Icons&display=swap" rel="stylesheet"></head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="player/css/jquery.mCustomScrollbar.min.css" />
	<script src="player/js/jquery.mCustomScrollbar.min.js"></script>
	<link rel="stylesheet" href="player/css/audioplayer.css" />
	<link rel="stylesheet" href="player/css/style.css">

<?php
		$series = $_GET['series'];
		$filecount = 0;
		$files = glob("../$series/*.{mp3,MP3,m4a,M4A,Mp3}", GLOB_BRACE);
		
		// json menu
			$menuData = file_get_contents('menu.json'); // put the contents of the file into a variable
		$menuItems = json_decode($menuData); // decode the JSON feed

		if ($files){
			$filecount = count($files);
		}
		
		$filename = glob("../$series/*.{mp3,MP3,m4a,M4A,Mp3}", GLOB_BRACE);
		$url = "../$series/data.json"; // path to your JSON file
		$data = file_get_contents($url); // put the contents of the file into a variable
		$info = json_decode($data); // decode the JSON feed
		$title = $info[0]->title;
		$year = $info[0]->year;
		$background = $info[0]->background;
		$showinfo = $info[0]->info;
		$summary  = "../$series/summary.txt"; // path to show summary
	?>

		<style type="text/css">
			.preloader{
			display: flex;
			position: fixed;
			top:0px;
			left: 0px;
			width: 100%;
			height: 100vh;
			z-index: 999;
			align-items: center;
			justify-content: center;
			background-color: #000;
			}
			
			.preloader svg{
				width: 300px !important;
				height: 300px !important;
				display: none;
			
			}
		</style>

</head>

<body class="landing-backgound">
	
	<svg xmlns="http://www.w3.org/2000/svg" style="display:none" id="customSvgLibrary">
	
<symbol id="ripples" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background: none;">
  
    <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c1}}" ng-attr-stroke-width="{{config.width}}" stroke="#333333" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="-1s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="-1s" repeatCount="indefinite"></animate>
    </circle>
    
    <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-width="{{config.width}}" stroke="#333333" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"></animate>
    </circle>
    
     <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-width="{{config.width}}" stroke="#333333" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="1s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="1s" repeatCount="indefinite"></animate>
    </circle>
       
   </symbol>

</svg>
	
	<div class="top-bar">
		  <div class="top-bar-info">
			  <div class="show-info"><span>Dieselpunk Industries Radio</span></div>	
			  <span class="menu-btn"><i class="material-icons">menu</i></span>
		  </div>
	</div>
	
	  <div class="main-menu">
		  <div class="list audio-menu">
		  	<?php foreach ($menuItems as $menuItem) : ?>
				<div class="menu-link"><a href="/player/?series=<?php echo $menuItem->link; ?>"><i class="material-icons"> chevron_right </i></a> <?php echo $menuItem->title; ?> </div>
			<?php endforeach; ?>
			<div class="menu-footer"><img class="footer-img" src="/player/images/radio_footer_dark.svg" alt="radio_footer_dark" ></div>
			<div class="menu-title">MAIN MENU - Series: <?php echo count($menuItems);?><span class="close-btn"><i class="material-icons">close</i></span></div>
		  </div>
	  </div>
	 
	 
	 <div class="home-main">
		 <div class="home-main-content">
			 <div class="home-content">
				 <img class="show-menu" src="player/images/radio_top.svg"/>
				 <div class="info-block"><span>Available Series: <?php echo count($menuItems);?></span><span>Total Episodes: 33616</span></div>
				 <div class="info-block"><span>Total Hours: 14247</span><span>Days: 593</span></div>
				 <div class="info-block"><span>Months: 19.78</span><span>Years: 1.65</span></div>
			 </div>
		 </div>
	 </div>
		 
	 <script src="player/js/audioplayer.js"></script>
	  <script src="player/js/scripts.js"></script>
	  <script>$( function() { $( 'audio' ).audioPlayer(); } );</script>
	    <script>
		(function($){
			$(window).on("load",function(){
				
				$(".audio-menu, .audio-list").mCustomScrollbar({
						theme:"light-thin",
						scrollbarPosition: "inside",
				});
				
			});
		})(jQuery);
		
	$("a").click(function (event) {
    event.preventDefault();
    window.location = $(this).attr("href");
});
		
	</script>
	 <div class="preloader">
		 <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ripples"></use></svg>
	  </div>
</body>
</html>