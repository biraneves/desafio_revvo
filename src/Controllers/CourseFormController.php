<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Controllers;

use Biraneves\Revvo\Infrastructure\Repositories\CourseRepository;

class CourseFormController implements Controller {

    public function __construct(private CourseRepository $courseRepository) {}

    public function processRequest() : void {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $course = null;

        if ($id !== false && $id !== null) {
            $video = $this->courseRepository->findById($id);
        }

        require_once __DIR__ . '/../Views/course-form.php';
    }

}