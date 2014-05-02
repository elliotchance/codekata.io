<?php

namespace CodeKata\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CodeKata\WebBundle\Entity\Kata;
use CodeKata\WebBundle\Entity\KataTemplate;

class DefaultController extends Controller
{
    public function getKatas()
    {
        return KataTemplate::getAll();
    }

    public function indexAction()
    {
        $kata = new Kata();

        $form = $this->createFormBuilder($kata)
            ->add('kataTemplate', 'choice', array(
                'choices' => array('m' => 'Male', 'f' => 'Female')
            ))
            ->add('code', 'textarea')
            ->add('run', 'submit')
            ->getForm();

        return $this->render('CodeKataWebBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
