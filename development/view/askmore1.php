<script src='http://localhost/PropertyBazar/trunk/development/javascript/jquery.tools.min.js'>
</script>
<script type="text/javascript">
function sendQuestion()
{	 
      $.ajax({ 
      type: "POST",
      url:'http://localhost/PropertyBazar/trunk/development/controller/questionaction.php',
      data: $('#frmid1').serialize(),
      
       success: function(data){
    	
    	$("#tab3").html(data);
       }
   });
  }
</script>
<style>
.commentBox {
     display: block;
     width: 400px;
     height: 120px;
     padding: 8px;
     border: 1px solid #cccccc;
     line-height: 130%;
     font-size: 13px;
border-radius:10px;
}
</style>

<?php
session_start();
require_once "../model/constant.php";
//echo URLPATH;die;
//print_r ($_SESSION);
?>
</head>
 <body>
 
 <div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten">Your Question Goes Here</h2>
		<div class="row benefit" style="overflow: auto">
<div id="image_upload" style="min-width: 500px;">
  
  <?php if($_SESSION)
 {?>
 <div id="tab3">
 <form id="frmid1" >
   <textarea class="commentBox" name="ques"> Ask your Question</textarea>  <br/>
 <!--  <input type="text" name="ques">-->
 <input type="button" value="Ask" onclick ="sendQuestion()">
 </form>
 </div>
 </div>

 
 
 </div>
 </div>
  </div>
 
 
 </body>
 <?php }?>
