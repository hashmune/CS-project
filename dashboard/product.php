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
          <li> <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li class="active"> <a href="dashboard.php"><i class="fa fa-fw fa-desktop"></i> Sales Insights </a> </li>
        <li> <a href="pattern_filter.php"><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
        <li> <a href="product.php"><i class="fa fa-fw fa-shopping-cart"></i> Product</a> </li>
        <li> <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile </a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </nav>
  <div id="page-wrapper">
    <div class="container-fluid"> 
      
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="padding-bottom: 15px"> View product details</h3>
          
        </div>
      </div>
      <!-- Page Heading -->

      <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
            	<h3 class="panel-title"><i class="fa fa-fw fa-th-large"></i> Search products </h3>
            </div>
            <div class="panel-body">
	            <div class="container">
					<form class="navbar-form navbar-left" role="search">
					    <div class="form-group">
					        <input type="text" class="form-control" placeholder="Search">
					    </div>
					    <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
            	</div>
          	</div>
        </div>
    </div>
    <br> 
	<!-- /.row -->
      
    </div>
    <!-- /.container-fluid --> 
    
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 
<?php mysql_close($connection); ?>
<!-- jQuery --> 
<script src="../public/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="../public/js/bootstrap.min.js"></script> 

</body>
</html>