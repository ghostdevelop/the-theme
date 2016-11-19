<?php $GoogleMapFeed = new GoogleMapFeed($options)?>
<div id="<?php echo $GoogleMapFeed->id ?>" class="<?php echo $GoogleMapFeed->type ?>">
	<div id="map-<?php echo $GoogleMapFeed->id ?>" class="map"></div>
	<div class="map-search">
		<form method="post">
			<input type="text" name="p" placeholder="Post ID" value="" />
			<input type="hidden" name="post_type" value="location" />
			<input type="submit" name="google-map-feed" value="Keres" />
		</form>
		<a class="remove">töröl</a>
	</div>	
</div>


