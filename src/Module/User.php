<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 04/12/2017
 * Time: 23:28
 */
namespace Model;

/**
 * @Entity @Table(name="user")
 */
class User extends DbObject
{

    /**
     * @Column(name="usr_firstname", type="string")
     * @var string
     */
    protected $firstname;
    /**
     * @Column(name="usr_lastname", type="string")
     * @var string
     */
    protected $lastname;
    /**
     * @Column(name="usr_username", type="string")
     * @var string
     */

    protected $username;

    /**
     * @Column(name="usr_birthdate", type="datetime")
     * @var string
     */
    protected $birthdate;

    /**
     * @Column(name="usr_mail", type="string", nullable=true)
     * @var string
     */
    protected $mail;
    /**
     * @Column(name="usr_picture", type="string")
     * @var string
     */
    protected $picture;
    /**
     * @Column(name="usr_token", type="string")
     * @var string
     */
    protected $token;

}