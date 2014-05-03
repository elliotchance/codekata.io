<?php

namespace CodeKata\WebBundle\Classes;

use Symfony\Component\Yaml\Yaml;
use CodeKata\WebBundle\Entity\KataTemplate;

class KataFileProcessor
{

    public function kataFromFile($fileName)
    {
        $path = dirname(__FILE__) . "/../Resources/katas/{$fileName}.yml";
        $array = Yaml::parse($path);
        $kataTemplate = new KataTemplate($array['id'], $array['title']);
        $kataTemplate->setDescription($array['description']);
        $kataTemplate->setSteps($array['steps']);
        return $kataTemplate;
    }

}
