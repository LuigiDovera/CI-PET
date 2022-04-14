<div class="container">
    <?php if($this->session->flashdata("done")):?>
        <p class="alert alert-success"><?= $this->session->flashdata("done")?></p>
    <?php endif ?>

    <h1>Informações do administrador</h1>
    <?php
        echo form_open("administrador/atualiza");

            echo form_label("Login", "login");
            echo form_input(array(
                "name" => "login",
                "id" => "login",
                "maxlength" => "100",
                "class" => "form-control",
                "value" => set_value("login", "{$administrador['login']}")
            ));
            echo form_error("login");

            echo form_label("Nova senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "maxlength" => "100",
                "class" => "form-control"
            ));
            echo form_error("senha");

            echo form_label("Confirmação de nova senha", "conf_senha");
            echo form_password(array(
                "name" => "conf_senha",
                "id" => "conf_senha",
                "maxlength" => "100",
                "class" => "form-control"
            ));
            echo form_error("conf_senha");

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Atualizar",
                "type" => "submit"
            ));
        echo form_close();
    ?>

    <?= anchor("administrador/index", "Voltar", array("class" => "btn btn-primary"))?>

</div>

 
