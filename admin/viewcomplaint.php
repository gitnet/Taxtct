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
                            <h1 class="page-header">View Complaints </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                      
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    View Complaints
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php 
                                            $sel = "select * from complaint order by id desc";
                                            $qr = mysqli_query($conf,$sel) or die(mysqli_error($conf));
                                        ?>
                                        <table id="dataTables-example" class="table">
                                            <thead>
                                                    <th>First name</th>
                                                    <th>Last Name</th>
                                                    <th>email</th>
                                                    <th>Employee Name </th>
                                                    <th>Message </th>
                                                    
                                                    <th>Opt</th>
                                             </thead>
                                            <tbody>
                                            <?php 
                                                while($rows = mysqli_fetch_array($qr)){
                                            ?>
                                                <tr>
                                                    <td><?=$rows["firstname"]?></td>
                                                    <td><?=$rows["lastname"]?></td>
                                                    <td><?=$rows["email"]?></td>
                                                    <td><?=$rows["empname"]?></td>
                                                    <td><?=$rows["message"]?></td>
                                                    <td><a href="viewcomplaint.php?edit=<?=$rows["id"]?>">Edit</a></td>
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