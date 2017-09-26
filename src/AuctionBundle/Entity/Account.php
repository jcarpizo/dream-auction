<?php

namespace AuctionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity(repositoryClass="AuctionBundle\Repository\AccountRepository")
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="account_type", type="string")
 * @ORM\DiscriminatorMap({"admin" = "Admin", "user" = "User"})
 *
 */
abstract class Account implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="cloudstaff_email", type="string", length=255, unique=true)
     */
    private $cloudstaffEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="office_location", type="string", length=255)
     */
    private $officeLocation;

    /**
     * @var int
     *
     * @ORM\Column(name="dreamcard_no", type="bigint", unique=true)
     */
    private $dreamcardNo;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_no", type="string", length=255)
     */
    private $contactNo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set cloudstaffEmail
     *
     * @param string $cloudstaffEmail
     *
     * @return Account
     */
    public function setCloudstaffEmail($cloudstaffEmail)
    {
        $this->cloudstaffEmail = $cloudstaffEmail;

        return $this;
    }

    /**
     * Get cloudstaffEmail
     *
     * @return string
     */
    public function getCloudstaffEmail()
    {
        return $this->cloudstaffEmail;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return Account
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set officeLocation
     *
     * @param string $officeLocation
     *
     * @return Account
     */
    public function setOfficeLocation($officeLocation)
    {
        $this->officeLocation = $officeLocation;

        return $this;
    }

    /**
     * Get officeLocation
     *
     * @return string
     */
    public function getOfficeLocation()
    {
        return $this->officeLocation;
    }

    /**
     * Set dreamcardNo
     *
     * @param integer $dreamcardNo
     *
     * @return Account
     */
    public function setDreamcardNo($dreamcardNo)
    {
        $this->dreamcardNo = $dreamcardNo;

        return $this;
    }

    /**
     * Get dreamcardNo
     *
     * @return int
     */
    public function getDreamcardNo()
    {
        return $this->dreamcardNo;
    }

    /**
     * Set contactNo
     *
     * @param string $contactNo
     *
     * @return Account
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;

        return $this;
    }

    /**
     * Get contactNo
     *
     * @return string
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }

    public function getRoles()
    {
        return [];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
