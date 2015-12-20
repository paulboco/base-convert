<?php

namespace App\Controllers;

use Support\BaseConverter;
use Support\Controller;

class ApiController extends Controller
{
    /**
     * Base converter
     *
     * @return string
     */
    public function base_converter($inputNumber = null, $inputBase = 10, $outputBase = 16)
    {
        $bc = new BaseConverter($inputNumber, $inputBase, $outputBase);

        return $this->response->json($bc->convertToUpper());
    }
}
