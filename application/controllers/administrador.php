<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller{
    public function index()
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $this->load->model("administrador_model");
        $administradores = $this->administrador_model->buscaTodos();
        $dados = array("administradores" => $administradores);

        $this->load->admTemplate("administrador/cadastro_administrador", $dados);
    }

    public function novo()
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $this->form_validation->set_rules("login", "login", "trim|required|min_length[3]|max_length[45]");
        $this->form_validation->set_rules("senha", "senha", "trim|required|min_length[3]|max_length[32]");
        $this->form_validation->set_rules("conf_senha", "conf_senha", "trim|required|matches[senha]");
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();

        if($sucesso)
        {
            $administrador = array(
                "login" => $this->input->post("login"),
                "senha" => md5($this->input->post("senha"))
            );

            $this->load->model("administrador_model");
            $this->administrador_model->salva($administrador);
            $this->session->set_flashdata("done", "Salvo");
            $this->index();
        } 
        else 
        {
            $this->index();
        }

    }
    
    public function mostra($id)
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $this->load->model("administrador_model");
        $administrador = $this->administrador_model->busca($id);
        $dados = array("administrador" => $administrador);
        $this->load->admTemplate("administrador/mostra_administrador", $dados);

    }
    public function atualiza()
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $this->form_validation->set_rules("login", "login", "trim|min_length[3]|max_length[45]");
        $this->form_validation->set_rules("senha", "nova senha", "trim|min_length[3]|max_length[32]");
        $this->form_validation->set_rules("conf_senha", "confirmação da nova senha", "trim|matches[senha]");
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();

        $id = $this->input->post("id");
        if($sucesso)
        {
            $administrador = array(
                "id" => $id,
                "login" => $this->input->post("login"),
                "senha" => md5($this->input->post("senha"))
            );

            $this->load->model("administrador_model");
            $this->administrador_model->atualiza($administrador);
            $this->session->set_flashdata("done", "Atualizado");
            $this->mostra($id);
        }
        else
        {
            $this->mostra($id);
        }
    }

    public function deletar()
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $id = $this->input->post("id");
        $this->load->model("administrador_model");
        $this->administrador_model->deleta($id);
        $this->session->set_flashdata("done", "Deletado");
        $this->index();
    }

    public function sair()
    {
        if (!$this->session->userdata("adm_logado"))
        {
            redirect("/usuario/login");
        }

        $this->load->admTemplate("administrador/home");
    }
}