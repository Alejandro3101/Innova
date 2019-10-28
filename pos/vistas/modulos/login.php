<div id="innovacion"></div>

<div class="login-box">
  
  <div class="login-logo">

      <img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:40px 90px 10px 100px">

  </div>

  <div class="login-box-body">



    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control"  autocomplete="off" onkeypress=" return numeros(event)" placeholder="Documento" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();

      ?>

    </form>

      <script>
      function numeros(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key);
      numero = " 0123456789";
      especiales = "8,37,39,46";

      tecla_especial = false
      for(var i in especiales){
      if(key == especiales[i]){
      tecla_especial = true;

      }
      }

      if(numero.indexOf(tecla)==-1 && !tecla_especial)
      return false;
      }
      </script>

  </div>

</div>
