<?php


class ConScrap{

    
    //connection class
    static function Connection($url){
       // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);      
        
        return $output;
        
    }

    //scrapping class
     static function Scrapping($html,$class_name,$div,$cls,$img){
         
      $pokemon_doc = new DOMDocument();
        libxml_use_internal_errors(TRUE); //disable libxml errors
    if(!empty($html)){ //if any html is actually returned

    $pokemon_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html

    $pokemon_xpath = new DOMXPath($pokemon_doc);


   $data= $pokemon_xpath->query('//'.$div.'[@'.$cls.'="'.$class_name.'"]');
   // $data= $pokemon_xpath->evaluate("string(//img/@src)");
    //echo "<pre>";
   //var_dump($as);
    $arr=array();
    if($img=="1")
    {
    $images = $pokemon_doc->getElementsByTagName('img');
    foreach ($images as $image) {
    $timg=$image->getAttribute('class');
    if($timg=="picCore pic-Core-v" || $timg=="picCore")
    {
        if($image->getAttribute('src')=="")
        {
           array_push($arr,$image->getAttribute('image-src'));
        }
     else {
            array_push($arr,$image->getAttribute('src'));
        }
    }
    
  }
}
  
 else
    {
   if($data->length > 0){
        foreach($data as $rows){
           array_push($arr,$rows->nodeValue);
        }
    }
    }
   //header('Content-type: application/json');
   return $arr;
    
}
     }
        
    
    
    //pharshing Class
     public function Parsing($html){
         
         $narr=array();
         $my_arr=array();
         $name=ConScrap::Scrapping($html,"history-item product ","a","class","0");
         $price=ConScrap::Scrapping($html,"price","span","itemprop");
         $img=ConScrap::Scrapping($html,"picRind history-item ","div","class","1");
         
         for($i=0;$i<=count($name);$i++)
         {
         $narr=array('product_name' => ''.$name[$i].'', 'product_price' => ''.$price[$i].'','product_img' => ''.$img[$i].'');
         array_push($my_arr,$narr);
         
         //return $narr;
         
         }
         return $my_arr;
        
         
    }
    
    //Shoring class
     public function Sorting($data){
        
    
}

}
