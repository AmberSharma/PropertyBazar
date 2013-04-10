<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php"; 
require_once SITEPATH."model/Search_class.php";

?> 

<style>
    table td{
        border: 2px solid red;
    }
    #container
    {
        
        
        
    }
    #image
    {
        
        width: 216px;
        float: left;
        padding: 10px;
        
        
    }
    #data
    {
        
        float: left;
        
        width: 230px;
       
    }
    #status
    {
        background-image: url('<?php echo IMAGEPATH; ?>message.png');
    
        float: left;
        
        width: 120px;
        height: 100px;
    }
.selecter {
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    border: 1px solid brown;
	height: 30px;
}
</style>

<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height: 600px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->DETAIL." ".$lang->SEARCH; ?></h2>
		<div class="row benefit" style="overflow: auto;">

<?php
 $matchfield=array();
         
            
            $obj = new SearchProperty();
            $obj->setPropertyid($_REQUEST['property_id']);
            $matchfield['property_id'] = $obj->getPropertyid();
            ?>
            <div id="container">
                <div id="image">
                    <?php
                        $result = $obj->Propertyimage($matchfield);
                        $count=count($result);
                       
                        
                    ?>
                        <table>
                            <tr>
                                <td colspan="2">
                                    <img src="<?php echo IMAGEPATH . $result[0]['image'] ;?>" rel="#mies2" height=206px; width="206px; style="border:1px solid red;"/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                    for($i=1;$i<$count;$i++)
                                    {
                                                
                                
                                ?>
                                <td >
                                        <img src="<?php echo IMAGEPATH . $result[$i]['image'] ;?>" height=100px; width="100px; style="border:1px solid red;"/>
                                </td>
                            
                                <?php
                                    }
                                ?>
                            </tr>

					
                        </table>
                        </div>
                        <div id="data">
                            <?php
                                
                                $result = $obj->Propertydetailed($matchfield);
                            ?>
                            <b><?php echo $result[0]['property_feature'] ?></b>
                            <br />
                            <br />
                            <b>$ <?php echo $result[0]['price'] ?></b>
                            <br />
                            <span>REFERENCE ID:&nbsp;&nbsp;<?php printf('%04d', $result[0]['property_id']) ?></span>
                            
                            
                            <hr width="50" color="red">
                            <span>TITLE:&nbsp;&nbsp;<?php echo $result[0]['property_type'] ?></span>
                            
                            <br />
                            <span>BHK:&nbsp;&nbsp;<?php echo $result[0]['bhk'] ?></span>
                            <br />
                            <span>AREA:&nbsp;&nbsp;<?php echo $result[0]['property_area'] ?>&nbsp;Sq. m </span>
                            <br />
                            <span>Direction:&nbsp;&nbsp;<?php if($result[0]['direction']=='N') echo "North"; 
                            elseif ($result[0]['direction']=='NE') echo "North East";?> </span>
                            <br />
                            <div class="selecter">
                            	<span >&nbsp;<?php echo $lang->DESCRIPTION;?>:</span>
                            	
                            </div>
                            <span >&nbsp;<?php echo $result[0]['description'] ?></span>
                            <div class="selecter">
                            	<span >&nbsp;<?php echo $lang->CONTACT." ".$lang->DETAIL;?>:</span>
                            	<br />
                            	<br />
                            	
                            </div>
                           	
                                    <?php
                                    $obj1=new SearchProperty();
                                    $matchfield1['user_type']="a";
                                    $adminresult=$obj1-> AdminDetails($matchfield1);
                                   
                            ?>
                        
                            <span >Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['name'] ?></span>
                            <span >Phone:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['contact_no'] ?></span>
                            <span >Email:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['email'] ?></span>
                            <span >Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['name'] ?></span>
                        </div>
                        <div id="status">
                            <br />
                            <br />

                         <span style="margin-top: 200px;margin-left: 30px;"><?php if($result[0]['property_status']=="active" || $result[0]['property_status']=="inactive") echo "Available" ?></span>
                            <br />
                            <br />
<br />
                            <br />
<br />
                            <br />
<br />
                            <br />
<input type="button" class="open" value="Buy" onclick="action_open('propertybuy.php?property_id=<?php echo $result[0]['property_id']?>&price=<?php echo $result[0]['price']?>')"/>
                        </div>
                    </div>
                     
                </div></div></div>
