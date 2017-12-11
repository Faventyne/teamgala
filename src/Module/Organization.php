<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:38
 */

namespace Model;

/**
 * @Entity @Table(name="organization")
 */
class Organization extends DbObject
{
    /**
     * @Column(name="org_legalname", type="string")
     * @var string
     */
    // TODO : rename propertie org_lname to org_legalname, create org_commname
    protected $legalname;
    /**
     * @Column(name="org_commname", type="string")
     * @var string
     */
    protected $commname;
    // TODO : rename property, create enum for weight_type
    /**
     * @Column(name="org_weight_type", type="string")
     * @var string
     */
    protected $weight_type;

    /**
     * Organization constructor.
     * @param string $legalname
     * @param string $commname
     * @param string $weight_type
     */
    public function __construct($id=0, $legalname='', $commname='', $weight_type=0, $inserted='')
    {
        $this->legalname = $legalname;
        $this->commname = $commname;
        $this->weight_type = $weight_type;
        parent::__construct($id,$inserted);
    }

}