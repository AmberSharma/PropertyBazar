<script type="text/javascript">
function action_open(str)
{
	<?php if(!isset($_SESSION['user_name'])) {?>
	 $(".open").click(function() {
	      $("#facebox").overlay().load();
	      $("div:#tab4").hide();  
	     
	  });
	 $("#facebox").overlay({

		    // custom top position
		    top: 260,

		    // some mask tweaks suitable for facebox-looking dialogs
		    mask: {

		    // you might also consider a "transparent" color for the mask
		    color: '#fff',

		    // load mask a little faster
		    loadSpeed: 200,

		    // very transparent
		    opacity: 0.5
		    }

		    // disable this for modal dialog-type of overlays
		   // closeOnClick: false,

		    // load it immediately after the construction
		    

		    });  
	
	<?php 
}
	else {
?>
	$('#searchresult').load("<?php echo NEWPATH ;?>" + str, function() {
	              
			});


<?php 
}
?>
}

function action(str)
{  
	$('#searchresult').load("<?php echo NEWPATH ;?>" + str, function() {
	              
			});
}
</script>
<style>

#left
{
margin-left:30px;
margin-right:35px;
margin-top:-10px;
}
#right
{
margin-left:-20px;
}

</style>
<section id="extra">

			<aside id="right">
			<div class="poster agent-ad" >
				<a href="javascript:void(0)" class="open" onclick="action('question.php')"><img src="<?php echo IMAGEPATH; ?>faq.png"
					alt="Increase your exposure to buyers" height="230" width="270"></a>
			</div>
			</aside>
			<aside id="left">
			<div class="poster" style="height: 60px; width:290px;">
			<a href="https://www.twitter.com/" target="_blank"><img src="<?php echo IMAGEPATH; ?>twitter.png" height=30px width=50px ></a>
			<a href="https://www.facebook.com/" target="_blank"><img src="<?php echo IMAGEPATH; ?>facebook.png" height=35px width=50px ></a>
			<a href="https://www.youtube.com/" target="_blank"><img src="<?php echo IMAGEPATH; ?>youtube.png" height=30px width=50px ></a>
			<a href="https://www.blogger.com/" target="_blank"><img src="<?php echo IMAGEPATH; ?>blogger.png" height=35px width=50px ></a>
			<a href="https://www.google.co.in/" target="_blank"><img src="<?php echo IMAGEPATH; ?>google.png" height=30px width=50px ></a>
			
		
			
			</div>
			<div class="poster promo">
		<div class="container" style="height: 130px; width:290px;">
		<a href="javascript:void(0)" class="open" onclick="action_open('imageupload.php')" ><img src="<?php echo IMAGEPATH; ?>advertisehere.png" height=120px width=200px />
			</a></div>
		</div>
		</aside>

		<aside id="center">

			<div class="poster agent-ad" >
				<img src="<?php echo IMAGEPATH; ?>functionarea.jpg"
					alt="Increase your exposure to buyers" height="230" width="270">
			</div>
		</aside>

</section>
