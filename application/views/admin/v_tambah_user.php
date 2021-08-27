

<!DOCTYPE html>
<html>

<head>

  <?php $this->load->view('admin/parsial/v_head'); ?>

</head>


<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
 
    <?php
    $this->load->view('admin/parsial/v_header');
  ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php
    $this->load->view('admin/parsial/v_sidebar');
    ?>
      <!-- /.sidebar -->
    </aside>
 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Tambah Data Pengguna
          <small></small>
        </h1>
      </section>

      <!-- Main content -->
         <!-- Main content -->
    <section class="content">

<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <div class="active tab-pane" id="activity">

            <div class="box-header with-border">

                </div>

                <div class="box-body">
                        <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12">
                            <h5 class="info-text"></h5>
                        </div>

                        <form action="<?= base_url('admin/user/save_data'); ?>" method="post">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label>Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" placeholder="Kode User">
                                    </div>
                                </div>

                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label>Nama Lengkap </label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa"required>
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten">
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telpon</label>
                                        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telpon">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Level</label>
                                            <select class="form-control" name="level" required>
                                                <option value="">- PILIH -</option>
                                                <option value="admin">Admin</option>
                                                <option value="relawan">Relawan</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>




                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
               
            </div>
        

    <!-- /.nav-tabs-custom -->
  </div>
  
  <!-- /.col -->
</div>
<!-- /.row -->
 
</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>


    
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>

    <script>
        // assumes you're using jQuery
        $(document).ready(function() {
        $('.confirm-div').hide();
        <?php if($this->session->flashdata('msg')){ ?>
        $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
        <?php } ?>
        });
    </script>


</body>
</html>
