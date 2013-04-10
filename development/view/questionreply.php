<script type="text/javascript">
function fun(id)

{	
      $.ajax({ 
      type: "POST",
      url: '../controller/questionreply_action.php?val='+id,
      data: $('#frmid').serialize(),
      
       
       success: function(data){
    	
    	$("#out").html(data);
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
require_once "../model/constant.php";
//require_once SITEPATH.'includefile.php';
require_once  SITEPATH.'model/model.php';
//$obj1 = new MyModel();
//$result = $obj1->FetchFeedbackuser($_REQUEST['user_id']);

//print_r($_REQUEST);die;
?>
<div class="poster double_wide no_max_height" style="width: 620px; min-height:720px;">
		<h2 style="width: 620px" class="do_not_shorten">REPLY</h2>
		<div class="row benefit" style="overflow: auto">
<form id="frmid">
<textarea name="txt1" class="commentbox"> reply</textarea>
<input type="button" onclick="fun(<?php echo $_REQUEST['id']?>)" value ="reply">
</form>
<div id="out"></div>

</div>
</div>
