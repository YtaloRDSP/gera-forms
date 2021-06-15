<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_1d16e51af604e58';
    // $database = 'heroku_8c940033eab5791';//(teste)

//     $servername = 'localhost';
//     $username = 'root';
//     $password = '';
//     $database = 'sixsigma';
?>
