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
    public function base_convert($inputNumber = null, $inputBase = 10, $outputBase = 16)
    {
        $number = base_convert($inputNumber, $inputBase, $outputBase) ?: '';

        return $this->response->json($number);
    }

    /**
     * Square Root
     *
     * @return string
     */
    public function sqrt($inputNumber = 0)
    {
        $inputNumber = is_numeric($inputNumber) ? $inputNumber : 0;

        return $this->response->json(sqrt($inputNumber));
    }
}
