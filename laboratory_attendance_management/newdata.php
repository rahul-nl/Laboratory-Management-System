
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="in_css.css">
    <title>Logout</title>
    <style>
        table{
            border-collapse:collapse;
            width:100%;
            font-family: monospace;
            font-size:15px;
        }
        td,
th {
    border: 1px solid rgb(190, 190, 190);
    padding: 5px 10px;
}

td {
    text-align: center;
    padding: 5px 10px;
}


.column {
  width:20.33%;
  padding-top: 1px;
  padding-left: 535px;
}

</style>
<!-- <script async src="//jsfiddle.net/7zWB5/1/embed/"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='jquery-3.2.1.min.js'></script>
<script>
    $('input[type="submit"]').click(function(e){
        $(this).closest('tr').remove()
        });
</script>

    
</head>
<body>
    <div class="container">
   
        <!-- <div class="jumbotron"> -->

            <div class="row" >
                <!-- <div class="col-md-20"> -->
                    <h3>Log-Out</h3>
                <!-- </div> -->
            </div>
            <a href="index.php" class="button1" >Log In</a>
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'rf_data');

                $query = "SELECT * FROM master_table";
                $query_run = mysqli_query($connection, $query);
            ?>

            <div class="row">
            <div class="column">
                <!-- <div class="col-md-12"> -->
                    <!-- <table class="table table-bordered" style="background-color: white;"> -->
                        
                        <table width=100% height=100% bordercolor=blue style="background-color: white;>
                        <thead class="table-dark">
                            <tr>
                                <th> USN </th>
                            </tr>
                        </thead>
                        <tbody>
                                        
                        <?php
                        if($query_run)
                        {
                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>
                                    <tr>
                                        <td> <?php echo $row['USN']; ?> </td>
  
                                 
                                        <th> 
                                            <form action="delect.php" method="post">
                                                <input type="hidden" name="usn" value="<?php echo $row['USN'] ?>">
                                                <input type="submit" name="logout" class="btn1" value="Logout"> 
                                            </form>
                                        </th>
                                    </tr>
                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>    
                                        <th colspan="6"> No Record Found </th>
                                    </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            <!-- </div> -->

        </div>
    </div>
</body>
</html>
