<?php
    $_REQUEST["no_headers"] = 1;
    include "header.php";

    $apikey = escapeshellarg($_POST["apikey"]);

    if ($apikey)
        $result = run("test_ivli_connection $apikey");
    else
        $result = run("test_ivli_connection");

    echo $result;
