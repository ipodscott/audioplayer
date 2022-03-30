<!doctype html>

<html lang="en">
<head>
	
	<?php  
	
		$menu = $_GET['menu']; 
	
	if(strpos($_SERVER['REQUEST_URI'], 'menu') !== false){
		
	 
	   $menuUrl = htmlspecialchars($_GET["menu"]);
	   $menuTitle = htmlspecialchars($_GET["menu"]);
	   $menuUrl = '../menu-'. $menuTitle .'.json';
	   $menuData = file_get_contents($menuUrl); // put the contents of the file into a variable
	   $menuItems = json_decode($menuData); // decode the JSON feed	
	   $homeLink = '?menu='.$menuTitle.'';
	   
		}else{ 
		$homeLink = '';
		$menuData = file_get_contents('../menu.json'); // put the contents of the file into a variable
		$menuItems = json_decode($menuData); // decode the JSON feed
		
	} ?>
	
	<?php
		$series = $_GET['series'];
		$filecount = 0;
		$files = glob("../$series/*.{mp3,MP3,m4a,M4A,Mp3}", GLOB_BRACE);
		

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
		
		if( isset( $info[0]->info ) ){
			$showinfo = $info[0]->info;
		} else {
			$summary  = "../$series/summary.txt"; // path to show summary
			}
		
		// json menu
		
		$playlistData = file_get_contents('../'.$series.'/audio-list.json'); // put the contents of the file into a variable
		$playlistItems = json_decode($playlistData); // decode the JSON feed
		
	?>
	
	<style type="text/css">
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
			background-size: contain;
			background-color: #000;
		}
		
		.preloader svg{
			width: 300px !important;
			height: 300px !important;
			display: none;
		
		}
	</style>
	
  <meta charset="utf-8">
  <meta name="description" content="<?php echo($summary); ?>">
  <meta name="author" content="Dieselpunk Industries Radio">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta property="og:type" content="website" />
	<meta property="og:title" content="Dieselpunk Industries Radio | <?php echo($title);?>" />
	<meta property="og:description" content="<?php echo($summary); ?>" />
	<meta property="og:image" content="https://www.radio.dieselpunkindustries.com/screen_shot.jpg" />
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Material+Icons&display=swap" rel="stylesheet"></head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
  <script src="js/jquery.mCustomScrollbar.min.js"></script>
   <link rel="stylesheet" href="css/audioplayer.css" />
   <link rel="stylesheet" href="css/plyr.css" />
  <link rel="stylesheet" href="css/style.css">
  <title>Dieselpunk Industries Radio | <?php echo($title);?></title>
  
  <body style="background-image: url(<?php echo($background); ?>);">
	  
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
	  
  	<div class="bg-overlay"></div>
	  <div class="audio-list menu-list"> 
		      
	     <?php 
		     $html = "";	
		     for ($i=0; $i<count($files); $i++)
		     	     
					{
						$path_parts = pathinfo($filename[$i]);
						$num = $files[$i];
						$listName = $path_parts['filename'];
						$listName = str_replace("_"," ",$listName);
						$listName = str_replace(" Aps ","'",$listName);
						$listName = str_replace(" NOs ","#",$listName);
						$listName = ucwords($listName);
						$html .= "<div class='playAudio'>
									<i class='material-icons play-audio' audiourl='$num'>play_circle_filled</i>
									<span class='pod-title'><div class='show-title'><span class='ep-title'>$listName</span> <span class='dl-link'></span></div></span><div class='link-grad' audioUrl='$num'></div><a class='dl-link' href='$num' download><i class='material-icons'> cloud_download </i></a></div>";
										}
						echo($html);
					?>
					
					<?php foreach ($playlistItems as $playlistItem) : ?>
				<div class='playAudio'>
									<i class='material-icons play-audio' audiourl='<?php echo $playlistItem->url; ?>'>play_circle_filled</i>
									<span class='pod-title'><div class='show-title'><span class='ep-title'><?php echo $playlistItem->title; ?></span> <span class='dl-link'></span></div></span><div class='link-grad' audioUrl='$num'></div><a class='dl-link' href='<?php echo $playlistItem->url; ?>' download><i class='material-icons'> cloud_download </i></a></div>
				
			<?php endforeach; ?>
					
				<div class="list-spacer"></div>
					
	  </div>
	  
	  <div class="top-modal-box">
		<div class="modal-info">
			
			<?php
				$audioFiles = $filecount; 
				$playListFiles = count($playlistItems);
			?>
			
			<div class="modal-show-info">
				<div class="show-data">Show Info | Eps: <?php echo $audioFiles + $playListFiles; ?> | Date: <?php echo($year);?> <span class="close-modal"><i class="material-icons">close</i></span> </div> 
				<div class="show-summary">
				
					<?php if( isset( $info[0]->info ) ): ?>
					    <?php echo($showinfo);?>
					<?php endif; ?>
					
					<?php if ( $summary ): ?>
					   <?php include( $summary );?>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	  </div>
	  
	  	<div class="top-bar">
		  <div class="top-bar-info">
			  	<div class="show-info"><span><?php echo($title); ?></div>
			  	
			  	<span class="menu-btn"><i class="material-icons">menu</i></span></span><span class="home-btn">
			  		<a href="/<?php echo $homeLink;?>"><i class="material-icons">home</i></a>
			  	</span>
			  	
			  	
		  </div>
		</div>
	  
	<div style="display: none;" class="audio-footer" audioUrl="stationID.mp3">
						<img src="https://www.radio.dieselpunkindustries.com/player/images/radio_top.svg"/>
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
	  
	 
	  <div class="preloader">
		 <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ripples"></use></svg>
	  </div>
	  
	   <div class="footer-audio" style="display: block !important">
            <div class="audio-box">
                <div class="controls shadow"> <i class="hide-audio material-icons">remove</i> <i class="material-icons close-audio">close</i></div>
                
                
            
            <audio class="myAudio" id="audio" preload="auto" tabindex="0" controls>
                <source src="">
            </audio>
                
            </div>
        </div>
	 
	 <div class="side-buttons show-right shadow"> <i class="material-icons">volume_up</i></div>
	  <script src="js/plyr.js"></script>


  <script>
    const player = new Plyr('#audio');
</script>
	  
	  <script src="js/scripts.js"></script>
	

	
</body>
</html>