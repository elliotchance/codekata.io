<?php

namespace CodeKata\WebBundle\Classes;

use Symfony\Component\Yaml\Yaml;
use CodeKata\WebBundle\Entity\KataTemplate;

class KataFileProcessor
{

    public function kataFromFile($fileName)
    {
        $path = dirname(__FILE__) . "/../Resources/katas/$fileName";
        $array = Yaml::parse($path);
        return new KataTemplate($array['id'], $array['id']);
    }

}
