<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
$this->assign('page_title', 'All Groups');

$this->start('pagecss');
echo $this->Html->css('group-index.css');
?>

<!-- freeawesome css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">

<?php
$this->end();
?>

<?php if (!$groups->count()): ?>
<div class="alert alert-primary mt-5" role="alert">
  <h4 class="alert-heading">No groups yet!</h4>
  <p>
  Looks like you need to create groups for your church. Click <a href="groups/add" class="alert-link">here</a> to create one.
  </p>
</div>
<?php else: ?>
<div class="row mt-5">
    <?php foreach($groups as $group): ?>
        <div class="col-sm-6 col-md-4 col-lg-3 px-2">
            <a href="groups/view/<?= h($group->id) ?>" class="no-decor" >
                <div class="card mb-3">
                    <?= $this->Html->image("filler.png", ['alt' => 'filler', 'class' => 'card-img-top']) ?>

                    <div class="card-body pb-0">
                        <h5 class="card-title text-center"><?= h($group->name) ?></h5>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-1 mb-0 border-0">
                            <i class="fas fa-clock w-25 text-center"></i>
                            <span class="d-inline-block text-justify w-span"><?= h($group->day . ', ' . $group->time->i18nFormat([\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></span>
                        </li>
                        <li class="list-group-item py-1 mb-0 border-0">
                            <i class="fas fa-map-marker-alt w-25 text-center"></i>
                            <span class="d-inline-block text-justify w-span"><?= h($group->place) ?></span>
                        </li>
                        <li class="list-group-item py-1 mb-0 border-0">
                            <i class="fas fa-users w-25 text-center"></i>
                            <span class="d-inline-block text-justify w-span"><?= h('X members') ?></span>
                        </li>
                    </ul>

                    <div class="card-footer">
                        <small class="text-muted">Last meeting 3 mins ago</small>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
<?php endif; ?>
