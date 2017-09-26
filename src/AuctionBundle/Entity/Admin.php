<?php

namespace AuctionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Admin
 *
 * @ORM\Entity
 *
 */
class Admin extends Account
{
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
}