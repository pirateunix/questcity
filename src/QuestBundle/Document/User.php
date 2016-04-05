<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 24.02.16
 * Time: 14:57
 */

namespace QuestBundle\Document;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */

class User implements UserInterface
{
    /**
     * @MongoDB\String
     */
    protected $login;
    /**
     * @MongoDB\String
     */
    protected $password;
    /**
     * @MongoDB\String
     */
    protected $token;
    /**
     * @MongoDB\String
     */
    protected $token_valid;
    /**
     * @MongoDB\Id
     */
    /**
     * @var MongoId $id
     */
    protected $id;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * Get login
     *
     * @return string $login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
       # $password = md5($this->password . '!*$#d');
        return $this->password;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get token
     *
     * @return string $token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set tokenValid
     *
     * @param string $tokenValid
     * @return self
     */
    public function setTokenValid($tokenValid)
    {
        $this->token_valid = $tokenValid;
        return $this;
    }

    /**
     * Get tokenValid
     *
     * @return string $tokenValid
     */
    public function getTokenValid()
    {
        return $this->token_valid;
    }

    /*
     * implement userinterface
     */
    public function getUsername()
    {
        return $this->login;
    }

    public function getSalt()
    {
        return '!*$#d';
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }
}
