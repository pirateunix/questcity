<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 07.02.16
 * Time: 19:19
 */

namespace QuestBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */

class Quest {
    /**
     * @MongoDB\String
     */
    protected $bookText;
    /**
     * @MongoDB\String
     */
    protected $color;
    /**
     * @MongoDB\String
     */
    protected $name;
    /**
     * @MongoDB\Int
     */
    protected $order;
    /**
     * @MongoDB\Int
     */
    protected $step;
    /**
     * @MongoDB\String
     */
    protected $text;
    /**
     * @MongoDB\String
     */
    protected $time_end;
    /**
     * @MongoDB\String
     */
    protected $time_start;
    /**
     * @MongoDB\String
     */
    protected $title;
    /**
     * @MongoDB\Id
     */
    /**
     * @var MongoId $id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="QuestBundle\Document\Schedule")
     */
    private $booked = array();

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
     * Set bookText
     *
     * @param string $bookText
     * @return self
     */
    public function setBookText($bookText)
    {
        $this->bookText = $bookText;
        return $this;
    }

    /**
     * Get bookText
     *
     * @return string $bookText
     */
    public function getBookText()
    {
        return $this->bookText;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Get color
     *
     * @return string $color
     */
    public function getColor()
    {
        return $this->color;
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
     * Set order
     *
     * @param int $order
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return int $order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set step
     *
     * @param int $step
     * @return self
     */
    public function setStep($step)
    {
        $this->step = $step;
        return $this;
    }

    /**
     * Get step
     *
     * @return int $step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set timeEnd
     *
     * @param date $timeEnd
     * @return self
     */
    public function setTimeEnd($timeEnd)
    {
        $this->time_end = $timeEnd;
        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return date $timeEnd
     */
    public function getTimeEnd()
    {
        return $this->time_end;
    }

    /**
     * Set timeStart
     *
     * @param date $timeStart
     * @return self
     */
    public function setTimeStart($timeStart)
    {
        $this->time_start = $timeStart;
        return $this;
    }

    /**
     * Get timeStart
     *
     * @return date $timeStart
     */
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    public function __construct()
    {
        $this->booked = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
   /**
     * Add booked
     *
     * @param QuestBundle\Document\Schedule $booked
     */
    public function addBooked(\QuestBundle\Document\Schedule $booked)
    {
        $this->booked[] = $booked;
    }

    /**
     * Remove booked
     *
     * @param QuestBundle\Document\Schedule $booked
     */
    public function removeBooked(\QuestBundle\Document\Schedule $booked)
    {
        $this->booked->removeElement($booked);
    }

    /**
     * Get booked
     *
     * @return \Doctrine\Common\Collections\Collection $booked
     */
    public function getBooked()
    {
        return $this->booked;
    }
}
