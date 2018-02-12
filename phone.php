<?php

$token = '394ba8fb8bc9fee49da9e6aabc741fe5d6029517439871e5';

$url = "https://fonoapi.freshpixl.com/v1/getdevice?token=394ba8fb8bc9fee49da9e6aabc741fe5d6029517439871e5&brand=htc&device=one";

$json = file_get_contents($url);
$array = json_decode($json,true);

foreach($array as $item){
  foreach($item as $key => $value){
    $output[] = strtolower(str_replace('_','',$key));
  }
}
sort($output);
$result = array_unique($output);
$result = array_values($result);

foreach($result as $item){
  echo $item.'<br>';
}
//var_dump($result);

echo 'ok';
?>