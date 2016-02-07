<?php

namespace models\Entities\Access;

/**
 *
 * @Entity
 * @Table(name="user")
 */
class User
{
    public static $salt = 'pl@n0@ul@';

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /**
     * @Column(type="string", length=150, nullable=false)
     */
    public $name = '';

    /**
     * @Column(type="string", length=150, nullable=false)
     */
    public $email = '';

    /**
     * @Column(type="string", length=40, nullable=false)
     */
    public $password = '';

    /**
     * @Column(type="integer", nullable=false)
     */
    public $active = 1;

    /**
     * @ManyToMany(targetEntity="models\Entities\Access\Profile", inversedBy="users", cascade={"all"})
     */
    public $profiles;

    public function __construct()
    {
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
    }

        public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = sha1(self::$salt.$password);
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getProfiles()
    {
        return $this->profiles;
    }

    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;
    }

    public function addProfile(Profile $profile)
    {
        $profile->addUser($this);
        $this->profiles[] = $profile;
    }
}