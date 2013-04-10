<script>

function perform(str ,url)
{  
		$('#searchresult').load(url +"?page="+str, function() {
		});
} 



</script>
<?php
define("PAGINATIONPAGES","pages");
define("PAGINATIONPAGE","page");
  //rks
  // it is for providing paging limits
  class paging{
    function paging(){ // constructor
      $this -> page_length = 1;  // general page length
      $this -> current_page = 1;  // current active page
      $this -> records = 0;       // total no. of records to show
      $this -> page_var = 'page'; // it is the page no. variable
      $this -> page_set_var = 'pset'; // it is page set variable
      $this -> page_separator = '|'; // it is page no. separator displayed on front
      $this -> url="";
    }

    function set_page($page_no = 1){  // set current page
      if(empty($page_no))
        return;
      else
        $this -> current_page = $page_no;
      return;
    }

    function set_url($url){  // set current page
      
        $this -> url = '"'.$url.'"';
      
    }

    function set_page_length($page_length = 1){
      if(!empty($page_length))
        $this -> page_length = $page_length;
      return;
    }

    function set_page_var($var = 'page'){
      $this -> page_var = $var;
      return;
    }

    function set_records($records = 0){
      $this -> records = $records;
      return;
    }

    function get_limit(){     // getting limit to write in query
      $limit_from = $this -> page_length * ($this -> current_page-1);
      $limit = $limit_from . ", ".$this -> page_length;
      //echo $limit;
      return $limit;
    }
	function get_url(){     // getting limit to write in query
      
      return $this->url;
    }
    
    
    function get_limit_start(){     // getting page starting record
      $limit_from = $this -> page_length * ($this -> current_page-1);
      return $limit_from;
    }

    function get_pages(){   // getting no. of pages formed
      $pages = ceil($this -> records / $this -> page_length);
      //echo $pages;
      return $pages;
    }

    function get_link_1(){
      parse_str($_SERVER['QUERY_STRING'],$get_vars);
      if($this -> get_pages()>1){
          $link = "<span style='font-weight:bold;'> ".PAGINATIONPAGES."</span>";
      }else{
          $link = "<span style='font-weight:bold;'> ".PAGINATIONPAGE."</span>";
      }
      
      for($i=1;$i<=$this -> get_pages();$i++){
        $get_vars[$this -> page_var] = $i;
        //echo $get_vars[$this -> page_var];
        $url = http_build_query($get_vars);
        //echo "url". $url;
        /* if($i == $this -> current_page)
          $link .= ($i > 1)? $this -> page_separator ." <span style='color:#cc0000;font-weight:bold;font-size:13px;float:none!important;padding-right:0px!important'> <u>$i</u> </span> ":" <span style='color:#cc0000;font-weight:bold;'> <u>$i</u> </span> ";
        else
         $link .= ($i > 1)? $this -> page_separator ."<a href='?$url'> <u>$i</u> </a>":"<a href='?$url'> <u>$i</u> </a>";  */
        if($i == $this -> current_page)
        	$link .= ($i > 1)? $this -> page_separator ." <span style='color:#cc0000;font-weight:bold;font-size:13px;float:none!important;padding-right:0px!important'> <u>$i</u> </span> ":" <span style='color:#cc0000;font-weight:bold;'> <u>$i</u> </span> ";
        else
        	$link .= ($i > 1)? $this -> page_separator ."<a href='javascript:void(0)' onclick='perform(".$i.",".$this -> get_url().")'> <u>$i</u> </a>":
        	"<a href='javascript:void(0)' onclick='perform(".$i.",".$this -> get_url().")'> <u>$i</u> </a>";}
//echo $link;
//echo "<br />";
//$link .= $i;
      return $link;
    }

    
   

    function get_link($no = 1){
      $no = intval($no);
      switch($no){
        default:
        case 1:
          $link = $this -> get_link_1();
          break;
       
      }
      return $link;
    }
    
  }
?>

