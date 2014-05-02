<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplate
{
    protected $steps = array();

    public function getSteps()
    {
        return $this->steps;
    }
}
