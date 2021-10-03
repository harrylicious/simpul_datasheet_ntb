<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
<!--//END HEADER -->
<style>
  @media screen and (max-width: 600px) {
    #banner {
      visibility: hidden;
      clear: both;
      float: left;
      display: none;
    }

  }

  tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
  }
</style>

<!--//END HEADER -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container-fluid">
    <div class="row">
      <img src="<?php echo base_url() . 'assets/images/banner.jpg' ?>" class="img-fluid" alt="" height="1500">
    </div>
  </div>

</section><!-- End Hero -->

<?php include_once "parsial/summary_doc.php"; ?>
<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Grafik Kabupaten</h5>
                <!-- <p class="card-category">Sebaran Data Per</p> -->
              </div>
              <div class="card-body ">
                <canvas id="myChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="row mt-4 mb-4">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Grafik Komoditas</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartJenisUsaha" width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>


<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title"> <strong>DAFTAR SEMUA UMKM</strong></h5>
      </div>
      <div class="card-body ">

        <body>
          <table id="dtHorizontalExample" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Nama UMKM</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data as $row) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->nama_usaha; ?></td>
                  <td><?= $row->alamat; ?></td>
                  <td><?= $row->kecamatan; ?></td>
                  <td><a href="<?= base_url('usaha/detail/') . $row->id; ?>" class="btn btn-danger">Detail</a></td>
                </tr>

              <?php
              }

              ?>

            </tbody>
          </table>
        </body>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container-fluid px-0">
  <?php include_once "parsial/footer.php"; ?>
</div>


</html>

<?php foreach ($data_grafik as $key => $value) {
  $kabupaten[] = $value->kabupaten;
  $jumlah[] = $value->total;
  
}?>
<script src="<?php echo base_url().'assets1/js/plugins/chartjs.min.js'?>"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($kabupaten)?>,
        datasets: [{
            label: 'Data Usaha Perkabupaten/Kota',
            data: <?= json_encode($jumlah)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 12, 255, 1)',
                'rgba(123, 102, 255, 1)',
                'rgba(183, 92, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 12, 255, 1)',
                'rgba(123, 102, 255, 1)',
                'rgba(183, 92, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var juChart = document.getElementById('chartJenisUsaha').getContext('2d');
var myChart = new Chart(juChart, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($label_grafik_jenis_usaha)?>,
        datasets: [{
            label: 'Data Usaha Komoditas',
            data: <?= json_encode($value_grafik_jenis_usaha)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>
  $(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function() {
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table = $('#example').DataTable({
      initComplete: function() {
        // Apply the search
        this.api().columns().every(function() {
          var that = this;

          $('input', this.footer()).on('keyup change clear', function() {
            if (that.search() !== this.value) {
              that
                .search(this.value)
                .draw();
            }
          });
        });
      }
    });

  });
</script>