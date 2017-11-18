<?php
/**
 * Created by PhpStorm.
 * User: Bobble
 * Date: 12/11/17
 * Time: 7:23 PM
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++){
            $ts = new \DateTime();
            $user = new User();
            $user->setName('name'.$i);
            $user->setEmail('rob+'.$i.'@gmail.com');
            $user->setPassword('Password'.$i);
            $user->setBlock(false);
            $user->setSendEmail(true);
            $user->setRegisterDate($ts);
            $user->setLastVisitDate($ts);
            $user->setActivation('Activation'.$i);
            $user->setLastResetTime($ts);
            $user->setRequireReset(false);
            $user->setIsActive(true);
            $user->setRoles('ROLE_USER');
            $manager->persist($user);

        }

        $manager->flush();
    }

}