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
     * @Id @Column(name="id", type="integer") @GeneratedValue
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
        /*
        if (is_numeric($inserted)) {
            $this->inserted = $inserted;
        } else {
            $this->inserted = strtotime($inserted);
        }*/
    }

    /**
     * @return int
     */
    public function getId(): int
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

    /**
     * @param \DateTime $inserted
     */
    public function setInserted(\DateTime $inserted)
    {
        $this->inserted = $inserted;
    }



}