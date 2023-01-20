<?php

/**
 * Class BaseController
 *
 * Todo: separate web and api controllers base
 */
class BaseController
{
    /**
     * the data
     * @var array
     */
    protected $data = [];

    // Todo: create constuctor and define $this->user based on authenticated user

    /**
     * loads the header, page, footer
     * Todo: extend class to accept render_partial() method that will help to include multiple pages
     *
     * @param string $file
     */
    protected function render(string $file)
    {
        extract($this->data);

        include 'pages/header.php';

        include 'pages/' . $file . '.php';

        include 'pages/footer.php';
    }

    /**
     * @param array|null $data
     * @param int $status
     */
    protected function send_api_success(array $data = null, $status = 200): void
    {
        header("HTTP/1.1 " . $status);

        if (!empty($data)) {
            echo json_encode($data);
        }
        exit;
    }


    /**
     * @param array|null $data
     * @param int $status
     */
    protected function send_api_error(array $data = null, $status = 402): void
    {
        header("HTTP/1.1 " . $status);

        if (!empty($data)) {
            echo json_encode($data);
        }

        exit;
    }

}