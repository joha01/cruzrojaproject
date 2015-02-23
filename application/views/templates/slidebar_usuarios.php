        <!--<div class="col-sm-3 col-md-2 sidebar">-->
         
         <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="<?= base_url()?>auth/logout">Salir</a></li>
          </ul>            
          <ul class="nav nav-sidebar">
              <li class="active">
                <li role="presentation"><a href="<?= base_url()?>auth">Lista Usuarios</a></li>
                <li role="presentation" class="disabled" ><a href="<?= base_url().'auth/create_user'?>">Nuevo Usuario</a></li>     
                <li role="presentation" class="disabled"><a href="<?= base_url()?>auth/create_group">Nuevo Grupo</a></li>
                <li role="presentation" class="disabled"><a href="<?= base_url()?>main/verPeticiones">Peticiones de Registro</a></li>
                <li role="presentation"><a href="<?= base_url()?>main/verEst">Reportes de Accidentes</a></li>
                <li role="presentation"><a href="<?= base_url()?>main/verAlertas">Alertas Médicas</a></li>
                <li role="presentation"><a href="<?= base_url()?>main/buscarPermisos">Visualización por Grupos</a></li>

          </ul>

             
             
        </div>