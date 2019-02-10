<?php

	
?>
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-12 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      
    </div>
  </div>
</div>
<div class="container-fluid mt--7" ng-app="app_copiar_temas" ng-controller="controller_copiar_temas" ng-cloak>
  <div class="row">    

    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h1 class="display-2">Copiar Datos</h1>
            </div>
          </div>
        </div>
        <div class="card-body">                     
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">                                        
                <p class="mt-0 mb-5">Este proceso se realizo con el objetivo de copiar la informacion de la URL adjunta a la base de datos. Si los datos ya existen se reemplazan.</p>
                <button type="button" class="btn btn-info" ng-click="ejecutar_proceso()">Ejecutar Proceso</button><br><br>

                <div class="jumbotron">

                  <div class="row">
                    <div class="col-lg-12"> 
                      <h4>URL DATOS</h4>
                      https://www.reddit.com/reddits.json
                    </div>
                  </div>

                    
                </div>
                
              </div>
            </div>
            
          </div>
          
            
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="modal_cargando" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="<?= base_url()?>img/theme/spinner.gif">
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url()?>js/controller_temas.js"></script>