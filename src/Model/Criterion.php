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
     * @Column(name="cri_gradetype", type="string")
     * @var string
     */
    protected $gradetype;

    /**
     * Criterion constructor.
     * @param int $id
     * @param int $act_id
     * @param string $name
     * @param string $gradetype
     * @param float $weight
     * @param float $lowerbound
     * @param int $upperbound
     * @param float $step
     */
    public function __construct($id=0, $act_id=0, $name='', $weight=0, $lowerbound=0, $upperbound=5, $step=0.5, $gradetype='absolute',$inserted='')
    {
        parent::__construct($id,$inserted);
        $this->act_id = $act_id;
        $this->name = $name;
        $this->gradetype = $gradetype;
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

    function getLowerbound() {
        return $this->lowerbound;
    }

    function getUpperbound() {
        return $this->upperbound;
    }

    function getStep() {
        return $this->step;
    }

    function setLowerbound($lowerbound) {
        $this->lowerbound = $lowerbound;
    }

    function setUpperbound($upperbound) {
        $this->upperbound = $upperbound;
    }

    function setStep($step) {
        $this->step = $step;
    }

       

    /**
     * @return string
     */
    public function getGradeType()
    {
        return $this->gradetype;
    }

    /**
     * @param string $gradetype
     */
    public function setGradeType($gradetype)
    {
        $this->gradetype = $gradetype;
    }

}