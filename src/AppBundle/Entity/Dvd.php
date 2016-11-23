<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="dvd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DvdRepository")
 */
class Dvd extends Movie
{
    
}

