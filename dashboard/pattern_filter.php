<?php
require_once('../core/configuration.php');
require_once('../session.php');
$name = mysql_result(mysql_query("SELECT name FROM exe_manager WHERE uid='$uid'"),0);
$dis = mysql_query("SELECT dis_id,dis_name FROM district ");
while ($row=mysql_fetch_array($dis)) {
  $disname[]=$row[1];
  
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
          <li class="divider"></li>
          <li> <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li> <a href="dashboard.php"><i class="fa fa-fw fa-desktop"></i> Sales Insights </a> </li>
        <li class="active"> <a href=""><i class="fa fa-fw fa-tasks"></i> Sales Patterns </a> </li>
        <li> <a href="product.php"><i class="fa fa-fw fa-shopping-cart"></i> Products </a> </li>
        <li> <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile </a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </nav>
  <div id="page-wrapper" >
    <div class="container-fluid" style="margin-bottom: 20px;"> 
      
      <!-- Page Heading -->
      <?php 
        $sdate_error=$edate_error=$stime_error=$etime_error='';
        $startdate=$enddate=$starttime=$endtime=$agerange=$district='';

        if (isset($_POST['generate'])) {
          if (empty($_POST['startdate'])) {
            $sdate_error='Start date is required.';
          }
          if (empty($_POST['enddate'])) {
            $edate_error='End date is required.';
          }
          if (empty($_POST['starttime'])) {
            $stime_error='Start time is required.';
          }
          if (empty($_POST['endtime'])) {
            $etime_error='End time is required.';
          }
        }

      ?>

      <?php
        if(isset($_POST['generate'])) {
          if(!empty($_POST['startdate']) && !empty($_POST['enddate']) && !empty($_POST['starttime']) && !empty($_POST['endtime'])){
            $startdate=$_POST['startdate'];
            if ($startdate<=$_POST['enddate']) {
              $enddate=$_POST['enddate'];
            }else{
              $edate_error='Invalid input. Please enter the correct date.';
            }
            $starttime=$_POST['starttime'];
            if ($startdate==$enddate && $starttime>=$_POST['endtime']) {
               $etime_error='Invalid input. Please enter the correct time.';
            }else{
               $endtime=$_POST['endtime'];
            }

            $agerange=$_POST['age'];

            $district=$_POST['district'];

            $filename='filterData.csv';

            $output=fopen($filename, "w");

            $header=array('start date','end date','starttime','endtime','age range','district');

            fputcsv($output, $header);

            $filtering_data=array(array($startdate ,$enddate,$starttime,$endtime,$agerange,$district));

            foreach ($filtering_data as $row) {
              fputcsv($output, $row);
            }

            fclose($output); 

            //header('Location: http://localhost/CS-project/dashboard/dashboard.php');
          }
        }
      ?>

      <form action="" method="post">
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
                <div class="form-group">
                <div class='input-group date' >
                    <input type='text' id='startdate' name="startdate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <?php
                //error message reporting
                if($sdate_error!=''){
                ?>
                <div class="col-sm-12" style="margin-top:5px;">
                  <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $sdate_error ;?></strong>
                    </div>
                </div>
                <?php
                }else{
                ?>
                  <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $sdate_error ;?></span></div>
                <?php
                }
                ?>

            </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>End Date : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <div class="form-group">
                <div class='input-group date'>
                    <input type='text' id='enddate' name="enddate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                
                 <?php
                //error message reporting
                if($edate_error!=''){
                ?>
                <div class="col-sm-12" style="margin-top:5px;">
                  <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $edate_error ;?></strong>
                    </div>
                </div>
                <?php
                }else{
                ?>
                  <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $edate_error ;?></span></div>
                <?php
                }
                ?>

               </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>Start Time : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <div class="form-group">
                <div class="input-group bootstrap-timepicker timepicker">
                  <input id="starttime" type="text" name="starttime" class="form-control input-small">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
               </div>

                <?php
                //error message reporting
                if($stime_error!=''){
                ?>
                <div class="col-sm-12" style="margin-top:5px;">
                  <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $stime_error ;?></strong>
                    </div>
                </div>
                <?php
                }else{
                ?>
                  <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $stime_error ;?></span></div>
                <?php
                }
                ?>

               </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" style="text-align: right">
                <h3>End Time : </h3>
              </div>
              <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
                <div class="form-group">
                <div class="input-group bootstrap-timepicker timepicker">
                  <input id="endtime" type="text" name="endtime" class="form-control input-small" >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>

                <?php
                //error message reporting
                if($etime_error!=''){
                ?>
                <div class="col-sm-12" style="margin-top:5px;">
                  <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $etime_error ;?></strong>
                    </div>
                </div>
                <?php
                }else{
                ?>
                  <div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $etime_error ;?></span></div>
                <?php
                }
                ?>

               </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div> 

      <hr>

      <div class="row">
      <div class="col-lg-12">
        <h3> Add Filters</h3>
        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6" style="text-align: right">
            <h3>Age : </h3>
          </div>
          <div class="col-lg-6" style="text-align: left;margin-top: 15px;">
            <select class="selectpicker" data-live-search="true" name="age">
              <option>--Select age range--</option>
              <option>Under 18</option>
              <option>18 - 25</option>
              <option>26 - 30</option>
              <option>31 - 35</option>
              <option>36 - 40</option>
              <option>41 - 50</option>
              <option>51 - 60</option>
              <option>61 or above</option>
            </select>
          </div>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6" style="text-align: right">
            <h3>District : </h3>
          </div>
          <div class="col-lg-6" style="text-align: left; margin-top: 15px;">
            <select class="selectpicker" data-live-search="true" name="district">
              <option>--Select district--</option>
               <?php

              for ($i=0; $i <sizeof($disname) ; $i++) { 
            
              ?>

                <option><?php echo $disname[$i] ; ?></option>

              <?php

              }

              ?>
            </select>
          </div>
        </div>
        </div>

        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col-lg-12">
          <div class="container">
            <input type="submit" name="generate" value="Filter" class="btn btn-primary">
          </div>
        </div>
      </div>
      </form> 

      </div> 
    </div>

  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.js"></script>
<script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../public/js/jquery-ui.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../public/js/bootstrap-timepicker.js"></script>


<script>

$( function() {
    $( "#startdate" ).datepicker();
    $( "#enddate" ).datepicker();
    $('#starttime').timepicker(); 
    $('#endtime').timepicker();
  } );

</script>

<?php mysql_close($connection); ?>

</body>
</html>
