<?php

namespace App\Controllers;

use Support\Controller;

class PageController extends Controller
{
    /**
     * The base home page.
     *
     * @return view
     */
    public function home()
    {
        return $this->view->make('page/home');
    }

    /**
     * The base converter page.
     *
     * @return view
     */
    public function base_convert()
    {
        return $this->view->make('page/base_convert');
    }

    /**
     * The square root page.
     *
     * @return view
     */
    public function sqrt()
    {
        return $this->view->make('page/sqrt');
    }
}
