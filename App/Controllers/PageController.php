<?php

namespace App\Controllers;

use Support\BaseConverter;
use Support\Controller;

class PageController extends Controller
{
    /**
     * The base convert input page.
     */
    public function converter()
    {
        return $this->view->make('page/converter');
    }

    /**
     * Get the converted number.
     *
     * @return string
     */
    public function convert()
    {
        $bc = new BaseConverter();
        $bc->setInputNumber(isset($_REQUEST['input-number']) ? $_REQUEST['input-number'] : '');
        $bc->setInputBase(isset($_REQUEST['input-base']) ? $_REQUEST['input-base'] : '');
        $bc->setOutputBase(isset($_REQUEST['output-base']) ? $_REQUEST['output-base'] : '');

        header('Content-Type: application/json');
        echo json_encode($bc->convertToUpper());
        die;
    }
}
