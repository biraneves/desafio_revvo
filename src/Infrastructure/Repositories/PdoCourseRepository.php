<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Infrastructure\Repositories;

use Biraneves\Revvo\Entities\Course;
use PDO;

/**
 * Clas PdoCourseRepository
 * 
 * Implements the CourseRepository interface using a PDO connection to manage Course entities.
 * 
 * @package Biraneves\Revvo\Infrastructure\Repositories
 */
class PdoCourseRepository implements CourseRepository {

    /**
     * PdoCourseRepository constructor
     * 
     * @param PDO $pdo PDO connection to use for database interactions.
     */
    public function __construct(private PDO $pdo) {}

    /**
     * Saves a course to the repository. It decides whether to insert or update
     * the course based on its ID.
     * 
     * @param Course $course The course to save.
     * @return bool True on success, false on failure.
     */
    public function save(Course $course) : bool {
        if ($course->getId() === null) {
            return $this->insert($course);
        } else {
            return $this->update($course);
        }
    }

    /**
     * Inserts a new course into the repository. Called by the public save method.
     * 
     * @param Course $course Course to insert.
     * @return bool True on success, false on failure.
     */
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

    /**
     * Updates an existing course in the repository. Called by the public save method.
     * 
     * @param Course $course Course to update.
     * @return bool True on success, false on failure.
     */
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

    /**
     * Removes a course from the repository by its ID.
     * 
     * @param int $courseId The ID of the course to remove.
     * @return bool True on success, false on failure.
     */
    public function remove(int $courseId) : bool {
        $sql = 'DELETE FROM courses WHERE id = :id;';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $courseId, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * Finds and returns all courses in the repository.
     * 
     * @return Course[] An array of Course objects.
     */
    public function findAll() : array {
        $sql = 'SELECT * FROM courses;';
        $courseList = $this->pdo->query($sql)->fetchAll();
        $courseArray = array_map($this->hydrateCourse(...), $courseList);

        return $courseArray;
    }

    /**
     * Finds a course in the repository by its ID.
     * 
     * @param int $courseId The ID of the course to find.
     * @return Course|null The found course, or null if no course was found with the given ID.
     */
    public function findById(int $courseId) : ?Course {
        $sql = 'SELECT * FROM courses WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $courseId, PDO::PARAM_INT);
        $statement->execute();

        $courseData = $statement->fetch();

        return $courseData ? $this->hydrateCourse($courseData) : null;
    }

    private function hydrateCourse(array $courseData) : Course {
        return new Course(
            $courseData['title'],
            $courseData['description'],
            $courseData['link_slideshow'],
            $courseData['image'],
            (int) $courseData['id'],
        );
    }

}