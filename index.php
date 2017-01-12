<?php

include("crud.php");
$crud = new crud();
$tbl = $crud->tables();

if(isset($_POST['submit'])){
    $cname = $_POST['cname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $batch = $_POST['batch'];
    // echo $time;
    $datetime = $date." ".$time;
    // echo $datetime."<br>";
    // echo $batch."<br>";
    // echo $date."<br>";


    $data = $crud->data($batch, $datetime, $date);

    if(!sizeof($data)){
        echo "<script>alert('No Records Found');</script>";
    }

    else{
        // download Excel


        header( "Content-Type: application/vnd.ms-excel" );
        header( "Content-disposition: attachment; filename=".$cname.".xls" );
    
        // print your data here. note the following:
        // - cells/columns are separated by tabs ("\t")
        // - rows are separated by newlines ("\n")
        
        // for example:
        echo 'Student ID' . "\t" . 'Attendance' . "\n";
        



        for($j=0; $j<sizeof($data); $j++){
            // echo $data[$j]['FirstName']."<br>";
            echo $data[$j]['FirstName'] . "\t" . 'P' . "\n";
        }

        exit();
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
        <link rel="stylesheet" href="assets/css/datepicker.css">
        <script src="bower_components/jquery/jquery.min.js"></script>
        <script src="assets/js/jquery.datetimepicker.js"></script>

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
                    			    <label class="" for="f1-first-name">Company Name:</label>
                                    <input type="text" name="cname" placeholder="Company Name..." class="f1-first-name form-control" id="f1-first-name">
                                </div>


                                <div class="form-group">
                                    <label class="" for="f1-first-name">Select Batch:</label>
                                    <select class="form-control" name="batch">
                                    <?php  

                                    

                                        for($i=0; $i<sizeof($tbl); $i++) {
                                            echo "<option value='".$tbl[$i]['table_name']."'>".$tbl[$i]['table_name']."</option>";
                                        }
                                      
                                            // print_r($data[1]['table_name']);

                                      ?>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <div class='input-group date' id=''>
                                        <label class="" for="f1-first-name">Enter Date: (eg: YYYY-MM-DD)</label>
                                        <input type='text' name="date" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class='input-group date' id=''>
                                        <label class="" for="f1-first-name">Enter start time: (eg: 13:15:00)
                                        <input type='text' name="time" class="form-control" /></label>

                                        <!-- <label class="" for="f1-first-name">Enter End time: (eg: 15:30:00) -->
                                        <!-- <input type='text' name="etime" class="form-control" /></label> -->
                                    </div>
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="submit" name="submit" class="btn btn-next">Submit</button>
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
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        

    </body>

</html>