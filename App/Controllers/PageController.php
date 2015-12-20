<?php

namespace App\Controllers;

use Support\Controller;

class PageController extends Controller
{
    /**
     * The base converter page.
     *
     * @return view
     */
    public function base_converter()
    {
        return $this->view->make('page/base_converter');
    }
}
