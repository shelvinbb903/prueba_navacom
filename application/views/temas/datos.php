<?php

	
?>
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-12 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
  
  <div class="site-index">
    <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="<?= $data_tema->icon_img?>" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div><br>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                        <span class="heading"><?= number_format($data_tema->subscribers, 0, ",",".")?></span>
                        <span class="description">Suscripciones</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="h5 mt-4 text-center">
                    <i class="ni business_briefcase-24 mr-2"></i><?= $data_tema->public_description?>
                  </div>
                  <hr class="my-4" />
                    <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">Informacion</h6>

                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><b>Fecha: </b><?= $data_tema->created?><br>
                    <i class="ni location_pin mr-2"></i><b>+18: </b><?= ($data_tema->over18) ? "Si" : "No"?><br>
                    <i class="ni location_pin mr-2"></i><b>Categoria: </b><?= $data_tema->advertiser_category?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0"><?= $data_tema->title?></h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form>
                  <img width="100%" src="<?= ($data_tema->banner_img != '') ? $data_tema->banner_img : $data_tema->header_img?>">                
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">                        
                          <br><p><?= $data_tema->description?></p>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        
      </div>

      
  </div>
</div>

<script type="text/javascript" src="<?= base_url()?>js/controller_temas.js"></script>