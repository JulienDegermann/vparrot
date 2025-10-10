<?php

namespace App\Domaine\Contact\Entity;

use App\Application\Traits\CreatedUpdatedTrait;
use App\Domaine\UserManagement\Entity\User;
use DateTimeImmutable;

final class Message
{
    use CreatedUpdatedTrait;

    public function __construct(
        ?int $id = null
    ) {
        $this->id = $id ?? null;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    /**
     * @var ?int $id message's id
     */

    private ?int $id = null;

    /**
     * @var User $user user who wrote message
     */
    private User $author;

    /**
     * @var string $content
     */
    private string $content;

    /**
     * @param User $user author of the message
     * @return static
     */
    public function setAuthor(User $author): static
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @var string $status status of message
     */
    private string $status = "";


    /**
     * @return ?int $id message's id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param string $content text written by User
     */
    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string $content text written by User
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $status message's status
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string $status message's status
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
