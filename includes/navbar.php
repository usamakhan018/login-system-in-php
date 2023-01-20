<header>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href=".">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
        if (!isset($_SESSION['user'])) {
          echo "
                 
        <li class='nav-item'>
          <a class='nav-link' href='./login.php'>Login</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='./register.php'>Register</a>
        </li>
          ";
        }
         ?>

        <?php 
        if (isset($_SESSION['user'])) {
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='./logout.php'>Logout</a>
        </li>";
        }
         ?>

      </ul>
    </div>
  </div>
</nav>
</header>

