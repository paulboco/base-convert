<?php

namespace Support;

class Controller
{
    /**
     * The view instance.
     *
     * @var View
     */
    protected $view;

    /**
     * The request instance.
     *
     * @var View
     */
    protected $request;

    /**
     * The response instance.
     *
     * @var View
     */
    protected $response;

    /**
     * Create a new controller.
     */
    function __construct(View $view, Request $request, Response $response)
    {
        $this->view = $view;
        $this->request = $request;
        $this->response = $response;

        $this->shareWithView();
    }

    /**
     * Share variables with the view.
     *
     * @return void
     */
    private function shareWithView()
    {
        $this->view->share(array(
            'current_uri' => implode('/', $this->request->segment() ?: array()),
        ));
    }
}
