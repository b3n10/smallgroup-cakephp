<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('page_title', 'Profile Page');
?>

<h1>
    <?= h(ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])) ?>
</h1>
