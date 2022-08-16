
<div class="row row-cols-1 row-cols-md-12 row-cols-lg-3 mb-3 text-center">
  <?php foreach($productos as $producto) { ?>
      <!--Card-->
<div class="col">
      <div class="sombras mb-4 rounded-3 shadow-sm">
        <div class="sombras card-header py-3"">
          <h4 class="my-0 fw-normal"><?php echo $producto->nom_producto; ?></h4>
        </div>
        <div class="card-body">
          <img src="../../admin/imagenes/<?php echo $producto->IMAGEN;?>" class="im">
          <br><br>
          <h5>Descripcion</h5>
          <p class="br_btn"> <?php echo $producto->descripcion;?> </p>

        <b> Precio: </b> <?php echo "$".number_format($producto->precio,2, '.','.');?>  
    
        <br><br>
        <?php
          if(isset($_SESSION['cliente'])){
          ?>

          <div class="d-grid gap-2 d-md-block">         
          <a href="../../carrito/index_carrito.php?agregar=<?php echo $producto->id_producto ?>"> <!--Enviar id de producto -->
            <button class="btn sombras br_btn" id="registrarme" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg> &ensp; Agregar
            </button>
            </a>
          </div>

          <?php
           }
          ?>

          <br>
        </div>
    </div>
    </div>
    <?php  } ?>
    