<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <ul class="navbar-nav">
  <li class="nav-item">
      <span class="navbar-brand">Olá: <?php echo $_SESSION['login']; ?></span>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cadastrar</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?page=usuario">Usuario</a>
        <a class="dropdown-item" href="index.php?page=imovel">Imovel</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Menu2 </a>
    </li>
    <li class="nav-items right">
      <a class="nav-link" href="sair.php">Sair</a>
    </li>
  </ul>
</nav>
<br>
