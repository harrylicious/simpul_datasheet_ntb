

<?php 
error_reporting(0);
if (isset($semua['total'])) {
    $semua = $semua['total'];
}
else {
  $semua = 0;
}
if (isset($tekstual)) {
  $teks = $tekstual;
}
else {
  $teks = 0;
}
if (isset($audio)) {
  $audio = $audio;
}
else {
  $audio = 0;
}
if (isset($gambar)) {
  $gambar = $gambar;
}
else {
  $gambar = 0;
}
if (isset($alih_media)) {
  $alih_media = $alih_media;
}
else {
  $alih_media = 0;
}
if (isset($peta)) {
  $peta = $peta;
}
else {
  $peta = 0;
}
if (isset($aktif['total'])) {
  $aktif = $aktif['total'];
}
else {
  $aktif = 0;
}
if (isset($inaktif['total'])) {
  $inaktif = $inaktif['total'];
}
else {   
  $inaktif = 0;
}
if ($_GET['wilayah'] != "") {
  $wilayah = $_GET['wilayah'];
}
else {
  $wilayah = "Semua";
}

?>
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
            <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Daftar Usaha <strong>Target Verifikasi</strong> <br>
            <small></small>
        </h1>
        </section>
            

    <!-- Main content -->
    <section class="content">  
            
    <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header"> 
            Daftar Usaha <strong>Target Verifikasi</strong> <br>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (substr($_SESSION['nama_lengkap'], 0, 2)) { 
                ?> 
                <table id="dtHorizontalExample2" class="display" style="width:100%">
                    <thead>
                        <tr>
                                <th>No. </th>
                                <th>Target Desa</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th>Total Belum Terverifikasi</th>
                                <th>Total Sudah Terverifikasi</th>
                                <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_target_verifikasi as $row) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->desa; ?></td>
                            <td><?= $row->kecamatan; ?></td>
                            <td><?= $row->kabupaten; ?></td>
                            <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                40% Complete (success)
                                </div>
                            </div> 
                            </td>
                            <td>
                            
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:70%;">
                                40% Complete (success)
                                </div>
                            </div> 
                            
                            </td>
                            <td>
                                <a href="<?= base_url('admin/usaha/get_data_usaha_target_verifikasi/').$row->desa; ?>" class="btn btn-success">Lihat Daftar</a>

                            </td>
                        </tr>

                        <?php
                        endforeach;
                        
                        
                        ?>
                    
                    </tbody>
                </table>
                <?php 
                }  ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header"> 
                Daftar Usaha <strong>Sudah Terverifikasi</strong> <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (substr($_SESSION['nama_lengkap'], 0, 2)) { 
                ?> 
                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm "> 
                    <thead>
                        <tr>
                                <th>No. </th>
                                <th>Nama usaha</th>
                                <th>Tahun Berdiri</th>
                                <th>Nama Pimpinan</th>
                                <th>NIK</th>
                                <th>Sektor Usaha</th> 
                                <th>Sub Sektor</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>Kecamatab</th>
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
                        foreach ($data_verifikasi as $row) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
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
                                <a href="<?= base_url('admin/document/edit/').$row->id; ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url('admin/document/delete_data/').$row->id; ?>" class="btn btn-danger">Hapus</a>

                            </td>
                        </tr>

                        <?php
                        endforeach;
                        
                        
                        ?>
                    
                    </tbody>
                </table>
                <?php 
                }  ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header"> 
                Daftar Usaha <strong>Belum Terverifikasi</strong> <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if (substr($_SESSION['nama_lengkap'], 0, 2)) { 
              ?> 
              <table id="dtHorizontalExample3" class="table table-striped table-bordered table-sm "> 
                  <thead>
                      <tr>
                            <th>No. </th>
                            <th>Nama usaha</th>
                            <th>Tahun Berdiri</th>
                            <th>Nama Pimpinan</th>
                            <th>NIK</th>
                            <th>Sektor Usaha</th> 
                            <th>Sub Sektor</th>
                            <th>Alamat</th>
                            <th>Desa</th>
                            <th>Kecamatab</th>
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
                    foreach ($data_non_verifikasi as $row) :
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
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
                             <a href="<?= base_url('admin/document/edit/').$row->id; ?>" class="btn btn-warning">Edit</a>
                              <a href="<?= base_url('admin/document/delete_data/').$row->id; ?>" class="btn btn-danger">Hapus</a>

                          </td>
                      </tr>

                      <?php
                      endforeach;
                      
                    
                    ?>
                
                  </tbody>
            </table>
            <?php 
            }  ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

               
                
            
      </section>
  </div>

  <?php $this->load->view('admin/parsial/v_footer')?>

</div>


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

                return 'Daftar_Usaha_Komoditas_'+' <?= urldecode($komoditas); ?>' + '_' + today;
              },
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
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

                return 'Daftar_Usaha_Komoditas_'+' <?= ($komoditas); ?>' + '_' + today;
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

<script>
  $(document).ready(function() {
    $('#dtHorizontalExample2').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>


<script>
  $(document).ready(function () {
    $('#dtHorizontalExample3 tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#dtHorizontalExample3').DataTable({
    
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

                return 'Daftar_Usaha_Komoditas_'+' <?= urldecode($komoditas); ?>' + '_' + today;
              },
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
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

                return 'Daftar_Usaha_Komoditas_'+' <?= ($komoditas); ?>' + '_' + today;
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


</body>


<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Import Data</h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/document/import_excel'); ?>" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="file" class="btn" name="file" required>
                NB: file harus bertype xls|csv
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Import</button>
            </div>
        </form>
    </div> 
</div>
</div>
<!-- /.modal-dialog -->


</html>


  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
 