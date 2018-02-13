<?php
$json = '{"ApiMessageJson":"{\"Version\":1,\"LibName\":\"CSharp-PayCheckoutApi\",\"LibVersion\":\"1.2.0.8\",\"Action\":1000,\"WebshopId\":678497044,\"Notification\":{\"NotificationType\":0,\"TraceReference\":201802500020515030,\"PaymentStatusChange\":{\"PaymentReference\":201802562294006808,\"TransactionReference\":201802501286050372,\"PaymentMethod\":1,\"Status\":30,\"Currency\":0,\"MerchantOrderReference\":\"83249-48975-41219-2640\",\"PaymentAmount\":5850},\"ProcessedOffline\":false}}","SecuritySha256Hash":"9iyWw+U0jZWapzrUigB9FjSxzoG0fjmOddqw01YlxeM="}';


exit;

$array = array(
  'ApiMessageJson' => array(
    'Version' => 1,
    'LibName' => 'CSharp-PayCheckoutApi',
    'LibVersion' => '1.2.0.8',
    'Action' => 1000,
    'WebshopId' => 678497044,
    'Notification' => array(
      'NotificationType' => 0,
      'TraceReference' => '201802500020515030',
      'PaymentStatusChange' => array(
        'PaymentReference' => '201802562294006808',
        'TransactionReference' => '201802501286050372',
        'PaymentMethod' => 1,
        'Status' => 200,
        'Currency' => 0,
        //'MerchantOrderReference' => '83249-48975-41219-2640',
        'MerchantOrderReference' => '1280-3391-11277-2709',
        'PaymentAmount' => 5850,
      ),
      'ProcessedOffline' => false,
    ),
  ),
  'SecuritySha256Hash' => '9iyWw+U0jZWapzrUigB9FjSxzoG0fjmOddqw01YlxeM=',
);

foreach($array as &$item) $item = json_encode($item);
$json = json_encode($array);

$url = 'http://localhost/irosa/mc_payment_notification.php';

function fetch($url,$json=null){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: '.strlen($json),'X-Auth-Token: 12345'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
  if($json) curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

echo fetch($url,$json);
?>