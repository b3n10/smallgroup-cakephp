<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
$this->assign('page_title', h($group->name));
?>

<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>

    <?php
    echo $this->Form->create($group, ['url' => ['action' => 'join']]);
    echo $this->Form->button('Join Group', ['class' => 'btn btn-primary']);
    echo $this->Form->end();
    ?>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= h($group->day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($group->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($group->time->i18nFormat([\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($group->description) ?></td>
        </tr>
    </table>
</div>
