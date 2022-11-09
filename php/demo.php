
<?php
$apiKey = 'your Api key';
$securitykey = 'your security key';
$serverHost = 'https://api-developer.tradplusad.com';

//签名字段生成
$timestamp = time(); // 时间戳
$nonce = '5c672d4e9628d0a7';  //16位长度随机字符，数字与字母组合
$path = '/api/app/allcategory'; //接口请求路径

$keys = md5($securitykey.$timestamp.$nonce.$path);
$signature = strtoupper($keys);

$requestUrl = $serverHost.$path.'?sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;
$headerArr[] = 'bear: '.$apiKey;
$postData = [];

/**
 * @param $requestUrl
 * @param array $postData
 * @param array $headerArr
 * @return array
 */
public function httpPost($requestUrl, array $postData, array $headerArr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $requestUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 500);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
  	if ($headerArr) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArr);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return array($httpCode, $response);
}




?>