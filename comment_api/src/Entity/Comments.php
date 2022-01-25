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
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    public string $comment;

    /**
     * @ORM\Column(type="array", length=300)
     */
    public array $replies;

    /**
     * @ORM\Column(type="integer")
     */
    public ?int $rate;


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
        return implode(';', $this->replies);
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setComment(string $comment): ?string
    {
        return $this->comment = $comment;
    }

    public function setReplies(array $replies): ?array
    {
        return $this->replies = $replies;
    }

    public function setRate(int $rate): ?int
    {
        return $this->rate = $rate;
    }

    public function __toString()
    {
        return $this->comment . ' ' . implode(';',$this->replies) . $this->rate;
    }
}