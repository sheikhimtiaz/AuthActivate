<?php

$id=$argv[1];
$url = "http://51.255.85.70/cancel-delivery-request?id=".$id;
//$url = "http://188.165.247.23/cancel-delivery-request?id=".$id;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response_a = json_decode($response, true);
if($response)
{
    $txt=$id . "/newfile2.txt".$response;
}
else
{
    $txt="failed";
}

$path ="bash_files/newfile.txt";
$myfile = fopen($path, "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>