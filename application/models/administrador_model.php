<?php
class Administrador_model extends CI_Model {

    public function buscaTodos()
    {
        return $this->db->get("administrador")->result_array();
    }

    public function salva($administrador)
    {
        $this->db->insert("administrador", $administrador);
    }

    public function buscaPorLoginESenha($login, $senha)
    {
        $this->db->where("login", $login);
        $this->db->where("senha", $senha);
        return $this->db->get("administrador")->row_array();
    }

    public function busca($id)
    {
        return $this->db->get_where("administrador",
            array(
                "id" => $id
            )
        )->row_array();
    }

    public function atualiza($administrador)
    {
        $this->db->where("id", $administrador["id"]);
        $this->db->update("administrador",
            array(
                "login" => $administrador["login"],
                "senha" => $administrador["senha"],
            )
        );
    }

    public function deleta($id)
    {
        $this->db->delete("administrador", array("id" => $id));
    }
}
?>