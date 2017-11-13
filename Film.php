<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 13.11.2017
 * Time: 11:14
 */
namespace adrian\plf1;
require_once 'vendor/autoload.php';

use HTL3R\KungFuMovies\AbstractKungFuMovie;
use HTL3R\KungFuMovies\IKungFuMovie;
use Endroid\QrCode\QrCode;

class Film extends AbstractKungFuMovie implements IKungFuMovie
{

    public function __construct($name, $rating, $movieURI)
    {
        parent::__construct($name, $rating, $movieURI);
    }

    /***
     * Returns a JSON encoded String for this Film-Object. This Method sets the Content-Type automatically.
     * @return string
     */
    public function getMovieInfoAsJSON(): string
    {
        $output['name'] = $this->getName();
        $output['rating'] = $this->getRating();
        $output['uri'] = $this->getMovieURI();

        header('Content-Type: application/json');

        return json_encode($output);
    }

    /***
     * Returns a QR encoded String for this Film-Object. This Method sets the Content-Type automatically.
     * @return string
     */
    public function getMovieQRCodeForBrowser(): string
    {
        $qrCode = new QrCode($this->getMovieURI());
        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeString();
    }
}