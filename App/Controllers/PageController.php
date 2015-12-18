<?php

namespace App\Controllers;

use Support\BaseConverter;
use Support\Controller;

class PageController extends Controller
{
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

        $bc = new BaseConverter($inputNumber, $inputBase, $outputBase);

        header('Content-Type: application/json');
        echo json_encode($bc->convertToUpper());
        die;
    }
}
