<script type="text/javascript">
	function action1(str)
{	
	
		$('#advertisement').load("view/"+str, function() {
	             });
        
}
	 function subDisableButton(buttonId) 
	 {
		
		 var obj = document.getElementById(buttonId); 
		 if (obj) 
			 { 
			 obj.disabled = false; 
			 } 
		 } 


function dynamic1(parent,child){

	var parent_array = new Array();

	parent_array['noida'] = ['Please select a sector','5','6','7','8','9','10','11','12','14','57','62','63','71'];

	parent_array['ghaziabad'] = ['Please select a sector','12','13'];

	parent_array['vaishali'] = ['Please select a sector','1','2','3'];

	parent_array['vasundhara'] = ['Please select a sector','1','2','3','4','9','10','13','15'];

	parent_array['sikandrabad'] = ['Please select a sector','10','11','12'];

	
	var thechild = document.getElementById(child);

	thechild.options.length = 0;

	var parent_value = parent.options[parent.selectedIndex].value;

	if (!parent_array[parent_value]) parent_value = '';

	thechild.options.length = parent_array[parent_value].length;

	for(var i=0;i<parent_array[parent_value].length;i++){

		thechild.options[i].text = parent_array[parent_value][i];

		thechild.options[i].value = parent_array[parent_value][i];} }

	
</script>




<style type="text/css">
.css3-shadow,.css3-gradient1,.css3-gradient2 {
	position: relative;
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
}

.css3-shadow:after {
	content: "";
	position: absolute;
	z-index: -1;
	-webkit-box-shadow: 0 0 40px rgba(0, 0, 0, 0.8);
	box-shadow: 0 0 40px rgba(0, 0, 0, 0.8);
	bottom: 0px;
	width: 60%;
	height: 50%;
	-moz-border-radius: 100%;
	border-radius: 100%;
	left: 10%;
	right: 10%;
}

.wrap1 {
	padding: 10px 0 30px;
	background: url(22.jpg) center top;
	position: relative;
	z-index: -10;
}

.box h4 {
	background: #eee;
	margin: 0;
	padding: 60px 20px;
	text-align: center;
	-webkit-box-shadow: 0 0px 4px rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 4px rgba(0, 0, 0, 0.2);
}

.box {
	width: 70%;
	min-height: 10%;
	padding: 20px;
	background: #5EAB1F;
	margin: 20px auto 60px;
	border-radius: 10px;
}

select {
	font-family: cursive;
}


</style>
<div  class="box css3-shadow">
	<div style="font-size: 20px; font-family: serif; text-align: justify;">
	<a href="#" onclick="action1('sale.php')">	<span style="color: #FFFFFF; font-family: sans-serif;"><?php echo $lang->FORSALE ;?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="#" onclick="action1('rent.php')">	<span style="color: #FFFFFF; font-family: sans-serif;"><?php echo $lang->FORRENT ;?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
		


		<form id="frmVote" action="#" method="post">
			<center>
			<div  id="tab">

				<select  name="city"  id="city" onchange="dynamic1(this,'sector');subDisableButton('b1'); ">
				    <option  value="-1" selected=selected><?php echo $lang->SELECT." ".$lang->A." ".$lang->CITY ;?></option>
				    <option  value="noida"><?php echo $lang->NOIDA;?></option>
				    <option  value="ghaziabad"><?php echo $lang->GHAZIABAD;?></option>
				    <option  value="vasundhara"><?php echo $lang->VASUNDHARA;?></option>
				    <option  value="vaishali"><?php echo $lang->VAISHALI;?></option>
				    <option  value="sikandrabad"><?php echo $lang->SIKANDRABAD;?></option>
				    <option  value="bulanshr"><?php echo $lang->BULANDSHAHR;?></option>
				</select>
				&nbsp;&nbsp;&nbsp;
				<select  name="sector"  id="sector" onchange="subDisableButton('b1'); ">
				    <option  value="-1"><?php echo $lang->PLEASE." ".$lang->SELECT." ".$lang->A." ".$lang->CITY ;?></option>
				</select>
	
				&nbsp;&nbsp;&nbsp;
				<select name="bhk" onchange="subDisableButton('b1'); ">
					<option value="-1" selected><?php echo $lang->BHK?></option>
					<option value="1"><?php echo $lang->ONE."+ ".$lang->BHK;?></option>
					<option value="2"><?php echo $lang->TWO."+ ".$lang->BHK;?></option>
					<option value="3"><?php echo $lang->THREE."+ ".$lang->BHK;?></option>
					<option value="4"><?php echo $lang->FOUR."+ ".$lang->BHK;?></option>
				</select>
				 &nbsp;&nbsp;
			
				
			
				<input type="text" size=5 value="0" name="min"  onfocus="subDisableButton('b1');"  /> <span><?php echo $lang->TO;?></span> <input
					type="text" size=5  value="0" name="max"   onfocus="subDisableButton('b1');" /> 
					&nbsp;&nbsp;&nbsp;
					<select name="area" onchange="subDisableButton('b1'); ">
					<option value="-1"><?php echo $lang->AREA;?></option>
					<option value="50"><?php echo $lang->FIFTY;?></option>
					<option value="100"><?php echo $lang->HUNDRED;?></option>
					<option value="150"><?php echo $lang->ONEFIFTY;?></option>
					<option value="200"><?php echo $lang->TWOHUNDRED;?></option>
				</select> 


			</div>
			<br/>
			<input type="hidden" name="page" value="1"/>
			<input type="hidden" name="r" value="1"/>
			<input type="button"  id="b1" value="<?php echo $lang->SUBMIT;?>" onclick="this.disabled=true;callme();" />
			</center>
		</form>
	</div>
<div id="tab">


</div>

	<script>
			
			function callme()
			  {
			   
			 $.ajax({ 
			      type: "POST",
			      url: 'http://localhost/PropertyBazar/trunk/development/view/searchresult.php',                                    
			      data: $('#frmVote').serialize(),
				beforeSend: function () {
    					$('#searchresult').html('<img src="<?php echo IMAGEPATH . "b.gif"; ?>" >');
					},
			       success: function(data){
			    	  
			    		   $('#searchresult').html(data);
						
			              
			        },
				
			    });
			  }
		
		</script>
