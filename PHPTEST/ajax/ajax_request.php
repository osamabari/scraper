<?php
error_reporting(1);

function __autoload($class_name) {
    include "../classes/".$class_name . '.php';
}


if(isset($_REQUEST['url']))
{
     $query=trim($_REQUEST['url']);
    $query=str_ireplace(" ","-", $query);
    $query2=str_ireplace("-","+", $query);
    $nquery="http://www.aliexpress.com/af/".$query.".html?SearchText=".$query2;
    $html = ConScrap::Connection($nquery);
    $name=ConScrap::Parsing($html);
    //header('Content-Type: application/json');
    echo json_encode($name);
}
else
{
    echo "error";
}


?>

