<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 04/12/2017
 * Time: 23:29
 */

namespace Model;

//use Classes\Exceptions\InvalidSqlQueryException;

abstract class DbObject
{

    /**
     * 
     * @Id()
     * @GeneratedValue()
     * @Column(name="id", type="integer") @GeneratedValue
     * @var int
     */
    protected $id;


    /**
     * @Column(name="inserted", type="datetime")
     * @var string
     */
    protected $inserted;

    public function __construct($id = 0, $inserted = '')
    {
        $this->id = $id;
        $this->inserted = $inserted;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * @param int $id
     */
    /*
    public function setId(int $id)
    {
        $this->id = $id;
    }
    */

    public function getInserted()
    {
        return $this->inserted;
    }

   

}