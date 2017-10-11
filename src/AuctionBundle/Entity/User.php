<?php

namespace AuctionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity
 */
class User extends Account
{
    public function getRoles()
    {
        return array('ROLE_USER');
    }
}