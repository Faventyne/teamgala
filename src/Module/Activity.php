<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:40
 */

namespace Model;

/**
 * @Entity @Table(name="activity")
 */
class Activity extends DbObject
{
    /**
     * @Column(name="organization_org_id", length=10, type="integer")
     * @var int
     */
    protected $org_id;
    /**
     * @Column(name="act_name", type="string")
     * @var string
     */
    protected $name;
    /**
     * @Column(name="act_quotes_deadline", length= 10, type="datetime")
     * @var string
     */
    protected $quotes_deadline;
    /**
     * @Column(name="act_objectives", type="string")
     * @var string
     */
    protected $objectives;
    /**
     * @Column(name="act_status", type="string")
     * @var string
     */
    protected $status;
    /**
     * @Column(name="act_isRewarding", type="boolean")
     * @var bool
     */
    protected $isRewarding;
    /**
     * @Column(name="act_distrAmount", length=10, type="float")
     * @var float
     */
    protected $distrAmount;
    /**
     * @Column(name="act_res_inertia", length= 10, type="float")
     * @var int
     */
    protected $res_inertia;
    /**
     * @Column(name="act_res_benefit_eff", length= 10, type="float")
     * @var int
     */
    protected $res_benefit_eff;

    /**
     * Activity constructor.
     * @param int $org_id
     * @param string $name
     * @param string $quotes_deadline
     * @param string $objectives
     * @param string $status
     * @param bool $isRewarding
     * @param float $distrAmount
     * @param int $res_inertia
     * @param int $res_benefit_eff
     */
    public function __construct($id, $org_id, $name, $quotes_deadline, $objectives, $status, $isRewarding, $distrAmount, $res_inertia, $res_benefit_eff,$inserted)
    {
        $this->org_id = $org_id;
        $this->name = $name;
        $this->quotes_deadline = $quotes_deadline;
        $this->objectives = $objectives;
        $this->status = $status;
        $this->isRewarding = $isRewarding;
        $this->distrAmount = $distrAmount;
        $this->res_inertia = $res_inertia;
        $this->res_benefit_eff = $res_benefit_eff;
        parent::__construct($id,$inserted);
    }

    /**
     * @return int
     */
    public function getOrgId()
    {
        return $this->org_id;
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
     * @return string
     */
    public function getQuotesDeadline()
    {
        return $this->quotes_deadline;
    }

    /**
     * @param string $quotes_deadline
     */
    public function setQuotesDeadline($quotes_deadline)
    {
        $this->quotes_deadline = $quotes_deadline;
    }

    /**
     * @return string
     */
    public function getObjectives()
    {
        return $this->objectives;
    }

    /**
     * @param string $objectives
     */
    public function setObjectives($objectives)
    {
        $this->objectives = $objectives;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isRewarding()
    {
        return $this->isRewarding;
    }

    /**
     * @param bool $isRewarding
     */
    public function setIsRewarding($isRewarding)
    {
        $this->isRewarding = $isRewarding;
    }

    /**
     * @return float
     */
    public function getDistrAmount()
    {
        return $this->distrAmount;
    }

    /**
     * @param float $distrAmount
     */
    public function setDistrAmount($distrAmount)
    {
        $this->distrAmount = $distrAmount;
    }

    /**
     * @return int
     */
    public function getResInertia()
    {
        return $this->res_inertia;
    }

    /**
     * @param int $res_inertia
     */
    public function setResInertia($res_inertia)
    {
        $this->res_inertia = $res_inertia;
    }

    /**
     * @return int
     */
    public function getResBenefitEff()
    {
        return $this->res_benefit_eff;
    }

    /**
     * @param int $res_benefit_eff
     */
    public function setResBenefitEff($res_benefit_eff)
    {
        $this->res_benefit_eff = $res_benefit_eff;
    }




}