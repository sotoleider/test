<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proceso $proceso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proceso'), ['action' => 'edit', $proceso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proceso'), ['action' => 'delete', $proceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proceso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Procesos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proceso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="procesos view large-9 medium-8 columns content">
    <h3><?= h($proceso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numero Proceso') ?></th>
            <td><?= h($proceso->numero_proceso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?=h(utf8_decode($proceso->municipio->nombre_municipio))?></td>
        </tr>
		
		 
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($proceso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Solicitante') ?></th>
            <td><?= h(utf8_decode($proceso->Solicitante->nombres)." ".utf8_decode($proceso->Solicitante->apellidos)) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($proceso->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $proceso->estado ? __('Aprobado') : __('No Aprobado'); ?></td>
        </tr>
    </table>  
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($proceso->descripcion)); ?>
    </div>
</div>
