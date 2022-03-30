 <div class="main-menu">
		  <div class="list audio-menu">
		  	<?php foreach ($menuItems as $menuItem) : ?>
				<div class="menu-link" onclick="location.href='/player/?series=<?php echo $menuItem->link; ?>';"><i class="material-icons"> chevron_right </i> <?php echo $menuItem->title; ?> </div>
			<?php endforeach; ?>
			<div class="menu-footer"><img class="footer-img" src="/player/images/radio_footer_dark.svg" alt="radio_footer_dark" ></div>
			<div class="menu-title">MAIN MENU - Series: <?php echo count($menuItems);?><span class="close-btn"><i class="material-icons">close</i></span></div>
		  </div>
	  </div>