<?PHP
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
$obj1 = new MyModel();
if($_REQUEST['val']!=NULL)
$name = $obj1->FetchBuyerList($_REQUEST['val']);
echo '<td style="text-align: center;"><b>Select Buyer</b></td><td>';
echo '<select tabindex="1" style="height:30px; font-size:20px;border: 1px solid black;width: 350px;"  name="user_id">';
for($i =0 ; $i < count($name) ; $i++)
{
	echo "<option value='" . $name[$i]['user_id'] ."'>" . $name[$i]['user_name'] ."</option>";
}
echo "</select></td>";
?>
