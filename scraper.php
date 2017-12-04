<?php
$url = "https://coinmarketcap.com/all/views/all/";

$ch = curl_init();

$header=array(
  'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
  'Accept-Language: en-us,en;q=0.5',
  'Accept-Encoding: gzip,deflate',
  'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
  'Keep-Alive: 115',
  'Connection: keep-alive',
);

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_COOKIEFILE,'cookies.txt');
curl_setopt($ch,CURLOPT_COOKIEJAR,'cookies.txt');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
$result = curl_exec($ch);

curl_close($ch);

$data = gzdecode($result);

function get_string_between($string, $start, $end){
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}

$table = get_string_between($data,'<tbody>','</tbody>');

$rows = explode('<tr',$table);
$counter = 0;
foreach($rows as $row){
  $cells = explode('<td',$row);
  foreach($cells as $cell){
    $output[$counter][] = $cell;
  }
  $counter++;
}
foreach($output as &$item) $item[2] = strip_tags('<div '.$item[2]);
var_dump($output);
?>