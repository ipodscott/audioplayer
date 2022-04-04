<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	
		if(strpos($_SERVER['REQUEST_URI'], 'menu') !== false){
		   $menu = $_GET['menu']; 
		   $menuTitle = htmlspecialchars($_GET["menu"]);
		   $menuData = file_get_contents('menu-'. $menuTitle .'.json'); // put the contents of the file into a variable
		   $menuItems = json_decode($menuData); // decode the JSON feed	
		   $specs = 'specs-'. $menuTitle .'.json';
	   
		}else{ 
	
			$menuData = file_get_contents('menu.json'); // put the contents of the file into a variable
			$menuItems = json_decode($menuData); // decode the JSON feed
			$specs = "specs.json"; // path to your JSON file

		
		}
			//$series = $_GET['series'];
			//$filecount = 0;
			//$files = glob("../$series/*.{mp3,MP3,m4a,M4A,Mp3}", GLOB_BRACE);
		
		
		//if ($files){
			//$filecount = count($files);
		//}
		
		//$filename = glob("../$series/*.{mp3,MP3,m4a,M4A,Mp3}", GLOB_BRACE);
		$data = file_get_contents($specs); // put the contents of the file into a variable
		$info = json_decode($data); // decode the JSON feed
		$player_title = $info[0]->player_title;	
		$show_hide_info = $info[0]->show_hide_info;
		$total_episodes = $info[0]->total_episodes;
		$total_hours = $info[0]->total_hours;
		$days = $info[0]->days;
		$months = $info[0]->months;
		$years = $info[0]->years;
		$background_image = $info[0]->background_image;
		$background_video = $info[0]->background_video;
		$main_image = $info[0]->main_image;
		$stream_url_title = $info[0]->stream_url_title;
		$streaming_url = $info[0]->stream_url;
		$drop_title = $info[0]->drop_title;
		$summary = $info[0]->info_file;	
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
	<title><?php echo $player_title ?></title>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $player_title ?>" />
	<meta property="og:image" content="https://www.radio.dieselpunkindustries.com/screen_shot.jpg" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700|Material+Icons&display=swap" rel="stylesheet"></head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="player/css/audioplayer.css" />
	<link rel="stylesheet" href="player/css/style.css">

		<style type="text/css">
			
			body{
				background-position: center center;
		background-repeat: no-repeat;
		background-position: center center;
		background-size: cover;
		background-image: url('<?php echo $background_image; ?>') !important;
		margin: 0;
		padding: 0;

			}
			
			.preloader{
			background-image: url(/player/images/radio_bg.jpg);
			background-position: center center;
			background-repeat: no-repeat;
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
			
	.video{
		position: fixed;
		height: 100%;
		width: 100%;
		background-color: #000;
		opacity: 0.6;
	}
	
	#video_background { 
		position: fixed; 
		bottom: 0px; 
		right: 0px; 
		min-width: 100%; 
		min-height: 100%; 
		width: auto; 
		height: auto; 
		overflow: hidden; 
	}	
	
	
		</style>

</head>

<body>

<?php if( $background_video ): ?>
	
	<div class="video">
		
		<video id="video_background" poster="" autoplay="" loop="" muted="">
	      <source src="<?php echo $background_video; ?>" type="video/mp4">
	    </video>
	     
	</div>
	
<?php endif; ?>



	
	<svg xmlns="http://www.w3.org/2000/svg" style="display:none" id="customSvgLibrary">
	
<symbol id="ripples" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background: none;">
  
    <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c1}}" ng-attr-stroke-width="{{config.width}}" stroke="#666666" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="-1s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="-1s" repeatCount="indefinite"></animate>
    </circle>
    
    <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-width="{{config.width}}" stroke="#666666" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"></animate>
    </circle>
    
     <circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-width="{{config.width}}" stroke="#666666" stroke-width="0.5">
      <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="2.6" keySplines="0 0.2 0.8 1" begin="1s" repeatCount="indefinite"></animate>
      <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="2.6" keySplines="0.2 0 0.8 1" begin="1s" repeatCount="indefinite"></animate>
    </circle>
       
   </symbol>

</svg>
	
	<div class="top-bar">
		  <div class="top-bar-info">
			  <div class="show-info"><span><?php echo $player_title; ?></span></div>	
			  <span class="menu-btn"><i class="material-icons">menu</i></span>
		  </div>
	</div>
	
	
	<div class="top-modal-box">
		<div class="modal-info">
			
			
			<div class="modal-show-info">
				<div class="show-data"><?php echo $drop_title; ?> <span class="close-modal"><i class="material-icons">close</i></span> </div> 
				<div class="show-summary">
					<?php if ( $summary ): ?>
					   <?php include( $summary );?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	  </div>
	
	  <div class="main-menu">
		  <div class="list audio-menu">
		  	<?php foreach ($menuItems as $menuItem) : ?>
				<div class="menu-link"><span title="Listen to: <?php echo $menuItem->title; ?>" onclick="location.href='/player/?series=<?php echo $menuItem->link; ?>';"><i class="material-icons"> chevron_right </i></span> <?php echo $menuItem->title; ?> </div>
			<?php endforeach; ?>
			<div class="menu-footer"><img class="footer-img" src="/player/images/radio_footer_dark.svg" alt="radio_footer_dark" ></div>
			<div class="menu-title">MAIN MENU - Series: <?php echo count($menuItems);?><span class="close-btn"><i class="material-icons">close</i></span></div>
		  </div>
	  </div>
	 
	 
	 <div class="home-main">
		 <div class="home-main-content">
			 <div class="home-content">
				 <img class="show-menu" src="<?php echo $main_image; ?>"/>
				 
				 
				 <?php if($show_hide_info == 'show') : ?>
				 
					 <div>
					 <div class="info-block"><span>Available Series: <?php echo count($menuItems);?></span><span>Total Episodes: <?php echo $total_episodes; ?></span></div>
					 <div class="info-block"><span>Total Hours: <?php echo $total_hours; ?></span><span>Days: <?php echo $days; ?></span></div>
					 <div class="info-block"><span>Months: <?php echo $months; ?></span><span>Years: <?php echo $years; ?></span></div>
					 </div>
				 
				 <?php endif ?>
				 
				 
				 <?php if( $streaming_url ): ?>
	
				 	<div><center><span class="listen-live" onclick="location.href='<?php echo $streaming_url; ?>';"><?php echo $stream_url_title; ?> <span class="material-icons"> radio </span></span></center></div>
	
				 <?php endif; ?>
				
			 </div>
		 </div>
	 </div>
		 
	 <script src="player/js/audioplayer.js"></script>
	  <script src="player/js/scripts.js"></script>
	  <script>$( function() { $( 'audio' ).audioPlayer(); } );</script>
	   	 <div class="preloader">
		 <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ripples"></use></svg>
	  </div>
</body>
</html>