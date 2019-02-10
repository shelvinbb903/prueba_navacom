<?php

	
?>
<div ng-app="app_listar_temas" ng-controller="controller_listar_temas" ng-cloak>
  

  <!-- Header -->
  <div class="header bg-gradient-primary pb-8 pt-12 pt-md-8">
    <div class="container-fluid">
      <div class="header-body"><br>
        <div class="row">
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Temas</h5>
                    <span class="h2 font-weight-bold mb-0">{{ datos.length }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-chart-bar"></i>
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
  <div class="container-fluid mt--7">
    <div class="row">    

      <div class="col-xl-12">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h1 class="display-2">Temas</h1>
              </div>
            </div>
          </div>
          <div class="card-body">                     
            <div class="pl-lg-12">
              <div class="row">
                <div class="col-lg-12">                                        
                  <div class="table-responsive">
                    <table class="table align-items-center">
                      <thead class="thead-light">
                        <tr>
                          <th></th>
                          <th>Titulo</th>
                          <th>Categoria</th>
                          <th>Idioma</th>
                          <th>Fecha</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="(key, value) in datos">
                          <th>
                            <div class="media align-items-center">
                              <a href="#" class="avatar rounded-circle mr-3" title="{{ value.title }}" ng-click="vista_previa(value.id)">
                                <img alt="Image placeholder" ng-src="{{value.icon_img}}" ng-if="value.icon_img != ''">
                              </a>
                            </div>
                          </th>
                          <td>
                            {{ value.title }}
                          </td>
                          <td>
                            {{ value.advertiser_category }}
                          </td>
                          <td>
                            {{ value.lang }}
                          </td>
                          <td>
                            {{ value.created }}
                          </td>
                          <td class="text-right">
                              <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  <a class="dropdown-item" href="#" ng-click="vista_previa(value.id)">Ver Más</a>
                                </div>
                              </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                      

                      
                  </div>

                  
                  
                </div>
              </div>
              
            </div>
            
              
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">{{ tema_seleccionado.title }}</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img  ng-src="{{tema_seleccionado.banner_img}}" width="100%" ng-if="tema_seleccionado.banner_img != ''">
            <img  ng-src="{{tema_seleccionado.header_img}}" width="100%" ng-if="tema_seleccionado.banner_img == ''">
            <p>{{ tema_seleccionado.public_description }}</p>
            <a class="dropdown-item text-right" href="<?= base_url()?>index.php/temas/VerTema/{{tema_seleccionado.id}}" ng-click="">Ver Más</a>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid mt--7">
  <div class="site-index">

    
    <h1 class="display-2">Temas</h1>

    
    

      
  </div>
</div>

<script type="text/javascript" src="<?= base_url()?>js/controller_listado_temas.js"></script>