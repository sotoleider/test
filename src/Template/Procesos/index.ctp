<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proceso[]|\Cake\Collection\CollectionInterface $procesos
 */
 

?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Proceso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="procesos index large-10 medium-8 columns content">
    <h3><?= __('Procesos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_proceso') ?></th>
				<th scope="col"><?= h('Departamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_solicitante_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciónes') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($procesos as $proceso): 
			?>
            <tr>
                <td><?= $this->Number->format($proceso->id) ?></td>
                <td><?= h($proceso->numero_proceso) ?></td>
				<td><?= h(utf8_decode($proceso->municipio->departamento->nombre_dpto)) ?></td>
                <td><?= h(utf8_decode($proceso->municipio->nombre_municipio)) ?></td>
                <td><?= h($proceso->fecha) ?></td>
                <td><?= $proceso->estado ? __('Aprobado') : __('No Aprobado'); ?></td>
                <td><?=h(utf8_decode($proceso->Solicitante->nombres)." ".utf8_decode($proceso->Solicitante->apellidos)) ?></td>
                <!---<td><?php //h(utf8_decode($proceso->Aprobador->nombres)." ".utf8_decode($proceso->Aprobador->apellidos)) ?></td>--->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $proceso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proceso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proceso->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} of {{pages}}, mostrando {{current}} registro(s) out of {{count}} total')]) ?></p>

    </div>
</div>
