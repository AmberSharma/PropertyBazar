<?PHP
include "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
require SITEPATH."model/history_class.php";
echo "<pre>";
print_r($_REQUEST);
$val=$_REQUEST['property_id'];

$obj= new History();
$obj->deleteProperty($val);
echo "deleted";
?>
