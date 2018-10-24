<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="/">SmallGroup</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <?php if ($this->Session->read('Auth.User.first_name')): ?>
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Groups
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/my-groups">My Groups</a>
            <a class="dropdown-item" href="/groups">All Groups</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users/logout">Logout</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/users/login">Login</a>
        </li>
      <?php endif ?>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 font-italic" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 
