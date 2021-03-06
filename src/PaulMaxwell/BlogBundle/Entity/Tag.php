<?php

namespace PaulMaxwell\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 * @package PaulMaxwell\BlogBundle\Entity
 *
 * @ORM\Entity(repositoryClass="PaulMaxwell\BlogBundle\Entity\TagRepository")
 * @ORM\Table(name="tag")
 */
class Tag
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(name="times_used", type="integer")
     */
    protected $timesUsed = 0;

    /**
     * @ORM\ManyToMany(targetEntity="Article", inversedBy="tags")
     */
    protected $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $timesUsed
     */
    public function setTimesUsed($timesUsed)
    {
        $this->timesUsed = $timesUsed;
    }

    /**
     * @return integer
     */
    public function getTimesUsed()
    {
        return $this->timesUsed;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
