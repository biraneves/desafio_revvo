<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Controllers;

use Biraneves\Revvo\Entities\Course;
use Biraneves\Revvo\Infrastructure\Repositories\CourseRepository;
use DateTimeImmutable;

class NewCourseController implements Controller {

    public function __construct(private CourseRepository $courseRepository) {}

    public function processRequest() : void {
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $image = filter_input(INPUT_POST, 'image', FILTER_VALIDATE_URL);
        $linkSlideshow = filter_input(INPUT_POST, 'link_slideshow', FILTER_VALIDATE_URL);

        if ($title === false || $description === false || $image === false || $linkSlideshow === false) {
            header('Location: /?success=0');
            exit();
        }

        if ($this->courseRepository->save(
                new Course($title, $description, $linkSlideshow, $image, new DateTimeImmutable(date('Y-m-d')))
                ) === false) {
            header('Location: /?success=0');
        } else {
            header('Location: /?success=1');
        }
    } 

}