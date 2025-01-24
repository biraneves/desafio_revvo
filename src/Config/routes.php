<?php

declare(strict_types=1);

use Biraneves\Revvo\Controllers\{
    CourseListController,
    CourseFormController,
};

return [
    'GET|/' => CourseListController::class,
    'GET|/new-course' => CourseFormController::class,
];