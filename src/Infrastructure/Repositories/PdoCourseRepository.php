<?php

declare(strict_types=1);

namespace Biranves\Revvo\Infrastructure\Repositories;

use Biraneves\Revvo\Entities\Course;
use Biraneves\Revvo\Entities\CourseRepository;
use PDO;

class PdoCourseRepository implements CourseRepository {

    public function __construct(private PDO $pdo) {}

    public function save(Course $course) : bool {
        if ($course->getId() === null) {
            return $this->insert($course);
        } else {
            return $this->update($course);
        }
    }

    private function insert(Course $course) : bool {
        $sql = '
            INSERT INTO courses (title, description, image, link_slideshow)
            VALUES (:title, :description, :image, :linkSlideshow);
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':title', $course->title);
        $statement->bindValue(':description', $course->description);
        $statement->bindValue(':image', $course->image);
        $statement->bindValue(':linkSlideshow', $course->linkSlideshow);

        $success = $statement->execute();

        if ($success) {
            $course->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    private function update(Course $course) : bool {
        $sql = '
            UPDATE
                courses
            SET
                title = :title,
                description = :description,
                image = :image,
                link_slideshow = :linkSlideshow
            WHERE
                id = :id;
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $course->getId(), PDO::PARAM_INT);
        $statement->bindValue(':title', $course->title);
        $statement->bindValue(':description', $course->description);
        $statement->bindValue(':image', $course->image);
        $statement->bindValue(':linkSlideshow', $course->linkSlideshow);

        return $statement->execute();
    }

}