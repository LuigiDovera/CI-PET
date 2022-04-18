<div class="container">

    <?php if($this->session->flashdata("done")): ?>
        <p class="alert alert-success"><?= $this->session->flashdata("done") ?></p>
    <?php endif ?> 

    <h1>Administradores</h1>
    <table class="table">
        <?php foreach($administradores as $administrador): ?>
            <tr>
                <td><?= anchor("administrador/mostra/{$administrador['id']}") ?></td>
                <td><?= $administrador["login"] ?></td>
                <td><?php 
                        echo form_open("administrador/deleta");
                            echo form_hidden("id", $administrador["id"]);
                            echo form_button(array(
                                "class" => "btn btn-primary",
                                "content" => "Deletar",
                                "type" => "submit"
                            ));
                        echo form_close();
                    ?>
                </td>   
            </tr>
        <?php endforeach ?>
    </table>

    <?php
        echo form_open("administrador/novo");

            echo form_label("Login", "login");
            echo form_input(array(
                "name" => "login",
                "id" => "login",
                "maxlength" => "45",
                "class" => "form-control",
                "value" => set_value("login", "")
            ));
            echo form_error("login");

            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "maxlength" => "32",
                "class" => "form-control"
            ));
            echo form_error("senha");

            echo form_label("Confirmação de senha", "conf_senha");
            echo form_password(array(
                "name" => "conf_senha",
                "id" => "conf_senha",
                "maxlength" => "32",
                "class" => "form-control"
            ));
            echo form_error("conf_senha");

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Cadastrar",
                "type" => "submit"
            ));
        echo form_close();
    ?>
    <?= anchor("administrador/sair", "Voltar", array("class" => "btn btn-primary"))?>
</div>

