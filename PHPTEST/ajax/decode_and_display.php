
<?php
error_reporting(1);

function __autoload($class_name) {
    include "../classes/".$class_name . '.php';
}


$osa="";
if(isset($_REQUEST['url']))
{
     $query=trim($_REQUEST['url']);
    $query=str_ireplace(" ","-", $query);
    $query2=str_ireplace("-","+", $query);
    $nquery="http://www.aliexpress.com/af/".$query.".html?SearchText=".$query2;
    $html = ConScrap::Connection($nquery);
    $name=ConScrap::Parsing($html);
    //header('Content-Type: application/json');
    $osa=json_encode($name);
    
}


if(isset($osa))
{
    $res_arr=json_decode($osa, true);
    $data="<table class='table table-striped'><tr><th>Product Pic</th><th>Product Name</th><th>Product Price</th></tr>";
   
    foreach($res_arr as $json){
     $data.="<tr><td>".$json['product_name']."</td><td>".$json['product_price']."</td><td><img src='".$json['product_img']."'></td></tr>"; 
    }
    $data.="</table>";
    echo $data;
}
header('Content-Type: application/json');
echo json_encode($$osa);
?>
