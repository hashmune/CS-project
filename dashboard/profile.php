<?php
require_once('../core/configuration.php');
require_once('../session.php');
$name = mysql_result(mysql_query("SELECT name FROM exe_manager WHERE uid='$uid'"),0);
$role = mysql_result(mysql_query("SELECT role FROM exe_manager WHERE uid='$uid'"),0);
$branch = mysql_result(mysql_query("SELECT branch FROM exe_manager WHERE uid='$uid'"),0);
$tele = mysql_result(mysql_query("SELECT telephone FROM exe_manager WHERE uid='$uid'"),0);
$email = mysql_result(mysql_query("SELECT email FROM exe_manager WHERE uid='$uid'"),0);
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
        <li> <a href="pattern_filter.php"><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
        <li> <a href=""><i class="fa fa-fw fa-shopping-cart"></i> Products</a> </li>
        <li class="active"> <a href=""><i class="fa fa-fw fa-user-circle-o"></i> Profile </a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </nav>
  <div id="page-wrapper">
    <div class="container-fluid"> 
      
      <hr>
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-6" style="text-align:right">
          <img src="../public/img/user.png" class="img-thumbnail" alt="Cinque Terre" width="28%" height="28%">
        </div>
        <div class="col-lg-6" style="text-align: left; color: ">
          <h4> <?php echo $name; ?></h4>
          <h4> <?php echo $role; ?></h4>
          <h4> Keels Super Center , <?php echo $branch; ?></h4>
          <h4> <?php echo $tele; ?></h4>
          <h4> <?php echo $email; ?></h4>
        </div>
      </div>
      <hr>
      
      <div class="row">
        <div class="col-lg-12">
        <h3 style="text-align: center"> Account Settings </h3>
        </div>
      </div> 

      <hr>

      <!-- /.row -->
      <!-- /.row --> 
      
    </div>
    <!-- /.container-fluid --> 
    
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 
<?php mysql_close($connection); ?>
</body>
</html>
