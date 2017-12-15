<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:40
 */

namespace Model;

/**
 * @Entity()
 * @Table(name="activity")
 */
class Activity extends DbObject
{
    /**
     *@Id()
     * @GeneratedValue()
     * @Column(name="act_id", type="integer", nullable=false")
     * @var int
     */
    protected $id;
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
     * @Column(name="act_visibility", type="string")
     * @var string
     */
    protected $visibility;
    /* Deadline property is set to public as an external getter created in Criterion needs to access it (Activity Parameters form)*/
    /**
     * @Column(name="act_deadline",  type="datetime")
     * @var datetime
     */
    protected $deadline;
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
     * @Column(name="act_inserted", type="datetime")
     * @var /DateTime
     */
    protected $inserted;

    /**
     * Activity constructor.
     * @param int $id
     * @param int $org_id
     * @param string $name
     * @param string $visibility
     * @param string $deadline
     * @param string $objectives
     * @param string $status
     * @param bool $isRewarding
     * @param float $distrAmount
     * @param int $res_inertia
     * @param int $res_benefit_eff
     * * @param /DateTime $inserted
     */
    public function __construct($id=0, $org_id=0, $name='',$visibility='', $deadline=null, $objectives='', $status='', $isRewarding=false, $distrAmount=0.0, $res_inertia=0, $res_benefit_eff=0,$inserted=null)
    {
        parent::__construct($id,new \DateTime());
        $this->org_id = $org_id;
        $this->name = $name;
        $this->visibility = $visibility;
        $this->deadline = $deadline;
        $this->objectives = $objectives;
        $this->status = $status;
        $this->isRewarding = $isRewarding;
        $this->distrAmount = $distrAmount;
        $this->res_inertia = $res_inertia;
        $this->res_benefit_eff = $res_benefit_eff;
        
    }
    
    function getVisibility() {
        return $this->visibility;
    }

    function getRes_inertia() {
        return $this->res_inertia;
    }

    function getRes_benefit_eff() {
        return $this->res_benefit_eff;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    function setRes_inertia($res_inertia) {
        $this->res_inertia = $res_inertia;
    }

    function setRes_benefit_eff($res_benefit_eff) {
        $this->res_benefit_eff = $res_benefit_eff;
    }

    
    public function getId()
    {
        return $this->id ;
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
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param  \DateTime $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
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