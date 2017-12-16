<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 06/11/2017
 * Time: 17:21
 */

namespace EventModule\Entity;


class Event
{
    private $id;
    private $title;
    private $description;
    private $speaker;
    private $dateTime;
    private $location;

    /**
     * Event constructor.
     * @param $title
     * @param $description
     * @param $speaker
     * @param $dateTime
     * @param $location
     */
    public function __construct($title, $description, $speaker, $dateTime, $location)
    {
        $this->title = $title;
        $this->description = $description;
        $this->speaker = $speaker;
        $this->dateTime = $dateTime;
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * @param mixed $speaker
     */
    public function setSpeaker($speaker)
    {
        $this->speaker = $speaker;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}