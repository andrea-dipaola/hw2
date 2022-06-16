<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    public function searchContentPodcast($podcastValue){
        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);

        $token = json_decode($res) -> access_token; 
        $podcastValue = urlencode($podcastValue);
        $url = "https://api.spotify.com/v1/search?q=".$podcastValue."&type=episode&limit=30&offset=0&market=IT";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $headers = array('Authorization: Bearer '.$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
        
    }

    public function searchContentRicetta($ricettaValue){
        $api_key = env('API_KEY');
        $api_id = env('API_ID');

        $ricettaValue = urlencode($ricettaValue);
        $url = "https://api.edamam.com/search?q=".$ricettaValue."&app_id=".$api_id."&app_key=".$api_key;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;

    }
}

?>