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
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php echo $name; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="divider"></li>
              <li> <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a> </li>
            </ul>
          </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li> <a href="dashboard.php"><i class="fa fa-fw fa-desktop"></i> Sales Insights </a> </li>
            <li> <a href="pattern_filter.php"><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
            <li> <a href="product.php"><i class="fa fa-fw fa-shopping-cart"></i> Products</a> </li>
            <li class="active"> <a href=""><i class="fa fa-fw fa-user"></i> Profile </a> </li>
          </ul>
        </div>

        <!-- /.navbar-collapse --> 
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">

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
            
            <hr>
            <!-- Page Heading -->
            <div class="row">
              <div class="col-lg-6 panel panel-default">
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
              <div class="container">
                <table class="table table-striped">
                  <tr>
                    <td>

                      <?php
                      
                      $role_error=$branch_error=$email_error=$contact_error='';
                      if (isset($_POST['save1'])) {
                        if (empty($_POST['save1'])) {
                          $role_error='Required field';
                        }
                      }
                      if (isset($_POST['save2'])) {
                        if (empty($_POST['save2'])) {
                          $role_error='Required field';
                        }
                      }
                      if (isset($_POST['save3'])) {
                        if (empty($_POST['save3'])) {
                          $role_error='Required field';
                        }
                      }
                      if (isset($_POST['save4'])) {
                        if (empty($_POST['save4'])) {
                          $role_error='Required field';
                        }
                      }

                      function test_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                      }

                      ?>

                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                       <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-3 col-xs-3" align="right"><h5><strong>Profession:</strong></h5></div>
                        <div class="col-sm-6 col-xs-6" > <input type="text" class="form-control" name="role"> </div>
                        <div class="col-sm-3 col-xs-3"><input type="submit" name="save1" value="save" class="btn btn-primary"></div>
                      </div>
                      <div class="col-sm-12 col-xs-12"> 
                        <?php 

                        if(isset($_POST['save1']) && !empty($_POST['role'])){
                          $role= test_input($_POST['role']);
                          $comment="Successfully updated.";
                        }

                        ?>

                        <?php
                //error message reporting
                        if($role_error!=''){
                          ?>
                          <div class="col-sm-6 col-sm-offset-3" style="margin-top:5px;margin-right: 30px;">
                            <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong><?php echo $role_error ;?></strong>
                            </div>
                          </div>
                          <?php
                        }else{
                          ?>
                          <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $role_error ;?></span></div>
                          <?php
                        }
                        ?>
                      </div>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                      <div class="col-sm-3 col-xs-3" align="right"><h5><strong>Branch Name:</strong></h5></div>
                      <div class="col-sm-6 col-xs-6" > <input type="text" class="form-control" name="branch"> </div>
                      <div class="col-sm-3 col-xs-3"><input type="submit" name="save2" value="save" class="btn btn-primary">
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="col-sm-3 col-xs-3" align="right"><h5><strong>Email:</strong></h5></div>
                        <div class="col-sm-6 col-xs-6" > <input type="email" class="form-control" name="email"> </div>
                        <div class="col-sm-3 col-xs-3"><input type="submit" name="save3" value="save" class="btn btn-primary">
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                          <div class="col-sm-3 col-xs-3" align="right"><h5><strong>Contact No:</strong></h5></div>
                          <div class="col-sm-6 col-xs-6" > <input type="text" class="form-control" name="contact"> </div>
                          <div class="col-sm-3 col-xs-3"><input type="submit" name="save4" value="save" class="btn btn-primary">
                          </form>
                        </td>
                      </tr>
                      
                    </table>
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
