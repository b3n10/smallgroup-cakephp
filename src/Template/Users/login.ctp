<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
$this->assign('page_title', 'Login Page');
?>
<h1>Login</h1>

<?= $this->Form->create() ?>
<?= $this->Form->control('email_address') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>