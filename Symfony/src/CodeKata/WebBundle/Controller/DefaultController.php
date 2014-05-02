<?php

namespace CodeKata\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CodeKata\WebBundle\Entity\Kata;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $kata = new Kata();

        $form = $this->createFormBuilder($kata)
            ->add('code', 'text')
            ->add('save', 'submit')
            ->getForm();

        return $this->render('CodeKataWebBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
