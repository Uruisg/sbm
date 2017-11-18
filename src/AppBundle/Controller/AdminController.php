<?php
/**
 * Created by PhpStorm.
 * User: Bobble
 * Date: 11/11/17
 * Time: 3:59 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

Class AdminController extends Controller
{
    /**
     * @Route("/admin")
     */

    public function adminAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN',null, 'Access Denied');
        return new Response(dump($this->getUser()));

    }

}