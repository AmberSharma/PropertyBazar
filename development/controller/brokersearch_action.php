<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
 require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php"; 
?>
<script type="text/javascript">

function assign() {
	
var strUser = $("#brokername1 option:selected").val();

$.ajax({
type: "POST", // Post / Get method
url: "../controller/assigninsert_action.php", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.

data:"b_id=" + strUser+"&p_id="+<?php echo "'".$_REQUEST['checked']."'";?>,
//data:$('#frm').serialize(),

beforeSend: function() {
	
        },
	        success: function(data){
	        	$("#output3").html(data);
	                
        }
});
}
</script>
<?php 
require_once "../model/constant.php"; 
require SITEPATH.'model/model.php';
//require SITEPATH.'model/Paging_class.php';
require_once SITEPATH.'model/assignproperty_class.php';
$value=$_REQUEST['b_area'];
$obj =new AssignProperty();
$name=$obj->Findareabroker($value);
echo "<select name='brokername' id='brokername1'>";
for($i =0 ; $i < count($name) ; $i++)
{
    echo "<option value='" . $name[$i]['b_id'] ."'>" . $name[$i]['b_name'] ."</option>";
}
echo "</select>";
echo "<br />";
echo "<br />";
echo "<input type='button' value='".$lang->ASSIGN."' onclick='assign()'/>";

?>
<div id="output3">

</div>
