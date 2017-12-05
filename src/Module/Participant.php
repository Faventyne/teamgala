<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:43
 */

namespace Model;

/**
 * @Entity @Table(name="participant")
 */
class Participant extends DbObject
{
    /**
     * @Column(name="role_rol_id", length=10, type="integer")
     * @var int
     */
    protected $rol_id;
    /**
     * @Column(name="activity_act_id", length=10, type="integer")
     * @var int
     */
    protected $act_id;
    /**
     * @Column(name="par_distance", length= 5, type="float", nullable=true)
     * @var float
     */
    protected $distance;
    /**
     * @Column(name="par_result", length= 15, type="float", nullable=true)
     * @var float
     */
    protected $result;
    /**
     * @Column(name="par_type", type="string", columnDefinition="ENUM('Mgr,Col,Tp')"
     * @var string
     */
    protected $type;
    /**
     * @Column(name="par_mweight", length=10, type="float")
     * @var float
     */
    protected $mweight;
    /**
     * @Column(name="par_precomment", length=10, type="float")
     * @var float
     */
    protected $precomment;
    /**
     * @Column(name="par_ivp_bonus", length=10, type="float")
     * @var float
     */
    protected $ivp_bonus;
    /**
     * @Column(name="par_ivp_penalty", length=10, type="float")
     * @var float
     */
    protected $ivp_penalty;
    /**
     * @Column(name="par_of_bonus", length=10, type="float")
     * @var float
     */
    protected $of_bonus;
    /**
     * @Column(name="par_of_penalty", length=10, type="float")
     * @var float
     */
    protected $of_penalty;


    /**
     * Participant constructor.
     * @param int $rol_id
     * @param int $act_id
     * @param float $distance
     * @param float $result
     * @param $type
     * @param float $mweight
     * @param float $precomment
     * @param float $ivp_bonus
     * @param float $ivp_penalty
     * @param float $of_bonus
     * @param float $of_penalty

     */
    public function __construct($id=0, $rol_id=0, $act_id=0, $distance=0, $result=0, $type='Col', $mweight=0, $precomment='', $ivp_bonus=0, $ivp_penalty=0, $of_bonus=0, $of_penalty=0, $inserted='')
    {
        $this->rol_id = $rol_id;
        $this->act_id = $act_id;
        $this->distance = $distance;
        $this->result = $result;
        $this->type = $type;
        $this->mweight = $mweight;
        $this->precomment = $precomment;
        $this->ivp_bonus = $ivp_bonus;
        $this->ivp_penalty = $ivp_penalty;
        $this->of_bonus = $of_bonus;
        $this->of_penalty = $of_penalty;

        parent::__construct($id,$inserted);
    }


    /**
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return float
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param float $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getMweight()
    {
        return $this->mweight;
    }

    /**
     * @param float $mweight
     */
    public function setMweight($mweight)
    {
        $this->mweight = $mweight;
    }

    /**
     * @return float
     */
    public function getPrecomment()
    {
        return $this->precomment;
    }

    /**
     * @param float $precomment
     */
    public function setPrecomment($precomment)
    {
        $this->precomment = $precomment;
    }

    /**
     * @return float
     */
    public function getIvpBonus()
    {
        return $this->ivp_bonus;
    }

    /**
     * @param float $ivp_bonus
     */
    public function setIvpBonus($ivp_bonus)
    {
        $this->ivp_bonus = $ivp_bonus;
    }

    /**
     * @return float
     */
    public function getIvpPenalty()
    {
        return $this->ivp_penalty;
    }

    /**
     * @param float $ivp_penalty
     */
    public function setIvpPenalty($ivp_penalty)
    {
        $this->ivp_penalty = $ivp_penalty;
    }

    /**
     * @return float
     */
    public function getOfBonus()
    {
        return $this->of_bonus;
    }

    /**
     * @param float $of_bonus
     */
    public function setOfBonus($of_bonus)
    {
        $this->of_bonus = $of_bonus;
    }

    /**
     * @return float
     */
    public function getOfPenalty()
    {
        return $this->of_penalty;
    }

    /**
     * @param float $of_penalty
     */
    public function setOfPenalty($of_penalty)
    {
        $this->of_penalty = $of_penalty;
    }

    /**
     * @return int
     */
    public function getRolId()
    {
        return $this->rol_id;
    }



    /**
     * @return int
     */
    public function getActId()
    {
        return $this->act_id;
    }



}