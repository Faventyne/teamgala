<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:41
 */

namespace Model;

/**
 * @Entity @Table(name="grade")
 */
class Grade extends DbObject
{
    /**
     * @Column(name="activity_act_id", length=10, type="integer")
     * @var int
     */
    protected $act_id;
    /**
     * @Column(name="participant_par_id", length=10, type="integer")
     * @var int
     */
    protected $par_id;
    /**
     * @Column(name="criterion_cri_id", length=10, type="integer")
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
     * @Column(name="grd_value", length= 10, type="string")
     * @var string
     */
    protected $comment;

    /**
     * Grade constructor.
     * @param int $act_id
     * @param int $par_id
     * @param int $cri_id
     * @param int $stg_id
     * @param int $graded_id
     * @param float $value
     * @param string $comment
     */
    public function __construct($id, $act_id, $par_id, $cri_id, $stg_id, $graded_id, $value, $comment, $inserted)
    {
        $this->act_id = $act_id;
        $this->par_id = $par_id;
        $this->cri_id = $cri_id;
        $this->stg_id = $stg_id;
        $this->graded_id = $graded_id;
        $this->value = $value;
        $this->comment = $comment;
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



}