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
class User extends DbObject implements \Symfony\Component\Security\Core\User\UserInterface
{

    /**
     * @Id()
     * @GeneratedValue()
     * @Column(name="usr_id", type="integer", nullable=false)
     * @var int
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
     * @Column(name="usr_birthdate", type="datetime")
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * @Column(name="usr_email", type="string", nullable=true)
     * @var string
     */
    protected $email;
    /**
     * @Column(name="usr_password", type="string")
     * @var string
     */
    protected $password;
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
     * @Column(name="usr_inserted", type="datetime")
     * @var /DateTime
     */
    protected $inserted;

    /**
     * @Column(name="usr_deleted", type="datetime")
     * @var /DateTime
     */
    protected $deleted;

    /**
     * User constructor.
     * @param int $id
     * @param string $firstname
     * @param string $lastname
     * @param string $username
     * @param string $birthdate
     * @param string $email
     * @param string $password
     * @param string $picture
     * @param string $token
     * @param int $rol_id
     * @param int $pos_id
     * @param /DateTime $inserted
     * @param /DateTime $deleted
     */
    public function __construct($id =0, $firstname='', $lastname='', $username='', $birthdate=null, $email='', $password='', $picture='', $token='', $rol_id=2, $pos_id=1, $inserted=null, $deleted=null)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->password = $password;
        $this->picture = $picture;
        $this->token = $token;
        $this->rol_id = $rol_id;
        $this->pos_id = $pos_id;
        parent::__construct($id,new \DateTime());
        $this->pos_id = $pos_id;
        $this->deleted = $deleted;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @param /DateTime $inserted
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
        return $this->email;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->email = $username;
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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
            'username' => $this->email,
            'inserted' => $this->inserted
        ];
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array('USER');
    }

    public function getSalt() {
        
    }

    //Creation of external getters and setters to call the method when setting activity parameters in a User form
    public function setPositionName($posname){
        $position = new Position();
        $position->setName($posname);
    }

    public function getPositionName(){
        $position = new Position();
        return $position->getName();
    }

    public function setPositionWeight($weight){
        $position = new Position();
        $position->setWeightIni($weight);
    }

    public function getPositionWeight(){
        $position = new Position();
        return $position->getWeightIni();
    }

}

