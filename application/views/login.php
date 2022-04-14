<div class = "conteiner">
    <?php if($this->session->flashdata("danger")) : ?>
        <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
    <?php endif ?>
    <h1>Login</h1>
    <?php
        echo form_open("usuario/login");
            echo form_label("Login", "login");
            echo form_input(array(
                "name" => "login",
                "id" => "login",
                "maxlength" => "45",
                "class" => "form-texto"
            ));
            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "maxlength" => "32",
                "class" => "form-texto"
            ));
            echo form_button(array(
                "class" => "botao",
                "content" => "Login",
                "type" => "submit"
            ));
        echo form_close();
    ?>
    <?= anchor("/", "Voltar", array("class" => "btn btn-primary"))?>
</div>