<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LandTour $landTour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $landTour->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $landTour->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Land Tours'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departures'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Departure'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="landTours form large-9 medium-8 columns content">
    <?= $this->Form->create($landTour) ?>
    <fieldset>
        <legend><?= __('Edit Land Tour') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('caption');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('trippal_price');
            echo $this->Form->control('customer_price');
            echo $this->Form->control('promote');
            echo $this->Form->control('departure_id', ['options' => $departures]);
            echo $this->Form->control('destination_id', ['options' => $destinations]);
            echo $this->Form->control('days');
            echo $this->Form->control('rating');
            echo $this->Form->control('thumbnail');
            echo $this->Form->control('media');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('status');
            echo $this->Form->control('term');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
