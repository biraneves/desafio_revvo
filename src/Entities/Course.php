<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;

/**
 * Class Course
 * 
 * Represents a course entity with title, description, slideshow link,
 * imagem, and an optional ID.
 * 
 * @package Biraneves\Revvo\Entities
 */
class Course {

    public readonly string $title;
    public readonly string $description;
    public readonly string $linkSlideshow;
    public readonly string $image;
    public readonly DateTimeInterface $createdAt;
    
    /**
     * Course constructor
     * 
     * @param string $title Title of the course
     * @param string $description Description of the course
     * @param string $linkSlideshow Link to the course slideshow
     * @param string $image URL to the course image
     * @param DateTimeInterface $createdAt Date the course was created
     * @param int|null $id Optional (during instantiation) ID of the course
     */
    public function __construct(
        string $title,
        string $description,
        string $linkSlideshow,
        string $image,
        DateTimeInterface $createdAt,
        private ?int $id = null,
    ) {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setLinkSlideshow($linkSlideshow);
        $this->setImage($image);
        $this->setCreatedAt($createdAt);
        $this->setId($id);
    }

    /**
     * Get the ID of the course
     * 
     * @return int|null ID of the course, or null if not set
     */
    public function getId() : ?int {
        return $this->id;
    }

    /**
     * Set the ID of the course
     * 
     * @param int $id ID of the course to set
     * @throws InvalidArgumentException if the ID is not a valid integer
     */
    public function setId(?int $id) : void {
        if (empty($id) && !filter_var($id, FILTER_VALIDATE_INT)) {
            $this->id = null;
        }

        $this->id = $id;
    }

    /**
     * Set the title of the course
     * 
     * @param string $title Title of the course to set
     * @throws InvalidArgumentException if the title is empty or does not meet length requirements
     */
    private function setTitle(string $title) : void {
        $title = trim($title);

        if (empty($title)) {
            throw new InvalidArgumentException('Course title cannot be empty');
        }

        if (strlen($title) < 3 || strlen($title) > 255) {
            throw new InvalidArgumentException('Course title must contain between 3 and 255 characters');
        }

        $this->title = $title;
    }

    /**
     * Set the description of the course
     * 
     * @param string $description Description of the course to set
     * @throws InvalidArgumentException if the description is empty or does not meet length requirements
     */
    private function setDescription(string $description) : void {
        $description = trim($description);

        if (empty($description)) {
            throw new InvalidArgumentException('Course description cannot be empty');
        }

        if (strlen($description) < 10 || strlen($description) > 1000) {
            throw new InvalidArgumentException('Course description must contain between 10 and 1000 characters');
        }
        
        $this->description = $description;
    }

    /**
     * Set the slideshow link of the course
     * 
     * @param string $linkSlideshow Link to the course slideshow to set
     * @throws InvalidArgumentException if the link is empty or not a valid URL
     */
    private function setLinkSlideshow(string $linkSlideshow) : void {
        $linkSlideshow = trim($linkSlideshow);

        if (empty($linkSlideshow)) {
            throw new InvalidArgumentException('Course slideshow link cannot be empty');
        }

        if (!filter_var($linkSlideshow, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Course slideshow link must be a valid URL');
        }

        $this->linkSlideshow = $linkSlideshow;
    }

    /**
     * Set the image of the course
     * 
     * @param string $image URL to the course image to set
     * @throws InvalidArgumentException if the image is empty or not a valid URL
     */
    private function setImage(string $image) : void {
        $image = trim($image);

        if (empty($image)) {
            throw new InvalidArgumentException('Course image cannot be empty');
        }

        if (!filter_var($image, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Course image must be a valid URL');
        }

        $this->image = $image;
    }

    /**
     * Set the creation date of the course
     * 
     * @param DateTimeInterface $createdAt Date the course was created.
     * @throws InvalidArgumentException if the creation date is empty
     */
    private function setCreatedAt(DateTimeInterface $createdAt) : void {
        if (empty($createdAt)) {
            throw new InvalidArgumentException('Course creation date cannot be empty');
        }
        
        $this->createdAt = $createdAt;
    }

    /**
     * Check if the course is new.
     * A course will be considered new if it was created in the last 24 hours.
     * 
     * @return bool True if the course is new, false otherwise
     */
    public function isNew() : bool {
        $now = new DateTimeImmutable();
        $interval = $now->diff($this->createdAt);

        return $interval->days <= 1;
    }

}