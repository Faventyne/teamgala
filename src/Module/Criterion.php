<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:41
 */

namespace Model;

/**
 * @Entity @Table(name="criterion")
 */
class Criterion extends DbObject
{
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
     * @Column(name="cri_grade_lb", length= 10, type="float")
     * @var float
     */
    protected $grade_lb;
    /**
     * @Column(name="cri_grade_ub", length= 10, type="float")
     * @var int
     */
    protected $grade_ub;
    /**
     * @Column(name="cri_grade_ub", length= 10, type="float")
     * @var float
     */
    protected $grade_step;
    /**
     * @Column(name="cri_grade_type", type="string")
     * @var string
     */
    protected $grade_type;

    /**
     * Criterion constructor.
     * @param int $act_id
     * @param string $name
     * @param string $grade_type
     * @param float $weight
     * @param float $grade_lb
     * @param int $grade_ub
     * @param float $grade_step
     */
    public function __construct($id=0, $act_id=0, $name='', $weight=0, $grade_lb=0, $grade_ub=5, $grade_step=0.5, $grade_type='absolute',$inserted='')
    {
        $this->act_id = $act_id;
        $this->name = $name;
        $this->grade_type = $grade_type;
        $this->weight = $weight;
        $this->grade_lb = $grade_lb;
        $this->grade_ub = $grade_ub;
        $this->grade_step = $grade_step;
        parent::__construct($id,$inserted);
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
        return $this->grade_lb;
    }

    /**
     * @param float $grade_lb
     */
    public function setGradeLb($grade_lb)
    {
        $this->grade_lb = $grade_lb;
    }

    /**
     * @return int
     */
    public function getGradeUb()
    {
        return $this->grade_ub;
    }

    /**
     * @param int $grade_ub
     */
    public function setGradeUb($grade_ub)
    {
        $this->grade_ub = $grade_ub;
    }

    /**
     * @return float
     */
    public function getGradeStep()
    {
        return $this->grade_step;
    }

    /**
     * @param float $grade_step
     */
    public function setGradeStep($grade_step)
    {
        $this->grade_step = $grade_step;
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