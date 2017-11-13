<?php
namespace adrian\plf1;

require_once 'vendor/autoload.php';
require 'Film.php';

/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 13.11.2017
 * Time: 11:13
 */

$film = new Film("Bruce Lee - Der Mann mit der Todeskralle", 5, "https://www.youtube.com/watch?v=80wXmIcyZwk");

if (isset($_GET['format'])) {

    if ($_GET['format'] === 'qr') {
        echo $film->getMovieQRCodeForBrowser();
        die();
    } else if ($_GET['format'] === 'json') {
        echo $film->getMovieInfoAsJSON();
        die();
    }

}
?>
<html>
<head>
    <title>Film</title>
</head>
<body>
<h1><?php echo $film->getName()?></h1>
<a href="index.php?format=json">Filminfo als JSON</a><br>
<a href="index.php?format=qr">Filminfo als QR-Code</a>
</body>
</html>
