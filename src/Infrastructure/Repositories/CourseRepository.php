<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Infrastructure\Repositories;

use Biraneves\Revvo\Entities\Course;

/**
 * Interface CourseRepository
 * 
 * Defines the contract for a repository that manages Course entities.
 * 
 * @package Biraneves\Revvo\Infrastructure\Repositories
 */
interface CourseRepository {
    
    /**
     * Saves a course to the repository
     * 
     * @param Course $course Course to save.
     * @return bool True on success, false on failure.
     */
    public function save(Course $course) : bool;

    /**
     * Removes a course from the repository by its ID.
     * 
     * @param int $courseId ID of the course to remove.
     * @return bool True on success, false on failure.
     */
    public function remove(int $courseId) : bool;

    /**
     * Finds and returns all courses in the repository.
     * 
     * @return Course[] Array of Course objects.
     */
    public function findAll() : array;

    /**
     * Finds a course in the repository by its ID.
     * 
     * @param int $courseId Id of the course to find.
     * @return Course|null The found course, or null if no course was found.
     */
    public function findById(int $courseId) : ?Course;

}