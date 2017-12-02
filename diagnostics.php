<?php
session_start();
$extentions = get_loaded_extensions();
sort($extentions,SORT_NATURAL | SORT_FLAG_CASE);
$vars = array();
foreach($_POST as $key => $value) $vars[] = array('POST',$key,$value);
foreach($_GET as $key => $value) $vars[] = array('GET',$key,$value);
foreach($_COOKIE as $key => $value) $vars[] = array('COOKIE',$key,$value);
foreach($_SESSION as $key => $value) $vars[] = array('SESSION',$key,$value);
foreach($_ENV as $key => $value) $vars[] = array('ENV',$key,$value);
?>
<!DOCTYPE html>
<html lang="NL">
<head>
	<title>Diagnostics</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .extention,footer{text-align:center}*{margin:0;padding:0;border:0;box-sizing:border-box}html{font-family:Arial,sans-serif;font-size:.8em;background:#efefef}.contentblock{width:100%;max-width:1200px;margin:10px auto;background:#fff;padding:10px}.extention,tr:nth-child(odd){background:#eee}table{width:100%}tr{text-align:left}caption,td,th{padding:5px}.extention{display:inline-block;width:116px;padding:4px;margin:4px}footer{background:#aaa;font-size:10px;line-height:50px}
  </style>
</head>
<body>

<div class="contentblock">
	<table>
    <caption><h2>PHP $_SERVER</h2></caption>
    <tr>
      <th>Key</th>
      <th>Value</th>
    </tr>
<?php foreach($_SERVER as $key => $value) : ?>
<?php if($key === 'PATH') $value = str_replace('<br><br>','',str_replace(';','<br>',$value));?>
    <tr>
      <td><?=$key?></td>
      <td><?=$value?></td>
    </tr>
<? endforeach;?>
  </table>
</div>

<div class="contentblock">
  <h2>PHP Loaded Extentions</h2>
<?php foreach($extentions as $ext) : ?>
  <span class="extention"><?=$ext?></span>
<? endforeach;?>
</div>

<div class="contentblock">
	<table>
    <caption><h2>PHP VARS</h2></caption>
    <tr>
      <th>Type</th>
      <th>Key</th>
      <th>Value</th>
    </tr>
<?php foreach($vars as $var) : ?>
    <tr>
<?php foreach($var as $cell) : ?>
      <td><?=$cell?></td>
<? endforeach;?>
    </tr>
<? endforeach;?>
  </table>
</div>

<div class="contentblock">
	<table>
    <caption><h2>JS</h2></caption>
    <tr>
      <th>Key</th>
      <th>Value</th>
    </tr>
    <tr>
      <td>navigator.oscpu</td>
      <td><script>document.write(navigator.oscpu)</script></td>
    </tr>
    <tr>
      <td>navigator.hardwareConcurrency</td>
      <td><script>document.write(navigator.hardwareConcurrency)</script></td>
    </tr>
    <tr>
      <td>navigator.doNotTrack</td>
      <td><script>document.write(navigator.doNotTrack)</script></td>
    </tr>
    <tr>
      <td>navigator.permissions</td>
      <td><script>document.write(navigator.permissions)</script></td>
    </tr>
    <tr>
      <td>navigator.maxTouchPoints</td>
      <td><script>document.write(navigator.maxTouchPoints)</script></td>
    </tr>
    <tr>
      <td>navigator.platform</td>
      <td><script>document.write(navigator.platform)</script></td>
    </tr>
  </table>
</div>

<div class="contentblock">
  <h2>Javascript Navigator Object</h2>
  <p id="navigator"></p>
</div>

<div class="contentblock">
  <h2>Javascript Window Object</h2>
  <p id="window"></p>
</div>

<div class="contentblock">
  <h2>Javascript Postion Object</h2>
  <p id="position"></p>
</div>

<div class="contentblock" id="test">
  <h2>Javascript Test Object</h2>
</div>

<footer>Environment Diagnostics - Huig - 2017</footer>

<script>
function objToJson(myObj){
  var output = {};
  for (var i in myObj) output[i] = myObj[i];
  return JSON.stringify(output);
}
var jsonnav = objToJson(navigator);
document.getElementById("navigator").innerHTML = jsonnav;
document.getElementById("window").innerHTML = objToJson(window.screen);
document.getElementById("position").innerHTML = position.toSource();
</script>
<script>
function objToString (obj) {
    var str = '';
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            str += p + '::' + obj[p] + '\n';
        }
    }
    return str;
}
</script>
</body>
</html>