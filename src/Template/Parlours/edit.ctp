<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parlour->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parlour->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parlours'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parlours form large-9 medium-8 columns content">
    <?= $this->Form->create($parlour) ?>
    <fieldset>
        <legend><?= __('Edit Parlour') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('lat');
            echo $this->Form->input('lng');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
