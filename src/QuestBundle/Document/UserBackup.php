<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 24.02.16
 * Time: 14:57
 */

namespace QuestBundle\Document;


class User
{
    protected $login;
    protected $password;
    protected $token;
    protected $token_valid;

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
}
