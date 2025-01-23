<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Entities;

interface CourseRepository {
    public function save(Course $course) : bool;
    public function remove(int $courseId) : bool;
    public function findAll() : array;
    public function findById(int $courseId) : ?Course;
}