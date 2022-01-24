<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="comments")
 * @ApiResource()
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length=300)
     * @Assert\NotBlank()
     */
    public string $comment;

    /**
     * @ORM\Column(length=300)
     */
    public string $replies;


    /******** METHODS ********/
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getReplies(): ?string
    {
        return $this->replies;
    }

    public function __toString()
    {
        return $this->comment . ' ' . $this->replies;
    }
}