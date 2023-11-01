<?php include("header.php");
 $conds = "";
 if(isset($_GET)){
    if(!empty($_GET["edit"])){
        $seledit = "select * from files where f_code ='".$_GET["edit"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        $row = mysqli_fetch_array($qredit);   
        
        $conds= " and f_code <> '".$_GET["edit"]."'";
    }
    
 }
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Files</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Manage Files
                                </div>
                                <div class="panel-body">
                                    <div class="row">
            <?php 
                if(isset($_POST["btn_submit"])) {
                    extract($_POST);
                    //echo $conds; exit;
                    if(redundancy_where_value_s($conf , "files" , "(taxreg" , clean_value($conf,$taxreg) , ") $conds ") > 0 )
                        {
                            echo alert("warning","Warning","The name exist!");
                        }
                    else{
                        
                          if(empty($_GET["edit"])){
                            $ins = mysqli_query($conf, "INSERT INTO `files`(`user_id` ,
                                            `taxreg`  ,
                                                `phone_number` )
                                    VALUES ('".clean_value($conf,$user_id)."', 
                                                '".clean_value($conf,$taxreg)."' , 
                                                '".clean_value($conf,$phone_number)."' )") or die(mysqli_error($conf));
                                      }
                                else // edit moad 
                                {
                                    $ins = mysqli_query($conf, "UPDATE `files` SET 
                                                `user_id` = '".clean_value($conf,$user_id)."',
                                                `taxreg` = '".clean_value($conf,$taxreg)."',
                                                `phone_number` = '".clean_value($conf,$phone_number)."'  

                                                WHERE f_code = '".$_GET["edit"]."'" ) or die(mysqli_error($conf));
                                }

                                if ($ins) {
                                    echo alert("success","Success" , "The File saved successfuly");
                                  }
                             }
                                  }      ?>
                                    <form role="form" method="post">
                                        <div class="col-lg-6">
                                              <div class="form-group">
                                                    <label>User name</label>
                                                    <select class="form-control" id="user_id" name="user_id">
                                                        <?php
                                                           $sellist = "select * from users where User_active ='1'";
                                                           $qrlist = mysqli_query($conf,$sellist) or die(mysqli_error($conf));
                                                            while ($rowlist =  mysqli_fetch_array($qrlist)) { ?>
                                                                <option value="<?= $rowlist["User_code"] ?>"  <?=isset($_GET["edit"]) && $rowlist["User_code"] == $row["user_id"]? "selected=selected":""?>><?= $rowlist["User_fullname"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                 </div>
                                                <div class="form-group">
                                                    <label>Tax Registration Number</label>
                                                    <input type="text" value="<?=isset($_GET["edit"])? $row["taxreg"]:""?>" class="form-control" placeholder="Enter Tax Registration Number" name="taxreg">
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input type="number" class="form-control" placeholder="phone number" value="<?=isset($_GET["edit"])? $row["phone_number"]:""?>" name="phone_number">
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
                                            $sel = "select * from users,files where user_id = User_code and  User_active = '1'";
                                            $qr = mysqli_query($conf,$sel) or die(mysqli_error($conf));
                                        ?>
                                        <table id="dataTables-example" class="table">
                                            <thead>
                                                    <th>Full name</th>
                                                    <th>Tax Number</th>
                                                    <th>Phone</th>
                                                    <th>Country</th>
                                                    <th>Opt</th>
                                             </thead>
                                            <tbody>
                                            <?php 
                                                while($rows = mysqli_fetch_array($qr)){
                                            ?>
                                                <tr>
                                                    <td><?=$rows["User_fullname"]?></td>
                                                    <td><?=$rows["taxreg"]?></td>
                                                    <td><?=$rows["phone_number"]?></td>
                                                    <td><?=$rows["User_country"]?></td>
                                                    <td><a href="managefiles.php?edit=<?=$rows["f_code"]?>">Edit</a></td>
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