<?php
require_once SITEPATH."model/propertyfeature_class.php";
?>
<style>
.simple_overlay {
 display:none;
 z-index:10000;
 background-color:#333;
 width:360px;
 min-height:200px;
 border:1px solid #666;
 -moz-box-shadow:0 0 90px 5px #000;
 -webkit-box-shadow: 0 0 90px #000;
}
.simple_overlay .close {
    background-image:url(http://localhost/PropertyBazar/trunk/development/images/close.png);
    position:absolute;
    right:-15px;
    top:-15px;
    cursor:pointer;
    height:35px;
    width:35px;
}

</style>
<section class="posters">
	<header>
		<span id="ts__posters_location" class="location">Noida, 62</span>
	</header>
		<?php 
			$obj= new  Propertyfeature();
			$count=$obj->countProperty();
			$bestProperty=$obj->bestProperty();
			$housecount=$obj->houseCount();
			$uri = explode("/",$bestProperty[0]['image']);
			$image =$uri[count($uri)-1];
			$imageurl=IMAGEPATH. $image;
		?>
						
		<div class="poster listings ">
		<h2 id="ts__poster_listings_header"><?php echo $lang->TODAY.$lang->LOCAL.$lang->LISTINGS;?></h2>

		<figure id="primary_listing_image">
			<a href="javascript:void(0)" id="ts__primary_listing_image_link" >
				<img src="<?php echo $imageurl; ?>"  style="border:1px solid red; width:50px;" />
			</a>
		</figure>
		
		<ul class="full-listings">
			<li><a
				href="javascript:void(0)"
				class="new-listings-link" id="ts__listing_item_new_listings" onclick="todayattract('todayattraction.php')"> <em
					class="listing-type-count"></em><?php echo $lang->TODAY;?><i><?php echo $lang->ATTRACTION;?></i>
			</a></li>

			<li><a href="javascript:void(0)" onclick="todayattract('newproperty.php')">10</em> <?php echo $lang->NEW;?> <i><?php echo $lang->ARRIVALS;?></i></a>
			</li>
			<li><?php echo $housecount[0]['a']; ?></em><?php echo " " . $lang->OPEN;?><i><?php echo $lang->HOUSES;?></i>
			</li>
			<li><?php echo $count[0]['a']; ?></em> <?php echo $lang->TOTAL;?> <i><?php echo $lang->LISTINGS;?></i>
			</li>
		</ul>
	</div>

	<div class="poster whatsup ">
<h2 id="ts__poster_whatsup_header"><?php echo $lang->WHAT." ".$lang->UP." ".$lang->IN." ".$lang->NOIDA;?> </h2>

<img src="http://localhost/PropertyBazar/trunk/development/images/noida.png" rel="#mies15" alt="noida" height="200px;" width="280px;">
			
		
		<div class="agents type_recommended">
			<h3>
				<b><?php echo $lang->RECOMMENDED;?></b> <?php echo $lang->AGENTS;?>
			</h3>
			<p class="agents">
<a
					class="userpic agent" id="ts__poster_whatsup_agents_agent_3409447"><img
					src="http://localhost/PropertyBazar/trunk/development/images/amber.png"
					alt="agent"></a><span class="userpic_details"><a
					href="http://www.trulia.com/profile/brooklynrealtors/" class="name"
					id="ts__poster_whatsup_agents_agent_details_3409447">Amber Sharma</a><span
					class="details"><span class="status"><?php echo $lang->ADMINISTRATOR;?></span><span
						id="ts__poster_whatsup_agents_agent_details_location_3409447"
						class="location"><?php echo $lang->INDIA;?></span></span><span class="reviews">20
						<?php echo $lang->REVIEWS;?></span><span id="badges3409447" class="badges"> </span></span>
				<a 	class="userpic agent" id="ts__poster_whatsup_agents_agent_5064466"><img
					src="http://localhost/PropertyBazar/trunk/development/images/mohit.png"
					alt="agent"></a><span class="userpic_details"><a
					 class="name"
					id="ts__poster_whatsup_agents_agent_details_5064466">Mohit Gupta</a><span
					class="details"><span class="status">Agent</span><span
						id="ts__poster_whatsup_agents_agent_details_location_5064466"
						class="location"><?php echo $lang->VAISHALI;?></span></span><span class="reviews">41
						<?php echo $lang->REVIEWS;?></span><span id="badges5064466" class="badges"></span></span>
				
						<a
					class="userpic agent" id="ts__poster_whatsup_agents_agent_3409447"><img
					src="http://localhost/PropertyBazar/trunk/development/images/satyavir.png"
					alt="agent"></a><span class="userpic_details"><a
					href="http://www.trulia.com/profile/brooklynrealtors/" class="name"
					id="ts__poster_whatsup_agents_agent_details_3409447">Satyavir Sinha</a><span
					class="details"><span class="status"><?php echo $lang->AGENT;?></span><span
						id="ts__poster_whatsup_agents_agent_details_location_3409447"
						class="location"><?php echo $lang->NOIDA;?></span></span><span class="reviews">20
						<?php echo $lang->REVIEWS;?></span><span id="badges3409447" class="badges"> </span></span>
						<a
					class="userpic agent" id="ts__poster_whatsup_agents_agent_3409447"><img
					src="http://localhost/PropertyBazar/trunk/development/images/chandan.png"
					alt="agent"></a><span class="userpic_details"><a
					href="http://www.trulia.com/profile/brooklynrealtors/" class="name"
					id="ts__poster_whatsup_agents_agent_details_3409447">Chandan</a><span
					class="details"><span class="status"><?php echo $lang->AGENT;?></span><span
						id="ts__poster_whatsup_agents_agent_details_location_3409447"
						class="location"><?php echo $lang->VASUNDHARA;?></span></span><span class="reviews">20
						<?php echo $lang->REVIEWS;?></span><span id="badges3409447" class="badges"> </span></span>
						<a 	class="userpic agent" id="ts__poster_whatsup_agents_agent_5064466"><img
					src="http://localhost/PropertyBazar/trunk/development/images/debanshu.png"
					alt="agent"></a><span class="userpic_details"><a
					 class="name"
					id="ts__poster_whatsup_agents_agent_details_5064466">Debanshu Kar</a><span
					class="details"><span class="status"><?php echo $lang->AGENT;?></span><span
						id="ts__poster_whatsup_agents_agent_details_location_5064466"
						class="location">SIKANDRABAD</span></span><span class="reviews">41
						<?php echo $lang->REVIEWS;?></span><span id="badges5064466" class="badges"></span></span>
				
			

		</div>

	</div>
<div class="simple_overlay" id="mies15">
  				
  			<img src="http://localhost/PropertyBazar/trunk/development/images/noida.png" />
</div>
	

</section>
<script>
$("img[rel]").overlay();
	function todayattract(str)
{  
		$('#searchresult').load("<?php echo NEWPATH ;?>" + str, function() {
	               //alert('Load was performed.');
			});
}
</script>



