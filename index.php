<?php

include("crud.php");
$crud = new crud();
// $tbl = $crud->tables();

if(isset($_POST['submit'])){
  if($_POST['password'] != "spc@2017"){
    echo "<script>alert('Wrong Password');</script>";
    // exit();
    // header("Location: index.php");
    echo "<script>document.location.href='index.php';</script>";

  }
  else{
    $test = $_POST['testname'];
    $table = "attendance";
    // $date = $_POST['password'];

    // echo $time;
    // $datetime = $date." ".$time;
    // echo $datetime."<br>";
    // echo $batch."<br>";
    // echo $date."<br>";


    $data = $crud->data($test,$table);

    if(!sizeof($data)){
        echo "<script>alert('No Records Found');</script>";

    }

    else{
        // download Excel

        // print_r($data);


        // print your data here. note the following:
        // - cells/columns are separated by tabs ("\t")
        // - rows are separated by newlines ("\n")

        // for example:
        echo 'Student ID' . "\t" . 'Batch' . "\t" . 'Date-Time' . "\n";




        for($j=0; $j<sizeof($data); $j++){
            // echo $data[$j]['FirstName']."<br>";
            echo $data[$j]['student_id'] . "\t" . $data[$j]['batch'] . "\t" . $data[$j]['timestamp'] . "\n";
        }
        header( "Content-Type: application/vnd.ms-excel" );
        header( "Content-disposition: attachment; filename=".$test.".xls" );
        // $file = readfile($test.".xls");
        // echo $file;
        exit();
    }

  }
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SPC | Attendance</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/jquery.datetimepicker.css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <!-- <link rel="stylesheet" href="assets/css/datepicker.css"> -->
        <script src="bower_components/jquery/jquery.min.js"></script>
        <!-- <script src="assets/js/jquery.datetimepicker.js"></script> -->

        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">







    </head>

    <body>

		<!-- Top menu -->


        <!-- Top content -->
        <div class="top-content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>SPC Attendance System</h1>
                        <!-- <div class="description">
                       	    <p>
                                This is a free responsive Bootstrap form wizard.
                                Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            </p>
                        </div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">


                    	<form role="form" action="index.php" method="post" class="f1">


                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <!-- <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div> -->
                    			</div>


                    		    <!-- <div class="f1-step" style="text-align: center;">
                    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                    				<p>social</p>
                    			</div> -->
                    		</div>

                    		<fieldset>
                    			<div class="form-group">
                    			    <label class="" for="f1-first-name">Test Name:</label>
                                    <input type="text" name="testname" placeholder="Test Name..." class="f1-first-name form-control"/>
                          </div>




                          <div class="form-group">
                              <label class="" for="f1-first-name">Password:</label>
                              <input type='password' name="password" class="f1-first-name form-control" placeholder="Enter Password..."/>
                          </div>



                          <div class="f1-buttons">
                              <button type="submit" name="submit" class="btn btn-next">Download!</button>
                          </div>

                        </fieldset>
                    	</form>
                    </div>
                </div>

            </div>
        </div>


        <!-- Javascript -->

        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <!-- <script src="assets/js/retina-1.1.0.min.js"></script> -->
        <script src="assets/js/scripts.js"></script>



    </body>

</html>
