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
                  <h5 class="text-white"><?= $this->lvalidasi->count_item() . '  Item' ?></h5>
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
                  <h5><?= $this->lvalidasi->count_customer() . '  Orang' ?></h5>
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
                  <h5 class="text-white"><?= $this->lvalidasi->count_user() . '  User' ?></h5>
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
                  <h5><?= $this->lvalidasi->count_supplier() ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-12">
        <div class="card b-radius card-noborder mh-100 py-5 px-4">
          <!-- <div class="animate__animated animate__tada animate__infinite mx-auto" style="margin-top: 210px;">
            <h1 class="">
              Kamu nanye</b>
            </h1>
          </div> -->
          <div class="col-12">
            <h5 class="font-weight-semibold chart-title">Pemasukan 1 Minggu Terakhir</h5>
          </div>
          <div class="col-12">
            <canvas id="myChart" style="width: 100%; height: 315px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  const ctx = document.getElementById('myChart');

  const weeklyIncomes = <?php echo json_encode($weekly_incomes); ?>;

  const chartData = {
    labels: [],
    datasets: [{
      label: 'Total Final Price',
      data: [],
      backgroundColor: 'RGB(44, 77, 240)',
      borderColor: 'RGB(44, 77, 240)',
      borderWidth: 0,
      borderRadius: 15,
    }],

  };
  const chartOptions = {
    plugins: {
      tooltip: {
        enabled: true,
        callbacks: {
          label: function(context) {
            const label = context.dataset.label || '';
            if (context.parsed.y !== null) {
              return 'Pemasukan: Rp. ' + context.parsed.y.toLocaleString();
            }
            return label;
          },
        },
      },
    },
  };

  weeklyIncomes.forEach((income) => {
    chartData.labels.push(income.date);
    chartData.datasets[0].data.push(income.total_final_price);
  });

  new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: chartOptions,
  });
</script>