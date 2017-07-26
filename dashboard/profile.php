<?php
require_once('../core/configuration.php');
require_once('../session.php');
$name = mysql_result(mysql_query("SELECT name FROM exe_manager WHERE uid='$uid'"),0);
$role = mysql_result(mysql_query("SELECT role FROM exe_manager WHERE uid='$uid'"),0);
$branch = mysql_result(mysql_query("SELECT branch FROM exe_manager WHERE uid='$uid'"),0);
$tele = mysql_result(mysql_query("SELECT telephone FROM exe_manager WHERE uid='$uid'"),0);
$email = mysql_result(mysql_query("SELECT email FROM exe_manager WHERE uid='$uid'"),0);

function updatedata($column,$update_data,$id){
    $res = mysql_query("UPDATE  exe_manager SET $column = '$update_data' WHERE uid=$id");
    return $res;
}

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
              <li> <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
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

          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header" style="padding-bottom: 15px"> Manage profile </h3> 
            </div>
          </div>
          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-fw fa-user" style="margin-right: 5px;"></i>User details</h3>
                </div>
                <img src="../public/img/user.png" class="img-thumbnail" alt="Cinque Terre" width="15%" height="15" style="margin: 10px;">

                <div class="col-lg-8" style="text-align: left; float: right; margin: 15px;">
                  <p style="font-size: 14pt;"><b>Name: </b><?php echo $name; ?></p>
                  <p style="font-size: 14pt;"><b>Profession: </b><?php echo $role; ?></p>
                  <p style="font-size: 14pt;"><b>Branch Name: </b><?php echo $branch; ?></p>
                  <p style="font-size: 14pt;"><b>Contact No: </b><?php echo $tele; ?></p>
                  <p style="font-size: 14pt;"><b>Email: </b><?php echo $email; ?></p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row" style="margin-top: 15px;">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-fw fa-cogs" style="margin-right: 5px;"></i>Update details</h3>
                  </div>
                  <table class="table">
                    <tr>
                      <td>

                        <?php
                        $comment1=$comment2=$comment3=$comment4='';
                        $role_error='';
                        if (isset($_POST['save1'])) {
                          if (empty($_POST['role'])) {
                            $role_error='Required field';
                          }
                        }

                        $branch_error='';
                        if (isset($_POST['save2'])) {
                          if (empty($_POST['branch'])) {
                            $branch_error='Required field';
                          }
                        }

                        $email_error='';
                        if (isset($_POST['save3'])) {
                          if (empty($_POST['email'])) {
                            $email_error='Required field';
                          }
                        }

                        $contact_error='';
                        if (isset($_POST['save4'])) {
                          if (empty($_POST['contact'])) {
                            $contact_error='Required field';
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
                          <div class="col-sm-6 col-xs-6">
                            <h5><strong>Profession:</strong></h5>
                            <input type="text" class="form-control" name="role"/>
                            <input type="submit" name="save1" value="save" class="btn btn-primary" style="margin-top: 10px" />
                          </div>
                          <div class="col-sm-6 col-xs-6"> 
                            <?php 

                            if(isset($_POST['save1']) && !empty($_POST['role'])){
                              $role= test_input($_POST['role']);
                              $column='role';
                              $result=updatedata($column,$role,$uid);
                              $comment1="Successfully updated.";
                            }

                            ?>

                            <?php
                            //error message reporting
                            if($role_error!=''){
                              ?>
                              <div class="col-sm-6  col-xs-6 " style="margin-top:25px;margin-right: 0px;">
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <center><strong><?php echo $role_error ;?></strong></center>
                                </div>
                              </div>
                              <?php
                            }elseif($role_error=''){
                              ?>
                              <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $role_error ;?></span></div>
                              <?php
                            }elseif($comment1!=''){
                            ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                              <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <center> <strong><?php echo $comment1 ;?></strong> </center>
                              </div>
                              </div>
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
                          <div class="col-lg-6">
                            <h5><strong>Branch name:</strong></h5>
                            <input type="text" class="form-control" name="branch"/>
                            <input type="submit" name="save2" value="save" class="btn btn-primary" style="margin-top: 10px" />
                          </div>
                          <div class="col-sm-6 col-xs-6"> 
                            <?php 

                            if(isset($_POST['save2']) && !empty($_POST['branch'])){
                              $branch= test_input($_POST['branch']);
                              $column='branch';
                              $result=updatedata($column,$branch,$uid);
                              $comment2="Successfully updated.";
                            }

                            ?>

                            <?php
                            //error message reporting
                            if($branch_error!=''){
                              ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <center><strong><?php echo $branch_error ;?></strong></center>
                                </div>
                              </div>
                              <?php
                            }elseif($branch_error=''){
                              ?>
                              <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $branch_error ;?></span></div>
                              <?php
                            }elseif($comment2!=''){
                            ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                              <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <center> <strong><?php echo $comment2 ;?></strong> </center>
                              </div>
                              </div>
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
                          <div class="col-lg-6">
                            <h5><strong>Email:</strong></h5>
                            <input type="text" class="form-control" name="email"/>
                            <input type="submit" name="save3" value="save" class="btn btn-primary" style="margin-top: 10px" />
                          </div>

                          <div class="col-sm-6 col-xs-6"> 
                            <?php 

                            if(isset($_POST['save3']) && !empty($_POST['email'])){
                              if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                                $email_error='Invalid Email Format';
                              }else{
                                $email=test_input($_POST['email']);
                                $column='email';
                                $result=updatedata($column,$email,$uid);
                                $comment3="Successfully updated.";
                              }
                            }

                            ?>

                            <?php
                            //error message reporting
                            if($email_error!=''){
                              ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <center><strong><?php echo $email_error ;?></strong></center>
                                </div>
                              </div>
                              <?php
                            }elseif($email_error=''){
                              ?>
                              <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $role_error ;?></span></div>
                              <?php
                            }elseif($comment3!=''){
                            ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                              <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <center> <strong><?php echo $comment3 ;?></strong> </center>
                              </div>
                              </div>
                            <?php
                              }
                            ?>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                          <div class="col-lg-6">
                            <h5><strong>Contact No:</strong></h5>
                            <input type="text" class="form-control" name="contact"/>
                            <input type="submit" name="save4" value="save" class="btn btn-primary" style="margin-top: 10px" />
                          </div>
                            <div class="col-sm-6 col-xs-6"> 
                            <?php 

                            if(isset($_POST['save4']) && !empty($_POST['contact'])){
                              if(!preg_match('^[0-9]{11}^', $_POST['contact'])){
                                $contact_error='Invalid Format';
                              }else{
                                $contact=$_POST['contact'];
                                $column='telephone';
                                $result=updatedata($column,$contact,$uid);
                                $comment4="Successfully updated.";
                              }
                            }

                            ?>

                            <?php
                            //error message reporting
                            if($contact_error!=''){
                              ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <center><strong><?php echo $contact_error ;?></strong></center>
                                </div>
                              </div>
                              <?php
                            }elseif($contact_error=''){
                              ?>
                              <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $role_error ;?></span></div>
                              <?php
                            }elseif($comment4!=''){
                            ?>
                              <div class="col-sm-6 " style="margin-top:25px;margin-right: 0px;">
                              <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <center> <strong><?php echo $comment4 ;?></strong> </center>
                              </div>
                              </div>
                            <?php
                              }
                            ?>
                        </form>
                      </td>
                    </tr>

                  </table>
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
        <?php mysql_close($connection); ?>
      </body>
      </html>
