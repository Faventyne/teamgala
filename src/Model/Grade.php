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
 * @Table(name="grade")
 */
class Grade extends DbObject
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(name="grd_id", length=10, type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(name="activity_user_activity_act_id", length=10, type="integer")
     * @var int
     */
    protected $act_id;
    /**
     * @Column(name="activity_user_user_usr_id", length=10, type="integer")
     * @var int
     */
    protected $par_id;
    /**
     * @Column(name="criterion_crt_id", length=10, type="integer")
     * @var int
     */
    protected $cri_id;
    /**
     * @Column(name="stage_stg_id", length= 10, type="integer")
     * @var int
     */
    protected $stg_id;
    /**
     * @Column(name="grd_graded_id", length= 10, type="integer")
     * @var int
     */
    protected $graded_id;
    //TODO : remove grader_id, similar to par_id, place graded_id next to foreign keys
    /**
     * @Column(name="grd_value", length= 10, type="float")
     * @var float
     */
    protected $value;
    //TODO : vérifier si dans Doctrine on peut créer un long champ
    /**
     * @Column(name="grd_comment", length= 10, type="string")
     * @var string
     */
    protected $comment;
/**
* @Column(name="grd_inserted", type="datetime")
* @var /DateTime
*/
    protected $inserted;

    /**
     * Grade constructor.
     * @param int $id
     * @param int $act_id
     * @param int $par_id
     * @param int $cri_id
     * @param int $stg_id
     * @param int $graded_id
     * @param float $value
     * @param string $comment
     * @param \DateTime $inserted
     */
    public function __construct($id=0, $act_id=0, $par_id=0, $cri_id=0, $stg_id=2, $graded_id=0, $value=0.0, $comment='',$inserted=null)
    {
        parent::__construct($id,new \DateTime());
        $this->act_id = $act_id;
        $this->par_id = $par_id;
        $this->cri_id = $cri_id;
        $this->stg_id = $stg_id;
        $this->graded_id = $graded_id;
        $this->value = $value;
        $this->comment = $comment;
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
     * @return int
     */
    public function getParId()
    {
        return $this->par_id;
    }

    /**
     * @return int
     */
    public function getCriId()
    {
        return $this->cri_id;
    }

    /**
     * @return int
     */
    public function getStgId()
    {
        return $this->stg_id;
    }

    /**
     * @return int
     */
    public function getGradedId()
    {
        return $this->graded_id;
    }

    /**
     * @param int $graded_id
     */
    public function setGradedId($graded_id)
    {
        $this->graded_id = $graded_id;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param int $act_id
     */
    public function setActId($act_id)
    {
        $this->act_id = $act_id;
    }

    /**
     * @param int $par_id
     */
    public function setParId($par_id)
    {
        $this->par_id = $par_id;
    }

    /**
     * @param int $cri_id
     */
    public function setCriId($cri_id)
    {
        $this->cri_id = $cri_id;
    }

    /**
     * @param int $stg_id
     */
    public function setStgId($stg_id)
    {
        $this->stg_id = $stg_id;
    }




}