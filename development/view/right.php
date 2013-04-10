    <script type="text/javascript">
        var imgs = [
        "<?php echo IMAGEPATH; ?>12.png",
        "<?php echo IMAGEPATH; ?>c.png",
        "<?php echo IMAGEPATH; ?>12.png"];
var cnt = imgs.length;
function loadad()
{
 $('#advertisement1').show();
$('#sale1').hide();
$('#rent1').hide();
}
        $(function() {
            setInterval(Slider, 3000);
        });

        function Slider() {
        $('#trulia_fileslide').fadeOut("slow", function() {
           $(this).attr('src', imgs[(imgs.length++) % cnt]).fadeIn("slow");
        });
        }
        $(document).ready(loadad);
</script>
<div class="poster promo" style="height: 120px;" id="advertisement">
		
		<img src="<?php echo IMAGEPATH; ?>real_state.png" height="110px" width="290px" />
			
			</div>



	<div class="ad block" id="advertisement12">
		<span class="disclaimer" style="font-size: 10px;" id="advertisement1"><?php echo $lang->ADVERTISEMENT;?></span>
		<span class="disclaimer" style="font-size: 10px;" id="sale1"><?php echo $lang->PROPERTY."".$lang->FOR."".$lang->SALE;?></span>
		<span class="disclaimer" style="font-size: 10px;" id="rent1"><?php echo $lang->PROPERTY."".$lang->FOR."".$lang->RENT;?></span>
		<img id="trulia_fileslide" alt="" src="" height="250" width="300" />
	</div>
