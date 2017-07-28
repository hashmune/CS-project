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
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-user"></i> <?php echo $name; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <!-- <li class="divider"></li> -->
              <li> <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a> </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"> <a href="dashboard.php"><i class="fa fa-fw fa-desktop"></i> Sales Insights </a> </li>
            <li> <a href="pattern_filter.php"><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
            <li> <a href="product.php"><i class="fa fa-fw fa-shopping-cart"></i> Products</a> </li>
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
                <h3 class="page-header" style="padding-bottom: 15px"> Sales Insights </h3>
            </div>
          </div>

          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-area-chart fa-fw"></i> Top sold items </h3>
                </div>
                <div class="panel-body">
                  <div id="wordcloud"></div>
                </div>
              </div>
            </div>
          </div>
          <br> 

          <!--<div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-area-chart fa-fw"></i> Sales </h3>
                </div>
                <div class="panel-body">
                  <div>
                    <svg id="chart"></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>-->

          <!-- /.row -->
          <!-- /.row -->

          <div class="row">
            <div class="col-lg-12" style="margin-top: 15px;">
              <a href="download.php?download_file=some_file.pdf" class="btn btn-primary">Generate report</a>
            </div>
          </div>
          
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
    
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="../lib/d3/d3.js"></script>
    <script src="../public/js/d3.layout.cloud.js"></script>
    <script src="../public/js/wordcloud.js"></script>
    <script src="../public/js/multilines.js"></script>

  </body>
  </html>
