<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proceso $proceso
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Procesos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="procesos form large-10 medium-8 columns content">
    <?= $this->Form->create($proceso) ?>
    <fieldset>
        <legend><?= __('Add Proceso') ?></legend>
		<?php  $csrfToken = str_replace('"',"",json_encode($this->request->getParam('_csrfToken'))); ?>     
		<?php        
            echo "<input value='$csrfToken' id='csrfToken' type='hidden' >";
			echo $this->Form->control('descripcion');
			echo '<div class="input text required">';
			echo'<label for="departamento-id">Departamento</label>';
			echo'<select name="departamento-id" id="departamento-id" required="required">';
			echo'<option value="">Seleccionar</option>';
			foreach ($departamento as $row) {
			   echo'<option value="'.$row->id.'">'.utf8_decode($row->nombre_dpto).'</option>';
             }	
			echo'</select>';
			echo"</div>";	
			echo '<div class="input text required" style="display:none" id="capa-municipio">';
			echo'<label for="municipio_id">Municipio</label>';
			echo'<select name="municipio_id" id="municipio_id" required="required">';
			echo'</select>';
			echo"</div>";	
		?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
