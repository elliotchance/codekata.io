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

    public function getKataMenuItems()
    {
        $katas = $this->getKatas();
        $r = array();
        foreach($katas as $kata) {
            $r[$kata->getTitle()] = $kata->getTitle();
        }
        return $r;
    }

    public function indexAction()
    {
        $kata = new Kata();

        $form = $this->createFormBuilder($kata)
            ->add('kataTemplate', 'choice', array(
                'choices' => $this->getKataMenuItems()
            ))
            ->add('code', 'textarea')
            ->add('run', 'submit')
            ->getForm();

        return $this->render('CodeKataWebBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
