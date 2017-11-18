<?php
/**
 * Created by PhpStorm.
 * User: Bobble
 * Date: 8/11/17
 * Time: 8:59 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SBMController extends Controller
{

    /**
     * @Route("/")
     */

    public function showAction()
    {

        return $this->render('index.html.twig');

    }


}