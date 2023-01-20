<?php

class IndexController extends BaseController
{

    /**
     * controller entrypoint for url '/'
     */
    public function index()
    {
        $this->data['states'] = States::STATES;

        $this->render('main');
    }
}