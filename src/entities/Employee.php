<?php
namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="personnel")
 */
class Employee{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string")
     */
    protected $fname;
    /** 
     * @ORM\Column(type="string")
     */
    protected $lname;
     /** 
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="employeeWithProj")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", onDelete="SET NULL")
     */
    public $project_id;
  
    public function getId(){
        return $this->id;
    }
    public function setName(){
        return $this->fname;
    }
    public function setSurname(){
        return $this->lname;
    }
}