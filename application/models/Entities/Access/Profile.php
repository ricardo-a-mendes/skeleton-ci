<?php

namespace models\Entities\Access;

/**
 *
 * @Entity
 * @Table(name="profile")
 */
class Profile
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    public $name = '';

    /**
     * @Column(type="string", length=550, nullable=false)
     */
    public $description = '';

    /**
     * @ManyToMany(targetEntity="models\Entities\Access\User", mappedBy="perfis")
     */
    public $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers($users)
    {
        $this->users = $users;
    }

    public function addUser(User $user)
    {
        //$user->addProfile($this);
        $this->users[] = $user;
    }
}