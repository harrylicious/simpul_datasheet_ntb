
<!DOCTYPE html>
<html>
<head>
<style>

tfoot input { 
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    } 
</style>
    
    <?php $this->load->view('admin/parsial/v_head'); ?>
    <?php
        $query=$this->db->query("SELECT * FROM visitors WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
        $jml=$query->num_rows();

    ?>
</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <?php
            $this->load->view('admin/parsial/v_header');
        ?>
        
        <aside class="main-sidebar">
            <?php $this->load->view('admin/parsial/v_sidebar'); ?>
        </aside>

        <div class="content-wrapper"> 

            <!-- Main content -->
            <section class="content">
            <?php include_once "parsial/summary.php"; ?>    

                <div class="row">  
             

                    <div class="col-md-12"> 
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <?php 
                                $teks = "Data Usaha Berdasarkan Komoditas";
                                if ($_SESSION['level'] == "superadmin") {
                                  $teks = "Daftar Semua Usaha <b>".$_SESSION['alamat']."</b>";
                                }
                                else if ($_SESSION['level'] == "admin") {
                                  $teks = "Daftar Usaha Berdasarkan Komoditas <b>".$_SESSION['lingkup']."</b>";
                                }
                                else {
                                  $teks = "Daftar Semua Usaha Kecamatan <b>".$_SESSION['kecamatan']."</b>";
                                }

                                ?> 
                                <h3 class="box-title"><?= $teks; ?> </h3> 

                              
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <?php if ($_SESSION['level'] == "dinas") { ?>

                                    <table id="dtHorizontalExample" class="display" style="width:100%"> 
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                            <th>Komoditas</th>
                                            <th>Total</th> 
                                            <th></th>
                                            </tr> 
                                        </thead>
                                        <tbody><?php
                                                $no=1; ?>
                                                    
                                            <?php
                                            
                                                foreach ($data as $row): 
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $row->komoditas;?></td> 
                                                        <td><?php echo $row->total;?> Usaha</td>
                                                        <td style="text-align:right;"><a href="<?php echo site_url('admin/dashboard/get_data_by_sektor/'.$row->komoditas);?>" class="btn btn-warning">Lihat Daftar</a></td>
                                                    </tr>
                                            <?php endforeach;?> 
                                                   
                                        </tbody>
                                    </table>
                                     
                                    <?php } 
                                    else { 
                                        ?>
                                        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm">
                                              <thead>
                                                  <tr>
                                                        <th>ID</th>
                                        <div class="box-header"> 
                                       </div>
                                                        <th>Nama usaha</th>
                                                        <th>Tahun Berdiri</th>
                                                        <th>Nama Pimpinan</th>
                                                        <th>NIK</th>
                                                        <th>Sektor Usaha</th> 
                                                        <th>Sub Sektor</th>
                                                        <th>Alamat</th>
                                                        <th>Desa</th>
                                                        <th>Kecamatan</th>
                                                        <th>Kabupaten</th>
                                                        <th>Komoditas</th>
                                                        <th>Jml. Karyawan</th> 
                                                        <th>Kapasitas Produksi</th>
                                                      <th width="160px">Aksi</th>
                                                  </tr>
                                              </thead>
                                              
                                              <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $row) :
                                                  ?>
                                                  <tr>
                                                      <td><?= $row->id; ?></td>
                                                      <td><?= $row->nama_usaha; ?></td>
                                                      <td><?= $row->th_berdiri; ?></td>
                                                      <td><?= $row->nama_pimpinan; ?></td>
                                                      <td><?= $row->nik; ?></td>
                                                      <td><?= $row->sektor_usaha; ?></td>
                                                      <td><?= $row->sub_sektor_usaha; ?></td>
                                                      <td><?= $row->alamat; ?></td>
                                                      <td><?= $row->desa; ?></td>
                                                      <td><?= $row->kecamatan; ?></td>
                                                      <td><?= $row->kabupaten; ?></td>
                                                      <td><?= $row->komoditas; ?></td>
                                                      <td><?= $row->jml_karyawan; ?></td>
                                                      <td><?= $row->kapasitas_produksi." ".$row->satuan_produksi."/".$row->periode_produksi; ?></td>
                                                      <td>
                                                        <?php if ($_SESSION['level'] == "relawan") { ?>
                                                          <a href="<?= base_url('admin/usaha/edit/').$row->id; ?>" class="btn btn-warning">Edit</a>
                                                          <a href="<?= base_url('admin/usaha/delete_data/').$row->id; ?>" class="btn btn-danger">Hapus</a>
                            
                                                        <?php }
                                                        else { ?>
                                                          
                                                      
                                                        <?php } ?>
                                                         
                                                    
                                                      </td>
                                                  </tr>
                            
                                                  <?php
                                                  endforeach;
                                                  
                                                
                                                ?>
                                            
                                              </tbody>
                                        </table>



                                    <?php } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                
             
                
            
            </section> 
        </div>

    <?php $this->load->view('admin/parsial/v_footer')?>
        

    <script>
        // assumes you're using jQuery
        $(document).ready(function() {
        $('.confirm-div').hide();
        <?php if($this->session->flashdata('msg')){ ?>
        $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
        <?php } ?>
        });
    </script> 

    
<script>
  $(document).ready(function () {
    $('#dtHorizontalExample tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#dtHorizontalExample').DataTable({
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],
                    
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Usaha'+' <?= urldecode($wilayah); ?>' + '_' + today;
              },

            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14 ],
                },
                filename: function(){
                  
                  var today = new Date();
                  var dd = today.getDate();
  
                  var mm = today.getMonth()+1; 
                  var yyyy = today.getFullYear();
                  if(dd<10) 
                  {
                      dd='0'+dd;
                  } 
  
                  if(mm<10) 
                  {
                      mm='0'+mm;
                  } 
                  today = dd+'-'+mm+'-'+yyyy;
  
                  return 'Daftar_Usaha'+' <?= urldecode($wilayah); ?>' + '_' + today;
                },

            },
            'colvis'
        ],
  "scrollX": true,
  "deferRender": true,
  "responsive": true,
   
  
  });
  
  
  $('.dataTables_length').addClass('bs-select');
  });
</script>


    </div>

    
<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Terdeteksi <b><?= $total_data_inaktif['total']; ?></b> Arsip <b>Pindah Inaktif</b> </h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/usaha/pindahkan_semua/'.$_SESSION['kode_uk_up']) ?>" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="table-responsive">
                      <table class="table no-margin"> 
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID</th>
                                  <th>Kode</th>
                                  <th>Jenis</th>
                                  <th>Lok. Sekarang</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  $no=1;
                                  foreach ($data_pindah_inaktif as $row):
                                    ?>
                                      <tr>
                                          <td><?php echo $no++;?></td>
                                          <td><?php echo $row->dap_id;?></td> 
                                          <td><?php echo $row->kode_klasifikasi;?></td>
                                          <td><?php echo $row->jenis;?></td>
                                          <td><?php echo $row->lokasi_simpan;?></td>
                                      </tr>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"> Pindahkan Sekarang</button>
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>


  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>