<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 21.02.16
 * Time: 17:02
 */

namespace QuestBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class Schedule {
    /**
     * @MongoDB\String
     */
    protected $book_time;
    /**
     * @MongoDB\String
     */
    protected $quest;
    /**
     * @MongoDB\String
     */
    protected $email;
    /**
     * @MongoDB\String
     */
    protected $phone;
    /**
     * @MongoDB\String
     */
    protected $vk;
    /**
     * @MongoDB\String
     */
    protected $name;
    /**
     * @MongoDB\String
     */
    protected $cert;
    /**
     * @MongoDB\Boolean
     */
    protected $rejected;
    /**
     * @MongoDB\Boolean
     */
    protected $confirmed;
    /**
     * @MongoDB\Id
     */
    /**
     * @var MongoId $id
     */
    protected $id;
    /**
     * @MongoDB\ReferenceOne(targetDocument="QuestBundle\Document\Quest")
     */
    private $info;


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
     * Set bookTime
     *
     * @param date $bookTime
     * @return self
     */
    public function setBookTime($bookTime)
    {
        $this->book_time = $bookTime;
        return $this;
    }

    /**
     * Get bookTime
     *
     * @return date $bookTime
     */
    public function getBookTime()
    {
        return $this->book_time;
    }

    /**
     * Set quest
     *
     * @param string $quest
     * @return self
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;
        return $this;
    }

    /**
     * Get quest
     *
     * @return string $quest
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param int $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return int $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set vk
     *
     * @param string $vk
     * @return self
     */
    public function setVk($vk)
    {
        $this->vk = $vk;
        return $this;
    }

    /**
     * Get vk
     *
     * @return string $vk
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cert
     *
     * @param string $cert
     * @return self
     */
    public function setCert($cert)
    {
        $this->cert = $cert;
        return $this;
    }

    /**
     * Get cert
     *
     * @return string $cert
     */
    public function getCert()
    {
        return $this->cert;
    }

    /**
     * Set rejected
     *
     * @param string $rejected
     * @return self
     */
    public function setRejected($rejected)
    {
        $this->rejected = $rejected;
        return $this;
    }

    /**
     * Get rejected
     *
     * @return string $rejected
     */
    public function getRejected()
    {
        return $this->rejected;
    }

    /**
     * Set confirmed
     *
     * @param string $confirmed
     * @return self
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
        return $this;
    }

    /**
     * Get confirmed
     *
     * @return string $confirmed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }
   /*public function __construct()
    {
        $this->info = new \Doctrine\Common\Collections\ArrayCollection();
    }
    */
   

    /**
     * Set info
     *
     * @param \QuestBundle\Document\Quest $info
     * @return self
     */
    public function setInfo(\QuestBundle\Document\Quest $info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * Get info
     *
     * @return \QuestBundle\Document\Quest $info
     */
    public function getInfo()
    {
        return $this->info;
    }
}
