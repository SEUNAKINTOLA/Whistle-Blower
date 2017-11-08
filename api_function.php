<?php
function fetch_response($query,$url){
$curl_connection = curl_init($url);
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 40);
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYHOST, 2);
//curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $query);
$response = curl_exec($curl_connection);
curl_close($curl_connection);
return $response;

}
function buildQuery($post_data){
          
        foreach($post_data as $key => $value){
                $post_item[] = $key. '=' .$value;
        }
        $post_string = implode("&",$post_item);
        return $post_string;
}







?>