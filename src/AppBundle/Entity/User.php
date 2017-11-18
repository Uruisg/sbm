<?php
/**
 * Created by PhpStorm.
 * User: Bobble
 * Date: 11/11/17
 * Time: 1:50 PM
 */

namespace AppBundle\Entity;


// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Table(name="sbm_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */

class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(name="block", type="boolean")
     */
    private $block;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sendEmail=true;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registerDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastVisitDate;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $activation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastResetTime;


    /**
     * @ORM\Column(type="boolean")
     */
    private $requireReset=false;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $roles;


    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

    /**
     * @param mixed $sendEmail
     */
    public function setSendEmail($sendEmail)
    {
        $this->sendEmail = $sendEmail;
    }

    /**
     * @param mixed $registerDate
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

    /**
     * @param mixed $lastVisitDate
     */
    public function setLastVisitDate($lastVisitDate)
    {
        $this->lastVisitDate = $lastVisitDate;
    }

    /**
     * @param mixed $activation
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;
    }

    /**
     * @param mixed $lastResetTime
     */
    public function setLastResetTime($lastResetTime)
    {
        $this->lastResetTime = $lastResetTime;
    }

    /**
     * @param mixed $requireReset
     */
    public function setRequireReset($requireReset)
    {
        $this->requireReset = $requireReset;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }




    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }


    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}