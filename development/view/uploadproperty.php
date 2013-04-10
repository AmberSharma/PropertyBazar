<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
<script src="../javascript/jquery.tools.min.js"></script>
<script type="text/javascript">
$("#myform").validator();

$.tools.validator.fn("[minlength]", function(input, value) {
    var min = input.attr("minlength");
 
    return value.length >= min ? true : {
    en: "Please provide at least " +min+ " character" + (min > 1 ? "s" : ""),
    fi: "Kent&auml;n minimipituus on " +min+ " merkki&auml;"
    };
    });

var Upload = function() {
	$(document).ready(function(){
$('#id1').hide();
		
	});
    $(function() {
        $('iframe[name=process]').load(function() {
        	
        	$('#id1').show();
       $('.div1').hide('slow', function() {
              // alert('Your file has been successfully uploaded.');
               
            });
        });
    });
    return {
        start: function() {
            $('.div1').show();
            
        }
    }
}();  

function dynamic2(parent,child){

	var parent_array = new Array();

	parent_array[''] = ['Please select a manufacturer'];

	parent_array['noida'] = ['5','6','7','8','9','10','11','12','14','57','62','63','71'];

	parent_array['ghaziabad'] = [''];

	parent_array['vaishali'] = ['1','2','3'];

	parent_array['vasundhara'] = ['1','2','3','4','9','10','13','15'];

	parent_array['sikandrabad'] = ['Ibiza','New Ibiza','Leon'];

	parent_array['bulanshr'] = ['Fabia','Octavia Tour','Octavia 2','Superb'];

	var thechild = document.getElementById(child);

	thechild.options.length = 0;

	var parent_value = parent.options[parent.selectedIndex].value;

	if (!parent_array[parent_value]) parent_value = '';

	thechild.options.length = parent_array[parent_value].length;

	for(var i=0;i<parent_array[parent_value].length;i++){

		thechild.options[i].text = parent_array[parent_value][i];

		thechild.options[i].value = parent_array[parent_value][i];} }

</script>
<style>
.error {
  /* supply height to ensure consistent positioning for every browser */
  height:15px;
  background-color:#FFFE36;
  border:1px solid #E1E16D;
  font-size:11px;
  color:#000;
  padding:3px 10px;
  margin-left:-2px;
 

  /* CSS3 spicing for mozilla and webkit */
  -moz-border-radius:4px;
  -webkit-border-radius:4px;
  -moz-border-radius-bottomleft:0;
  -moz-border-radius-topleft:0;
  -webkit-border-bottom-left-radius:0;
  -webkit-border-top-left-radius:0;
 
  -moz-box-shadow:0 0 6px #ddd;
  -webkit-box-shadow:0 0 6px #ddd;
}
</style>

<div class="posters">
	<div class="poster double_wide no_max_height" style="width:630px; min-height:1250px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->UPLOAD." ".$lang->PROPERTY; ?></h2>
		<div class="row benefit" style="overflow: auto">
		<div class=div1></div>
		<iframe name="process" id="id1" style="width:99%;border:1px solid red;"></iframe>
<form name="myform" action="../controller/uploadproperty_action.php" method="post" target="process" enctype="multipart/form-data">

		
	<center id="tab1">
			<table style=" border: solid;" width="65%"  height="90%" cellpadding="5"  cellspacing="25">
			
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->ADDRESS; ?></b></td>
					<td><input id="ValidField" required="required" style="height:30px;font-size: 20px;" type="text" minlength="10" tabindex="5" name="address" size="30" maxlength="50"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->PROPERTY." ".$lang->SIZE; ?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_size" size="30" maxlength="10"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->FACILITY?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_facility" size="30" maxlength="100"></td>
			
					</tr>
<tr>
						<td style="text-align: center;"><b><?php echo $lang->TRASACTION?></b></td>
						<td><select  style="height:20px; font-size:13px;border: 1px solid black;width: 220px;"  name="transaction">						<option value="attorney" selected ><?php echo $lang->ATTORNEY; ?></option>
								<option value="resale"  ><?php echo $lang->RESALE;?></option>
						</select>
						</td>
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->DIRECTION?></b></td>
						<td><select  style="height:20px; font-size:13px;border: 1px solid black;width: 220px;"  name="property_direction">
								<option value="n" selected >N</option>
								<option value="e" selected >E</option>
								<option value="s" selected >S</option>
								<option value="w" selected >W</option>
								<option value="se" selected >SE</option>
								<option value="sw" selected >SW</option>
								<option value="ne" selected >NE</option>
								<option value="nw" selected >NW</option>
						</select>
						</td>
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->DEAL." ".$lang->TYPE; ?></b></td>
						<td><select  tabindex="2" style="height:20px; font-size:13px;border: 1px solid green;width: 220px;"  name="deal">
								<option value="r" selected ><?php echo $lang->RENT?></option>
								<option value="s"><?php echo $lang->SALE ?></option>
						</select>
						</td>
					</tr>
			
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->PROPERTY." ".$lang->TYPE; ?></b></td>
						<td><select  tabindex="1" style="height:20px; font-size:13px;border: 1px solid green;width: 220px;"  name="property">
								<option value="flat" selected >Flat</option>
								<option value="factory">Factory</option>
								<option value="farm">Farm House</option>
								<option value="shop">Shop</option>
								<option value="house">House</option>
						</select>
						</td>
					</tr>
			
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->PROPERTY." ".$lang->FEATURE; ?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_feature" size="30" maxlength="100"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->PRICE?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_price" size="30" maxlength="20"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->DISCRIPTION;?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_description" size="30" maxlength="150"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->BARGAIN." ".$lang->PRICE; ?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="bargain_amount" size="30" maxlength="20"></td>
			
					</tr>
	
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->UPLOAD." ".$lang->IMAGE; ?></b></td>
					<td><input name="uploaded_file" type="file" size="14" id="uploaded_file" style="height:30px;font-size: 20px;"  tabindex="5"  size="30" maxlength="20">
					

					</td>
					
					</tr>
					<tr>
<td style="text-align: center;"><b><?php echo $lang->CITY ?></b></td>
						<td>
				<select  name="city1"  id="city1" onchange="dynamic2(this,'sector1');" style="height:20px; font-size:13px;border: 1px solid green;width: 220px;">
				     <option  value="-1"><?php echo $lang->PLEASE." ".$lang->SELECT." ".$lang->A." ".$lang->CITY ;?></option>
				    <option  value="noida"><?php echo $lang->NOIDA;?></option>
				    <option  value="ghaziabad"><?php echo $lang->GHAZIABAD;?></option>
				    <option  value="vasundhara"><?php echo $lang->VASUNDHARA;?></option>
				    <option  value="vaishali"><?php echo $lang->VAISHALI;?></option>
				    <option  value="sikandrabad"><?php echo $lang->SIKANDRABAD;?></option>
				    <option  value="bulanshr"><?php echo $lang->BULANDSHAHR;?></option>
				</select>
</tr>
<tr>
<td style="text-align: center;"><b><?php echo $lang->SECTOR;?></b></td>	
<td>			
<select  name="sector1"  id="sector1" style="height:20px; font-size:13px;border: 1px solid green;width: 220px;">
				    <option  value="-1"><?php echo $lang->PLEASE." ".$lang->SELECT." ".$lang->A." ".$lang->CITY ;?></option>
				</select>
					</td>
					</tr>
	<tr>
<td style="text-align: center;"><b><?php echo $lang->BHK;?></b></td>
<td>
				<select name="bhk" style="height:20px; font-size:13px;border: 1px solid green;width: 220px;">
					<option value="-1" selected>bhk</option>
					<option value="1"><?php echo $lang->ONE."+ ".$lang->BHK;?></option>
					<option value="2"><?php echo $lang->TWO."+ ".$lang->BHK;?></option>
					<option value="3"><?php echo $lang->THREE."+ ".$lang->BHK;?></option>
					<option value="4"><?php echo $lang->FOUR."+ ".$lang->BHK;?></option>
				</select>
<td>
</tr>
					<tr>
						<td style="text-align: center;"><b><?php echo $lang->FURNISHED." ".$lang->ITEM;?></b></td>
					<td><input required="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="property_furnished_item" size="30" maxlength="100"></td>
			
					</tr>
						<tr>
				<td>&nbsp;</td>
					<td  style="text-align: left;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<b><input tabindex="7" id="FormSubmit" type="submit"
								 value="<?php echo $lang->UPLOAD;?>" >
						</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b><input tabindex="8" type="reset"
								name="rsubmit" value="<?php echo $lang->CLEAR;?>">
						</b></td>
					
				</tr>

			</table>
				

		</center>
</form>
</div>
</div>
</div>
     

 

