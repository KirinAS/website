<?php
$ip = ip2long($_SERVER[$proxy]);

$db_host = $_ENV["DB_HOST"];
$db_username = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASSWORD"];
$db_name = $_ENV["DB_NAME"];

/*
$dbconn = pg_connect("host=localhost dbname=publishing user=www password=foo")
    or die('Could not connect: ' . pg_last_error());

$query = 'SELECT * FROM authors';
$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

pg_free_result($result);

pg_close($dbconn);
*/

$footers = [
    "Respective trademarks/copyright belong to KBS, KBS America, KeyEast Entertainment, JYP Entertainment, and CJ Media. This is a fan made site.",
    "Source code located at <a href=\"https://github.com/KirinAS/kirinas.com\" target=\"_blank\">GitHub</a>",
];

include_once("common/footer.php");
?>
