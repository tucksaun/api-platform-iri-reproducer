<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Options
{
    #[ORM\Column(type: 'boolean')]
    public bool $notify = false;
}
