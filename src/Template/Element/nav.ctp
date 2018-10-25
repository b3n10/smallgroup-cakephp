<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark px-5">
  <a class="navbar-brand" href="/">SmallGroup</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($this->fetch('title') === 'Home') ? ' active' : '' ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>

      <?php if ($this->Session->check('Auth.User')): ?>

        <?php if ($this->Session->read('Auth.User.user_type') === 0): ?>
          <li class="nav-item <?= ($this->fetch('title') === 'Users') ? ' active' : '' ?>">
            <a class="nav-link" href="/profile">Profile</a>
          </li>
        <?php else: ?>
          <li class="nav-item <?= ($this->fetch('title') === 'Users') ? ' active' : '' ?> dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profile">My Profile</a>
              <a class="dropdown-item" href="/users/">All Users</a>
              <a class="dropdown-item" href="/users/add">New User</a>
            </div>
          </li>
        <?php endif ?>

        <li class="nav-item <?= ($this->fetch('title') === 'Groups') ? ' active' : '' ?> dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Groups
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/my-groups">My Groups</a>
            <a class="dropdown-item" href="/groups">All Groups</a>
            <?php if ($this->Session->read('Auth.User.user_type') > 0): ?>
              <a class="dropdown-item" href="/groups/add">New Group</a>
            <?php endif ?>
          </div>
        </li>

        <li class="nav-item ml-4">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 font-italic" type="search" placeholder="Search Friends or Groups" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </li>

      <?php endif ?>
    </ul>

    <ul class="navbar-nav">
      <?php if (! $this->Session->check('Auth.User')): ?>
        <li class="nav-item <?= ($this->fetch('title') === 'Users') ? ' active' : '' ?>">
          <a class="nav-link" href="/users/login">Login</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/users/logout">Logout</a>
        </li>
      <?php endif; ?>
    </ul>


  </div>
</nav>