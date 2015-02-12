      <!--<div class="container-fluid">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Cruz Roja</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?= base_url().'auth' ?>">Admin</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Config</a></li>
            <li><a href="<?= base_url(). 'auth/logout' ?>">Salir</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      <!--</div>-->
    </div>