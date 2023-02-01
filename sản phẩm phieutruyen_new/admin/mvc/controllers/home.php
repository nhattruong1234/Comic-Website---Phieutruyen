<?php

/**
 * Class Home
 */
class Home extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $this->view('index',
            [
                'page'          => 'Home-AD',
                'title'         => 'Trang chủ',
                'category'      => $this->getCategory()
            ]
        );
    }
}
