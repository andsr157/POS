<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-6 col-12 mb-4">
        <div class="card b-radius card-noborder bg-blue">
          <div class="card-body custom-card-p">
            <div class="row">
              <div class="col-12 d-flex justify-content-start align-items-center icon-card">
                <div class="icon-round text-white">
                  <i class="mdi mdi-dropbox"></i>
                </div>
                <div class="ml-3">
                  <p class="m-0 text-white">Jumlah Item / Barang</p>
                  <h5 class="text-white"><?= $this->lvalidasi->count_item().'  Item'?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-6 col-12 mb-4">
        <div class="card b-radius card-noborder">
          <div class="card-body custom-card-p">
            <div class="row">
              <div class="col-12 d-flex justify-content-start align-items-center icon-card">
                <div class="icon-round-2">
                  <i class="mdi mdi-wallet-membership"></i>
                </div>
                <div class="ml-3">
                  <p class="m-0">Customer Member</p>
                  <h5><?= $this->lvalidasi->count_customer().'  Orang'?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-6 col-12 mb-4">
        <div class="card b-radius card-noborder bg-blue">
          <div class="card-body custom-card-p">
            <div class="row">
              <div class="col-12 d-flex justify-content-start align-items-center icon-card">
                <div class="icon-round text-white">
                  <i class="mdi mdi-account-multiple"></i>
                </div>
                <div class="ml-3">
                  <p class="m-0 text-white">Jumlah User / Akun</p>
                  <h5 class="text-white"><?= $this->lvalidasi->count_user().'  User'?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-6 col-12 mb-4">
        <div class="card b-radius card-noborder">
          <div class="card-body custom-card-p">
            <div class="row">
              <div class="col-12 d-flex justify-content-start align-items-center icon-card">
                <div class="icon-round-2 ">
                  <i class="mdi mdi-truck "></i>
                </div>
                <div class="ml-3">
                  <p class="m-0">Jumlah Supplier</p>
                  <h5><?= $this->lvalidasi->count_supplier()?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       
    </div>
    
  </div>
  
</div>