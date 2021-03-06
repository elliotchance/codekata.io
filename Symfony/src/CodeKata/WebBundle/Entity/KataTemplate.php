<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplate
{
    protected $id;

    protected $title;

    protected $description;

    protected $steps = array();

    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getSteps()
    {
        return $this->steps;
    }

    public static function getAll()
    {
        return array(
            new KataTemplate('mykata', 'My Kata')
        );
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setSteps(array $steps)
    {
        $this->steps = $steps;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
