<?php
namespace App\models\entities;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */

 class Post extends Entity{
/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="IDENTITY")
 */
protected $id;

/**
 * @ORM\Column(type="string")
 */
protected $tittle;

/**
 * @ORM\Column(type="string")
 */
protected $body;


/**
 * @ORM\Column(type="integer")
 */

 protected $idUser;
 /**
  * @ORM\Column(type="datetime")
  */
  protected $created_at;
  /**
   * @ORM\Column(type="datetime")
   */
  protected $updated_at;



  public function __construct(){
      $this->created_at=new \DateTime('now');
      $this->updated_at=new \DateTime('now');
  }
  
 }