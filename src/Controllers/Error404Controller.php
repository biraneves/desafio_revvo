<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Controllers;

class Error404Controller implements Controller {

    public function processRequest() : void {
        http_response_code(404);
    }

}