<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplate
{
    protected $title;

    protected $steps = array();

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getSteps()
    {
        return $this->steps;
    }

    public static function getAll()
    {
        return array(
            new KataTemplate('My Kata')
        );
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return 'mytitle';
    }
}
