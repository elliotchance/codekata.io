<?php

namespace CodeKata\WebBundle\Entity;

class Kata
{
    protected $code;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}
