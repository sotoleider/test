<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Login Form -->
    <div class="fadeIn first">
      <br><br>Sistema de procesos <br><br>
    </div>
    <?= $this->Form->create('usuario/login', ['url' => ['action' => '/login']]) ?>
      <?= $this->Form->input('email',['class'=>'fadeIn second',"label"=>false,"placeholder"=>"Email"]) ?>
      <?= $this->Form->input('contraseña',['class'=>'fadeIn third',"label"=>false,"placeholder"=>"Contraseña"]) ?>
      <?= $this->Form->button(__('Iniciar sesión'),['class'=>'fadeIn fourth form_button']); ?>
    <?= $this->Form->end() ?>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <!--<a class="underlineHover" href="#">Forgot Password?</a>-->
    </div>

  </div>
</div>
