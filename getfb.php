<?php
/*
* Jobstreet Job List Crawler
* Scrap data from jobstreet and save it as csv , just enter the jobstreet URL and you're good to go
* By: KelNovi123
*/


$method = $_POST['crawl_method'];


     if($method === 1){
    // create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $_POST["job_url"]);

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) CriOS/56.0.2924.75 Mobile/14E5239e Safari/602.1');

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch); 

    // output the result as json
    echo json_encode(array('fb'=>$output));

 }else{
    $datastring = file_get_contents($_POST['job_url']);
    echo json_encode(array('fb'=>$datastring));
 }