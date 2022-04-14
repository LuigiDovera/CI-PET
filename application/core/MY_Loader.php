<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{
    public function admTemplate($path, $dados = array())
    {
        $this->view("html_header.php");
        $this->view($path, $dados);
        $this->view("html_footer.php");
    }

    public function standardTemplate($path, $dados = array())
    {
        $this->view("html_header.php");
        $this->view("navbar.php");
        $this->view($path, $dados);
        $this->view("html_footer.php");
    }
}