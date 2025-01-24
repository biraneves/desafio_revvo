<?php

declare(strict_types=1);

use Biraneves\Revvo\Controllers\{
    CourseListController,
    CourseFormController,
    NewCourseController,
};

return [
    'GET|/' => CourseListController::class,
    'GET|/new-course' => CourseFormController::class,
    'POST|/new-course' => NewCourseController::class,
];