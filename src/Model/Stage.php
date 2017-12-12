<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:41
 */

namespace Model;

/**
 * @Entity()
 * @Table(name="stage")
 */
class Stage extends DbObject
{
    /**
     *@Id()
     * @GeneratedValue()
     * @Column(name="stg_id", type="integer",nullable=false, length=10)
     * @var type int
     */
    protected $id;
    /**
     * @Column(name="activity_act_id", length=10, type="integer")
     * @var int
     */
    protected $act_id;
    /**
     * @Column(name="stg_name", type="string")
     * @var string
     */
    protected $name;
    /**
     * @Column(name="stg_weight", length=10, type="float")
     * @var float
     */
    protected $weight;
    /**
     * @Column(name="stg_deadline", type="datetime")
     * @var string
     */
    protected $deadline;

    /**
     * Stage constructor.
     * @param int $id
     * @param int $act_id
     * @param string $name
     * @param float $weight
     * @param string $deadline
     */
    public function __construct($id=0, $act_id=0, $name='', $weight=0, $deadline='', $inserted='')
    {
        parent::__construct($id,$inserted);
        $this->act_id = $act_id;
        $this->name = $name;
        $this->weight = $weight;
        $this->deadline = $deadline;
    }
    
    /**
     * return int
     */
    public function getId()
    {
        return $this->id ;
    }
    
    /**
     * @return int
     */
    public function getActId()
    {
        return $this->act_id;
    }

    /**
     * @param int $act_id
     */
    public function setActId($act_id)
    {
        $this->act_id = $act_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param string $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }


}