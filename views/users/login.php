<?php       //formulario de login

/*if(isset($data['info'])){
    echo '<script>alert("' . $data['info'] . '")</script>';
}
*/
echo'
  <section class="vh-100" style="background-color: rgb(4,72,145);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0"">
            <div class="col-md-6 col-lg-5 d-none d-md-block style="margin: 0 auto;">
              <img src="images/escudo.png"
                alt="escudo Celia Viñas" class="img-fluid" style="border-radius: 1rem 0 0 1rem; position:relative;top:25%; left:25%;"/>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="index.php?controller=loginController&action=checkLogin" method="POST" enctype="multipart/form-data">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Gestión de recursos</span>
                    </div>';
                    if(isset($data['info'])){
                        echo '<div><span class="h4 fw-bold mb-0 text-danger">' . $data['info'] . '</span></div>';
                    }
                    if(isset($data['error'])){
                        echo '<div><span class="h4 fw-bold mb-0 text-danger">Usuario o contraseña incorrectos</span>';
                    }

                echo '
                <h5 class="fw-normal mt-4 mb-3 pb-3" style="letter-spacing: 1px;">¡Bienvenido/a!</h5>

                  <div class="form-outline mb-4">
                  <label for="userName">Nombre de usuario/a</label>
                  <input type="text" name="userName" class="form-control form-control-lg border border-2"/>
                  </div>

                  <div class="form-outline mb-4">
                  <label for="userPass">Contraseña</label>
                    <input type="password" name="userPass" class="form-control form-control-lg border border-2" />
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" class="btn btn-dark btn-lg btn-block" value="Acceder">
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';