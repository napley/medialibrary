<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="bluray")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlurayRepository")
 */
class Bluray extends Movie
{
    
}

