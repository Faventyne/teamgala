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
    protected $act_prec;
    /**
     * @Column(name="usr_token", type="string")
     * @var string
     */
    protected $token;
}