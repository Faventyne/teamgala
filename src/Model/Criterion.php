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
 * @Table(name="criterion")
 */
class Criterion extends DbObject
{
    /**
     * @Id()
     * @GeneratedValue()
     * @column(name="crt_id", type="integer", nullable=false) 
     */
    protected $id ;
    /**
     * @Column(name="activity_act_id", length=10, type="integer")
     * @var int
     */
    protected $act_id;
    /**
     * @Column(name="cri_name", type="string")
     * @var string
     */
    protected $name;
    /**
     * @Column(name="cri_weight", length= 10, type="float")
     * @var float
     */
    protected $weight;
    /**
     * @Column(name="cri_lowerbound", length= 10, type="float")
     * @var float
     */
    protected $lowerbound;
    /**
     * @Column(name="cri_upperbound", length= 10, type="float")
     * @var int
     */
    protected $upperbound;
    /**
     * @Column(name="cri_upperbound", length= 10, type="float")
     * @var float
     */
    protected $step;
    /**
     * @Column(name="cri_grade_type", type="string")
     * @var string
     */
    protected $grade_type;

    /**
     * Criterion constructor.
     * @param int $id
     * @param int $act_id
     * @param string $name
     * @param string $grade_type
     * @param float $weight
     * @param float $lowerbound
     * @param int $upperbound
     * @param float $step
     */
    public function __construct($id=0, $act_id=0, $name='', $weight=0, $lowerbound=0, $upperbound=5, $step=0.5, $grade_type='absolute',$inserted='')
    {
        parent::__construct($id,$inserted);
        $this->act_id = $act_id;
        $this->name = $name;
        $this->grade_type = $grade_type;
        $this->weight = $weight;
        $this->lowerbound = $lowerbound;
        $this->upperbound = $upperbound;
        $this->step = $step;
        
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return int
     */
    public function getActId()
    {
        return $this->act_id;
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
     * @return float
     */
    public function getGradeLb()
    {
        return $this->lowerbound;
    }

    /**
     * @param float $lowerbound
     */
    public function setGradeLb($lowerbound)
    {
        $this->lowerbound = $lowerbound;
    }

    /**
     * @return int
     */
    public function getGradeUb()
    {
        return $this->upperbound;
    }

    /**
     * @param int $upperbound
     */
    public function setGradeUb($upperbound)
    {
        $this->upperbound = $upperbound;
    }

    /**
     * @return float
     */
    public function getGradeStep()
    {
        return $this->step;
    }

    /**
     * @param float $step
     */
    public function setGradeStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return string
     */
    public function getGradeType()
    {
        return $this->grade_type;
    }

    /**
     * @param string $grade_type
     */
    public function setGradeType($grade_type)
    {
        $this->grade_type = $grade_type;
    }

}