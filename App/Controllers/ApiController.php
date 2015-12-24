<?php

namespace App\Controllers;

use App\BaseConverter;
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
        $number = base_convert($inputNumber, $inputBase, $outputBase) ?: '';

        return $this->response->json($number);
    }
}
