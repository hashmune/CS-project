<?php
require_once('../core/configuration.php');
require_once('../session.php');
$name = mysql_result(mysql_query("SELECT name FROM exe_manager WHERE uid='$uid'"),0);
require '../components/dash_header.php';
?>

<body>
<div id="wrapper"> 
  
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">Dashboard Services</a> </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="divider"></li>
          <li> <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li> <a href="dashboard.php"><i class="fa fa-fw fa-desktop"></i> Sales Insights </a> </li>
        <li class="active"> <a href=""><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
        <li> <a href=""><i class="fa fa-fw fa-shopping-cart"></i> Products </a> </li>
        <li> <a href="profile.php"><i class="fa fa-fw fa-user-circle-o"></i> Profile </a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </nav>
  <div id="page-wrapper">
    <div class="container-fluid"> 
      
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-lg-12">
        <h3>Select Period</h3>
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>Start Date : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <input id="datepicker" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>End Date : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <input type="text" id="enddate"/>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>Start Time : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <input type="text" id="starttime"/>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>End Time : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <input type="text" id="endtime"/>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div> 

      <hr>

      <div class="row">
      <div class="col-lg-12">
        <h3> Select Product</h3>
        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6" style="text-align: right">
            <h3>Product 1 : </h3>
          </div>
          <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
            <select class="selectpicker" data-live-search="true">
              <option>Hot Dog, Fries and a Soda</option>
              <option>Burger, Shake and a Smile</option>
              <option>Sugar, Spice and all things nice</option>
            </select>
          </div>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6" style="text-align: right">
            <h3>Product 2 : </h3>
          </div>
          <div class="col-lg-6" style="text-align: left; margin-top: 15px;">
            <select class="selectpicker" data-live-search="true">
              <option >Hot Dog, Fries and a Soda</option>
              <option >Burger, Shake and a Smile</option>
              <option >Sugar, Spice and all things nice</option>
            </select>
          </div>
        </div>
        </div>

        </div>
      </div>
      </div>   

      <!-- /.row -->
      <!-- /.row --> 
      
    </div>
    <!-- /.container-fluid --> 
    
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<?php mysql_close($connection); ?>

</body>
</html>
