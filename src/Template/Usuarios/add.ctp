<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-10 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Add Usuario') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('contraseña');
      			echo '<div class="input text required">
      			       <label for="contrasena">Vuelve a escribir la contraseña</label>
      				     <input type="text" required="required" maxlength="100" id="contrasena_comf">
      				  </div>';
            echo $this->Form->control('nombres');
            echo $this->Form->control('apellidos');
            $perfil_list = [
                'Solicitante' => 'Solicitante',
                'Aprobador' => 'Aprobador'
            ];
            echo $this->Form->input('perfil', [
                'options' => $perfil_list,
                'default' => 'SL',
                'class' => 'form_combo_box'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
