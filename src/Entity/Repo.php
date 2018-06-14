<?php

namespace App\Entity;

/**
 * Repo Entity
 *
 * @author tkaniowski
 */
class Repo {

    /**
     *
     * @var string $name
     */
    private $name;
    
    /**
     *
     * @var int $forks
     */
    private $forks;
    
    /**
     *
     * @var int $stars
     */
    private $stars;
    
    /**
     *
     * @var int $watchers
     */
    private $watchers;
    
    /**
     *
     * @var string $lastRelease
     */
    private $lastRelease;
    
    /**
     *
     * @var int $pullsOpen
     */
    private $pullsOpen;
    
    /**
     *
     * @var string $pullsClosed
     */
    private $pullsClosed;

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getForks() {
        return $this->forks;
    }

    function getStars() {
        return $this->stars;
    }

    function getWatchers() {
        return $this->watchers;
    }

    function getLastRelease() {
        return $this->lastRelease;
    }

    function getPullsOpen() {
        return $this->pullsOpen;
    }

    function getPullsClosed() {
        return $this->pullsClosed;
    }

    function setForks($forks) {
        $this->forks = $forks;
    }

    function setStars($stars) {
        $this->stars = $stars;
    }

    function setWatchers($watchers) {
        $this->watchers = $watchers;
    }

    function setLastRelease($lastRelease) {
        $this->lastRelease = $lastRelease;
    }

    function setPullsOpen($pullsOpen) {
        $this->pullsOpen = $pullsOpen;
    }

    function setPullsClosed($pullsClosed) {
        $this->pullsClosed = $pullsClosed;
    }

    function __toString() {
        return (string) $this->name;
    }

}
