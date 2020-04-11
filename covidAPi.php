
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://spreadsheets.google.com/feeds/list/1lwnfa-GlNRykWBL5y7tWpLxDoCfs8BvzWxFjeOZ1YJk/1/public/values?alt=json');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_ENCODING, '');
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36');
    $curlData = curl_exec($curl);

    if(curl_errno($curl) == 28) {
        $isTimeout = true;
    } else {
        $isTimeout = false;
    }

    curl_close($curl);

    if($isTimeout) {
        echo 'Timeout!' . "\n";
        exit;
    }

    if(trim($curlData) == '') {
        echo 'Curl data empty!' . "\n";
        exit;
    }

    $jsonData = json_decode(mb_convert_encoding($curlData, 'HTML-ENTITIES', 'UTF-8'));

    if(!isset($jsonData->{'feed'}->{'entry'})) {
        $isEntryFound = false;
        echo 'No data!' . "\n";
        exit;
    } else {
        $isEntryFound = true;
    }
