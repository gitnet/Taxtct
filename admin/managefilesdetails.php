<?php include("header.php");
 $conds = "";
 if(isset($_GET)){
    if(!empty($_GET["edit"])){
        $seledit = "select * from file_details where fd_code ='".$_GET["edit"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        $row = mysqli_fetch_array($qredit);   
        
        $conds= " and fd_code <> '".$_GET["edit"]."'";
    }
    
 }
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Files Details</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Manage Files Details
                                </div>
                                <div class="panel-body">
                                    <div class="row">
            <?php 
                if(isset($_POST["btn_submit"])) {
                    extract($_POST);
                    //echo $conds; exit;
                    if(empty($_GET["edit"])){
                            $ins = mysqli_query($conf, "INSERT INTO `file_details`(`file_id` ,
                                            `comment`   )
                                    VALUES ('".clean_value($conf,$file_id)."', 
                                                '".clean_value($conf,$comment)."'  )") or die(mysqli_error($conf));
                                      }
                                else // edit moad 
                                {
                                    $ins = mysqli_query($conf, "UPDATE `file_details` SET 
                                                `file_id` = '".clean_value($conf,$file_id)."',
                                                `comment` = '".clean_value($conf,$comment)."'  

                                                WHERE fd_code = '".$_GET["edit"]."'" ) or die(mysqli_error($conf));
                                }

                                if ($ins) {
                                    echo alert("success","Success" , "The File saved successfuly");
                                  }
                          
                                  }      ?>
                                    <form role="form" method="post">
                                        <div class="col-lg-6">
                                              <div class="form-group">
                                                    <label>Tax Registration Number</label>
                                                    <select class="form-control" id="file_id" name="file_id">
                                                        <?php
                                                           $sellist = "select * from files ";
                                                           $qrlist = mysqli_query($conf,$sellist) or die(mysqli_error($conf));
                                                            while ($rowlist =  mysqli_fetch_array($qrlist)) { ?>
                                                                <option value="<?= $rowlist["f_code"] ?>"  <?=isset($_GET["edit"]) && $rowlist["f_code"] == $row["file_id"]? "selected=selected":""?>><?= $rowlist["taxreg"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                 </div>
 
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <textarea class="form-control" placeholder="Enter comment"  name="comment"><?=isset($_GET["edit"])? $row["comment"]:""?></textarea>
                                                </div>
                                                
                                                <button type="submit" name="btn_submit" class="btn btn-primary">Save</button>
                                           </div>
                                         </form>
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">View Files </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                      
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    View Users
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php 
                                            $sel = "select * from file_details,files where file_id = f_code ";
                                            $qr = mysqli_query($conf,$sel) or die(mysqli_error($conf));
                                        ?>
                                        <table id="dataTables-example" class="table">
                                            <thead>
                                                    <th>Tax Reg Number</th>
                                                    <th>Enter date </th>
                                                    <th>Comment</th>
                                                    <th>Opt</th>
                                             </thead>
                                            <tbody>
                                            <?php 
                                                while($rows = mysqli_fetch_array($qr)){
                                            ?>
                                                <tr>
                                                    <td><?=$rows["taxreg"]?></td>
                                                    <td><?=$rows["enterdate"]?></td>
                                                    <td><?=$rows["comment"]?></td>
                                                     <td><a href="managefilesdetails.php?edit=<?=$rows["fd_code"]?>">Edit</a></td>
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