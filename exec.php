<?php

// Creates an image on www.websequencediagrams.com and returns the url of the image.
// This image must be retrieved within 2 minutes.
function get_sequence_diagram($args) {
    $params = array();
    foreach ($args as $key => $value ) {
        $params[] = urlencode($key) . "=" . urlencode($value);
    }

    $ch = curl_init("http://www.websequencediagrams.com/index.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, implode("&", $params));
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Expect:') );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($response);
    if(isset($json->img)){
        $json->img = "http://www.websequencediagrams.com/".$json->img;
        return json_encode($json);
    }else{
        return $response ;
    }

}

// If you have an API key, you may also include it as a parameter.
// This will allow you to create diagrams with premium features.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$message = trim($_POST['message']) ;
$messageLines = explode("\n",$message);
$message = array();
foreach($messageLines as $line){
    $message[] = trim($line);
}

$message = implode("\n",$message);
echo get_sequence_diagram(array(
                                      "apiVersion" => "1",
                                      "message" => $message,
                                      "style" => "rose",
                                      "format" => "png",
                                      // "apikey" => "OPTIONAL API KEY HERE"
                                 ));

