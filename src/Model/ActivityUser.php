<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:43
 */

namespace Model;

/**
 * @Entity()
 * @Table(name="position")
 */
class ActivityUser
{
    
    /**
     *@Column(name="activity_act_id, type="integer", nullable=false)
     * @var type int
     */
    protected $act_id;
    /**
     *@Column(name="user_usr_id, type="integer", nullable=false)
     * @var type int
     */
    protected $usr_id;
    /**
     * @Column(name="a_u_distance", length= 10, type="float", nullable=true)
     * @var float
     */
    protected $distance;
    /**
     * @Column(name="a_u_result", length= 10, type="float", nullable=true)
     * @var float
     */
    protected $result;
    /**
     * @Column(name="a_u_type", type="string", columnDefinition="ENUM('Mgr,Col,Tp')"
     * @var string
     */
    protected $type;
    /**
     * @Column(name="a_u_mweight", length=10, type="float")
     * @var float
     */
    protected $mweight;
    /**
     * @Column(name="a_u_precomment", length=10, type="float")
     * @var float
     */
    protected $precomment;
    /**
     * @Column(name="a_u_ivp_bonus", length=10, type="float")
     * @var float
     */
    protected $ivp_bonus;
    /**
     * @Column(name="a_u_ivp_penalty", length=10, type="float")
     * @var float
     */
    protected $ivp_penalty;
    /**
     * @Column(name="a_u_of_bonus", length=10, type="float")
     * @var float
     */
    protected $of_bonus;
    /**
     * @Column(name="a_u_of_penalty", length=10, type="float")
     * @var float
     */
    protected $of_penalty;


    /**
     * Participant constructor.
     * @param int $usr_id
     * @param int $act_id
     * @param float $distance
     * @param float $result
     * @param float $type
     * @param float $mweight
     * @param float $precomment
     * @param float $ivp_bonus
     * @param float $ivp_penalty
     * @param float $of_bonus
     * @param float $of_penalty

     */
    public function __construct($usr_id=0, $act_id=0, $distance=0, $result=0, $type='Col', $mweight=0, $precomment='', $ivp_bonus=0, $ivp_penalty=0, $of_bonus=0, $of_penalty=0, $inserted='')
    {
        $this->usr_id = $usr_id;
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
        $this->inserted = $inserted;
    }
    
    /**
     * @return int
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }
    
    /**
     * @return int
     */
    public function getActId()
    {
        return $this->act_id;
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

}