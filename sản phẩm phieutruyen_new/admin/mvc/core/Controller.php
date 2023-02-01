<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * Gọi model.
     * @param $model
     */
    public function model($model)
    {
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    /**
     * Gọi view.
     * @param $view
     * @param array $data
     */
    public function view($view, $data=[])
    {
        require_once "./mvc/views/".$view.".php";
    }

    /**
     * Add error message
     * @param $message
     */
    public function addErrorMessage($message)
    {
        $_SESSION['error'] = $message;
    }

    /**
     * Add success message.
     * @param $message
     */
    public function addSuccessMessage($message)
    {
        $_SESSION['success'] = $message;
    }

    /**
     * Remove message.
     */
    public function removeMessage()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }

    /**
     * Redirect to $url
     * If $url = null, redirect to referer page.
     * @param null $url
     * @return mixed
     */
    public function redirect($url = null)
    {
        if (!empty($url)) {
            header('Location: ' . $url);
        } else {
           header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * Get category.
     * @return mixed
     */
    function getCategory()
    {
        $cateModel = $this->model("TagModel");
        return $cateModel->getList();
    }
}
