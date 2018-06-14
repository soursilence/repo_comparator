<?php


namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comparison Entity
 *
 * @author tkaniowski
 */
class Comparison {
    
    /**
     * @Assert\Url(
     *    message = "The url '{{ value }}' is not a valid url",
     * )
     */
    private $url1;
    
    /**
     * @Assert\Url(
     *    message = "The url '{{ value }}' is not a valid url",
     * )
     */
    private $url2;

    function getUrl1() {
        return $this->url1;
    }

    function getUrl2() {
        return $this->url2;
    }

    function setUrl1($url1) {
        $this->url1 = $url1;
    }

    function setUrl2($url2) {
        $this->url2 = $url2;
    }





}
