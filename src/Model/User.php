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
     * @Column(name="usr_birthdate", type="string")
     * @var string
     */
    protected $birthdate;

    /**
     * @Column(name="usr_email", type="string", nullable=true)
     * @var string
     */
    protected $email;
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
     * @Column(name="role_rol_id", type="integer")
     * @var int
     */
    protected $rol_id;

    /**
     * @Column(name="position_pos_id", type="integer")
     * @var int
     */
    protected $pos_id;


    /**
     * @Column(name="usr_inserted", type="string")
     * @var string
     */
    protected $inserted;

    /**
     * User constructor.
     * @param string $id
     * @param string $firstname
     * @param string $lastname
     * @param string $username
     * @param bool $is_manager
     * @param string $birthdate
     * @param string $email
     * @param string $picture
     * @param string $token
     * @param int $rol_id
     * @param int $pos_id
     * @param string $inserted
     */
    public function __construct($id =0, $firstname='', $lastname='', $username='', $birthdate='', $email='', $picture='', $token='', $rol_id=2, $pos_id=1, $inserted='')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->picture = $picture;
        $this->token = $token;
        $this->rol_id = $rol_id;
        $this->pos_id = $pos_id;
        parent::__construct($id,$inserted);
    }
    /*
    /**
     * @return int
     */
    /*
    public function getId()
    {
        return $this->id;
    }
    */

    /*
    /**
     * @return string
     */
    /*
    public function getInserted()
    {
        return $this->inserted;
    }
    */

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $mail
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->email
        ];
    }



}

