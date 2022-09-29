<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(mercure: true)]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Greeting
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    #[ORM\Embedded(class: Options::class)]
    #[ApiProperty(
        jsonldContext: [
            '@id' => 'https://yourcustomid.com',
        ]
    )]
    public Options $options;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ApiProperty(
        iris: ['foo'],
        jsonldContext: [
            '@id' => 'https://yourcustomid.biz',
        ]
    )]
    public ValueObject $foo;

    public function __construct()
    {
        $this->options = new Options();
    }

    #[ORM\PostLoad]
    public function postLoad()
    {
        $this->foo = new ValueObject();
    }
}
