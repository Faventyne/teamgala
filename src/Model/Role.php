<?php

namespace Model ;

/**
 * @Entity()
 * @Table(name="role")
 */
class Role extends DbObject
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(name="rol_id", type="integer", nullable=false, length=10)
     * @var type int
     */
    protected $id ;
    
    /**
     *@Column(name="rol_name", type="string", nullable=false, length=10)
     * @var type string
     */
    protected $name ;
    
    public function __construct($id = 0, $inserted = '', $name='') {
        parent::__construct($id, $inserted);
        $this->name = $name;
    }
    
    /* GETTERS */
    
    /**
     * 
     * @return int
     */
    public function getId() 
    {
        return $this->id;
    }
    
    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /* SETTERS */
    
    /**
     * 
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
