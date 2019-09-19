<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=100)
   */
  private $title;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $author;

  /**
   * @ORM\Column(type="datetime", name="posted_at")
   */
  private $postedAt;

  /**
   * @ORM\Column(type="datetime", name="updated_at")
   */
  private $updatedAt;

  /**
   * @ORM\Column(type="text")
   */
  private $body;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    return $this->id = $id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    return $this->title = $title;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setAuthor($author)
  {
    return $this->author = $author;
  }

  public function getPostedAt()
  {
    return $this->postedAt;
  }

  public function setPostedAt($postedAt)
  {
    return $this->postedAt = $postedAt;
  }

  public function getUpdatedAt()
  {
    return $this->postedAt;
  }

  public function setUpdatedAt($updatedAt)
  {
    return $this->updatedAt = $updatedAt;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setBody($body)
  {
    return $this->body = $body;
  }
}
