<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Controllers;

use Biraneves\Revvo\Infrastructure\Repositories\CourseRepository;

class CourseListController implements Controller {

    public function __construct(private CourseRepository $courseRepository) {}

    public function processRequest(): void {
        $courseList = $this->courseRepository->findAll();
        require_once __DIR__ . '/../views/course-list.php';
    }

}