<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{
    
    public function index()
    {
        $this->load->admTemplate("login");
    }

    public function login()
    {
        $this->load->model("administrador_model");
        $login = $this->input->post("login");
        $senha = md5($this->input->post("senha"));

        $administrador = $this->administrador_model->buscaPorLoginESenha($login, $senha);
        if($administrador)
        {
            $this->session->set_userdata("adm_logado", $administrador);
            $this->session->set_flashdata("success", "Logado com sucesso");
            $this->load->admTemplate("administrador/home");
            return NULL;
        }

        $this->session->set_flashdata("danger", "Login ou senha inválidos");
        $this->load->admTemplate("login");
    }

    public function logout()
    {
        if(!$this->session->userdata("adm_logado"))
        {
            redirect("/");
        }
        $this->session->unset_userdata("adm_logado");

        $this->load->admTemplate("login");
    }

}