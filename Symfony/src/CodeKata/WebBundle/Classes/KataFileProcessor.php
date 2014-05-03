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
        $required = array('id', 'title');
        foreach($required as $r) {
            if(!array_key_exists($r, $array)) {
                throw new \Exception("The '$r' attribute is not provided.");
            }
        }

        $kataTemplate = new KataTemplate($array['id'], $array['title']);
        if(array_key_exists('description', $array)) {
            $kataTemplate->setDescription($array['description']);
        }
        if(array_key_exists('steps', $array)) {
            $kataTemplate->setSteps($array['steps']);
        }
        return $kataTemplate;
    }

}
