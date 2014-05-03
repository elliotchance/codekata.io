<?php

namespace CodeKata\WebBundle\Classes;

use Symfony\Component\Yaml\Yaml;
use CodeKata\WebBundle\Entity\KataTemplate;

class KataFileProcessor
{

    /**
     * @return array
     */
    public function parseFile($filePath)
    {
        return Yaml::parse($filePath);
    }

    /**
     * @return \CodeKata\WebBundle\Entity\KataTemplate
     */
    public function kataFromFile($fileName)
    {
        $path = dirname(__FILE__) . "/../Resources/katas/{$fileName}.yml";
        $array = $this->parseFile($path);
        if(!array_key_exists('id', $array)) {
            throw new \Exception("The 'id' attribute is not provided.");
        }

        $kataTemplate = new KataTemplate($array['id'], $array['title']);
        $kataTemplate->setDescription($array['description']);
        $kataTemplate->setSteps($array['steps']);
        return $kataTemplate;
    }

}
