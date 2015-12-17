<?php

namespace App\Controllers;

use Support\BaseConverter;
use Support\Controller;

class PageController extends Controller
{
    public function test()
    {
        return $this->view->make('page/test');
    }
    /**
     * The base convert input page.
     */
    public function index()
    {
        return $this->view->make('page/index');
    }

    /**
     * Get the converted number.
     *
     * @return string
     */
    public function convert()
    {
        $inputNumber = isset($_REQUEST['input-number']) ? $_REQUEST['input-number'] : '';
        $inputBase = isset($_REQUEST['input-base']) ? $_REQUEST['input-base'] : '';
        $outputBase = isset($_REQUEST['output-base']) ? $_REQUEST['output-base'] : '';

        // if ($this->inputFailsValidation($inputNumber, $inputBase, $outputBase)) {
        //     return 'Input failed validation';
        // }

        $bc = new BaseConverter($inputNumber, $inputBase, $outputBase);

        return $bc->convertToUpper();
    }

    /**
     * Validate input.
     *
     * @param  string  $inputNumber
     * @param  integer  $inputBase
     * @param  integer  $outputBase
     * @return boolean
     */
    private function inputFailsValidation($inputNumber, $inputBase, $outputBase)
    {
        if (is_null($inputNumber) or is_null($inputBase) or is_null($outputBase)) {
            return true;
        }

        if (!$this->inRange($inputBase)) {
            return true;
        }

        if (!$this->inRange($outputBase)) {
            return true;
        }
    }

    /**
     * Check that a base paramter is in range.
     *
     * @param  integer  $base
     * @return boolean
     */
    private function inRange($base)
    {
        return (2 <= $base) && ($base <= 36);
    }
}
