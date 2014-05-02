<?php

namespace CodeKata\WebBundle\Entity;

class Kata
{
    protected $code;

    protected $kataTemplate;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getKataTemplate()
    {
        return $this->kataTemplate;
    }

    public function setKataTemplate($kataTemplate)
    {
        $this->kataTemplate = $kataTemplate;
    }
}
