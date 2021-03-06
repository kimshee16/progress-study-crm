<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo $asset_url; ?>images/logo.png"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/messages" title="Messages">
          <i class="far fa-comments" aria-hidden="true"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/signout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <center><img src="<?php echo $asset_url; ?>images/logomainwhite.png" alt="PSC Logo" width="140px"></center>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $asset_url; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->officer_name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link<?php if($title == 'Dashboard'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customerinfo" class="nav-link<?php if($title == 'Client Information'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Client Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="inquiries" class="nav-link<?php if($title == 'Inquiries'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inquiries
              </p>
            </a>
          </li>
          <?php
  if ($privilege_manage_providers == "1") {
?>
          <li class="nav-item">
            <a href="schools" class="nav-link<?php if($title == 'Schools and Programs'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Schools and Programs
              </p>
            </a>
          </li>
          <?php
  }
?>
          <?php
  if ($privilege_manage_studentapps == "1") {
?>
          <li class="nav-item">
            <a href="applications" class="nav-link<?php if($title == 'Applications'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Applications
              </p>
            </a>
          </li>
          <?php
  }
?>
          <li class="nav-item">
            <a href="adminmaintenance" class="nav-link<?php if($title == 'Admin Maintenance'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin Maintenance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="scholarships" class="nav-link<?php if($title == 'Scholarships'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Scholarships
              </p>
            </a>
          </li>
          <?php
  if ($privilege_manage_reporting == "1") {
?>
          <li class="nav-item">
            <a href="reports" class="nav-link<?php if($title == 'Reports'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <?php
  }
?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
    
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Inquirer Name</th>
                  <th>Birthday</th>
                  <th>Mobile Number</th>
                  <th>Email Address</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Resume</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($inquiries as $row) {
                  
                  if($row->inquiries_status == "Transferred") {
                    $transferbutton = "";
                  } else {
                    $transferbutton = "<a href='transferinquirytoclient/".$row->inquiries_id."' class='btn btn-primary btn-xs'>Approve as Client</a>";
                  }

                  if($row->inquiries_resume != "") {
                    $filedata = "<a href='".$asset_url."resume/".$row->inquiries_resume."'><img src='".$asset_url."images/fileicon.png' style='width: 20px;'> ".$row->inquiries_resume."</a>";
                  } else {
                    $filedata = "";
                  }

                  echo "<tr>
                    <td>".$row->inquiries_surname.", ".$row->inquiries_firstname." ".$row->inquiries_middlename."</td>
                    <td>".$row->inquiries_dob_month."/".$row->inquiries_dob_day."/".$row->inquiries_dob_year."</td>
                    <td>".$row->inquiries_mobileno."</td>
                    <td>".$row->inquiries_email."</td>
                    <td>".$row->inquiries_address."</td>
                    <td>".$row->inquiries_status."</td>
                    <td>".$filedata."</td>
                    <td><a href='#' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#viewInquiryModal' data-inquiriesid='".$row->inquiries_id."'>View</a> ".$transferbutton." <a href='deleteinquiry/".$row->inquiries_id."' class='btn btn-danger btn-xs'>Delete</a></td>
                    </tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Inquirer Name</th>
                  <th>Birthday</th>
                  <th>Mobile Number</th>
                  <th>Email Address</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Resume</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="modal fade bd-example-modal-lg" id="viewInquiryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Name: <label id="inquiriesname"></label></br>
            Birthday: <label id="inquiriesbirthday"></label></br>
            Phone #: <label id="inquiriesphone"></label></br>
            Mobile #: <label id="inquiriesmobile"></label></br>
            Email Address: <label id="inquiriesemail"></label></br>
            Qualifications: <label id="inquiriesqualifications"></label></br>
            Dependence: <label id="inquiriesdependence"></label></br>
            Civil Status: <label id="inquiriescivilstatus"></label></br>
            Country: <label id="inquiriescountry"></label></br>
            City: <label id="inquiriescity"></label></br>
            Notes: <label id="inquiriesnotes"></label></br>
            Status: <label id="inquiriesstatus"></label></br>
            Nationality: <label id="inquiriesnationality"></label></br>
            Resume: <label id="inquiriesresume"></label></br>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>@2022 Progress Study Consultancy CRM.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $asset_url; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $asset_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $asset_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $asset_url; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $asset_url; ?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $('#viewInquiryModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var inquiriesid = button.data('inquiriesid') // Extract info from data-* attributes
    var baseurl = $("#baseurl").val();
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    //modal.find('.modal-title').text('New message to ' + recipient)
    //modal.find('.modal-body input').val(recipient)
    $.ajax({
        type: "GET",
        url: baseurl + "index.php/getsingleinquiry/" + inquiriesid,
        success: function(data) {
          var obj = JSON.parse(data);
          for (var x = 0; x < obj.length; x++) {
              document.getElementById("inquiriesname").innerText = obj[x].inquiries_surname + ", " + obj[x].inquiries_firstname + " " + obj[x].inquiries_middlename;
              document.getElementById("inquiriesbirthday").innerText = obj[x].inquiries_dob_month + "/" + obj[x].inquiries_dob_day + "/" + obj[x].inquiries_dob_year;
              document.getElementById("inquiriesphone").innerText = obj[x].inquiries_phoneno;
              document.getElementById("inquiriesmobile").innerText = obj[x].inquiries_mobileno;
              document.getElementById("inquiriesemail").innerText = obj[x].inquiries_email;
              document.getElementById("inquiriesqualifications").innerText = obj[x].inquiries_qualifications;
              document.getElementById("inquiriesdependence").innerText = obj[x].inquiries_dependents;
              document.getElementById("inquiriescivilstatus").innerText = obj[x].inquiries_civilstatus;
              document.getElementById("inquiriescountry").innerText = obj[x].inquiries_country;
              document.getElementById("inquiriescity").innerText = obj[x].inquiries_city;
              document.getElementById("inquiriesnotes").innerText = obj[x].inquiries_notes;
              document.getElementById("inquiriesstatus").innerText = obj[x].inquiries_status;
              document.getElementById("inquiriesnationality").innerText = obj[x].inquiries_nationality;
              document.getElementById("inquiriesresume").innerText = obj[x].inquiries_resume;
          }
        },
        error: function(error) {
          alert(error);
        }
    });

  })

</script>
</body>
</html>