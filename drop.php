<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_4888ce2e195390f';

    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $database;";
    $conn->exec($sql);
    $conn = null;

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP TABLE Atividades";
    $conn->exec($sql);

    echo "  <table class='table table-sm table-striped table-hover text-light col-4 m-auto'>
            <thead class='thead-dark text-uppercase'>
                <tr>
                    <th scope='col'>Data</th>
                    <th scope='col'>Codigo</th>
                    <th scope='col'>Atividade</th>
                    <th scope='col'>CH</th>
                </tr>
            </thead>
        </table>";
?>