<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Entities;

use InvalidArgumentException;

class Course {

    public readonly ?int $id;

    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $linkSlideshow,
        public readonly string $image,
        ?int $id = null,
    ) {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setLinkSlideshow($linkSlideshow);
        $this->setImage($image);
        $this->id = $id;
    }

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


}