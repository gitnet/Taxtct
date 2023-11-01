<?php include("header.php");
 $conds = "";
 if(isset($_GET)){
    if(!empty($_GET["edit"])){
        $seledit = "select * from complaint where f_code ='".$_GET["edit"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        $row = mysqli_fetch_array($qredit);   
        
        $conds= " and id <> '".$_GET["edit"]."'";
    }
    
 }
?>
        <div id="page-wrapper">
                <div class="container-fluid">
             
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">View Ratings </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                      
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    View Ratings
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php 
                                            $sel = "select * from  ratings order by r_id desc";
                                            $qr = mysqli_query($conf,$sel) or die(mysqli_error($conf));
                                        ?>
                                        <table id="dataTables-example" class="table">
                                            <thead>
                                                    <th>email</th>
                                                    <th>review</th>
                                                    <th>rating for service of our office representatives</th>
                                                    <th>rating for its easy to find what you were looking for  </th>
                                                    <th>rating for if its your request been processed </th>
                                                    <th>Date </th>
                                           
                                             </thead>
                                            <tbody>
                                            <?php 
                                                while($rows = mysqli_fetch_array($qr)){
                                            ?>
                                                <tr>
                                                    <td><?=$rows["email"]?></td>
                                                    <td><?=$rows["review"]?></td>
                                                    <td><?=$rows["rate_representatives"]?></td>
                                                    <td><?=$rows["rate_easyfind"]?></td>
                                                    <td><?=$rows["rate_processed"]?></td>
                                                    <td><?=$rows["enter_date"]?></td>
                                                    
                                                  </tr>
                                                 <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

<?php include("footer.php");?>