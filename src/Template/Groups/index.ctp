<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<div class="row mt-5">
    <?php foreach($groups as $group): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <a href="groups/view/<?= h($group->id) ?>" class="" style="color: #000; text-decoration: none;">
                <div class="card mb-3">
                    <?= $this->Html->image("filler.png", ['alt' => 'filler', 'class' => 'card-img-top']) ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= h($group->name) ?></h5>
                        <p class="card-text">
                        Elit iure aspernatur porro iste consequuntur Ratione magni voluptatum ducimus
                        </p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Last activity 3 mins ago</small>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
