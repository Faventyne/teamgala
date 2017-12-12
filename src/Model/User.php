<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 04/12/2017
 * Time: 23:28
 */
namespace Model;

/**
 * @Entity()
 * @Table(name="user")
 */
class User extends DbObject
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(name="usr_id", type="string", nullable=false)
     * @var string
     */
    protected $id;
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
     *@Column(name="usr_is_manager", type="boolean")
     * @var type bool
     */
    protected $is_manager ;
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

    /**
     * User constructor.
     * @param string $id
     * @param string $firstname
     * @param string $lastname
     * @param string $username
     * @param bool $is_manager
     * @param string $birthdate
     * @param string $mail
     * @param string $picture
     * @param string $token
     */
    public function __construct($id =0, $firstname='', $lastname='', $username='', $is_manager=false, $birthdate='', $mail='', $picture='', $token='', $inserted='')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->is_manager = $is_manager;
        $this->birthdate = $birthdate;
        $this->mail = $mail;
        $this->picture = $picture;
        $this->token = $token;
        parent::__construct($id,$inserted);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInserted()
    {
        return $this->inserted;
    }

    /**
     * @param string $inserted
     */
    public function setInserted($inserted)
    {
        $this->inserted = $inserted;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @return bool
     */
    public function getIsManager()
    {
        return $this->is_manager ;
    }
    /**
     * @param bool
     */
    public function setIsManager($is_manager)
    {
        $this->is_manager = $is_manager ;
    }
    /**
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }





}

