<?php include("header.php");
 $conds = "";
 if(isset($_GET)){
    if(!empty($_GET["edit"])){
        $seledit = "select * from users where User_code ='".$_GET["edit"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        $row = mysqli_fetch_array($qredit);   
        
        $conds= " and User_code <> '".$_GET["edit"]."'";
    }
    elseif(!empty($_GET["del"]))
    {
        $seledit = "delete from users where User_code ='".$_GET["del"]."' and User_code<> '1'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        if(mysqli_affected_rows($conf) > 0)
         echo alert("success","Done" ,"The user deleted successfuly");
         else
         echo alert("error","Fatal Error" ,"You cannot delete all users ");
    }
 }
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Users</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Manage Users
                                </div>
                                <div class="panel-body">
                                    <div class="row">
            <?php 
                if(isset($_POST["btn_submit"])) {
                    extract($_POST);
                    //echo $conds; exit;
                    if(redundancy_where_value_s($conf , "users" , "(User_email" , clean_value($conf,$User_email) , " OR  Id_no = '".  clean_value($conf,$Id_no) ."') $conds ") > 0 )
                        {
                            echo alert("warning","Warning","The name exist!");
                        }
                    else{
                        
                            $p = md5($User_name);
                            if(empty($_GET["edit"])){
                            $ins = mysqli_query($conf, "INSERT INTO `users`(`User_name` ,
                                            `User_password`  ,
                                                `User_fullname` ,
                                                `User_email` ,
                                                `Id_no` ,
                                                `User_type` ,
                                                `User_country` ,
                                                `User_active`  )
                                    VALUES ('".clean_value($conf,$User_name)."', 
                                                '".clean_value($conf,$p)."' , 
                                                '".clean_value($conf,$User_fullname)."', 
                                                '".clean_value($conf,$User_email)."', 
                                                '".clean_value($conf,$Id_no)."',
                                                '".clean_value($conf,$User_type)."',
                                                '".clean_value($conf,$country)."',
                                                '1'
                                                )") or die(mysqli_error($conf));
                                      }
                                else // edit moad 
                                {
                                    $ins = mysqli_query($conf, "UPDATE `users` SET 
                                                `User_fullname` = '".clean_value($conf,$User_fullname)."',
                                                `User_email` = '".clean_value($conf,$User_email)."',
                                                `Id_no` = '".clean_value($conf,$Id_no)."',
                                                `User_country` = '".clean_value($conf,$country)."' 

                                                WHERE User_code = '".$_GET["edit"]."'" ) or die(mysqli_error($conf));
                                }

                                if ($ins) {
                                    echo alert("success","Success" , "The name saved successfuly");
                                  }
                             }
                                  }      ?>
                                    <form role="form" method="post">
                                        <div class="col-lg-6">
                                              <div class="form-group">
                                                    <label>User name</label>
                                                    <input type="text" value="<?=isset($_GET["edit"])? $row["User_name"]:""?>"   class="form-control" placeholder="User name" name="User_name">
                                                 </div>
                                                <div class="form-group">
                                                    <label>User fullname</label>
                                                    <input type="text" value="<?=isset($_GET["edit"])? $row["User_fullname"]:""?>" class="form-control" placeholder="Enter Fullname" name="User_fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label>User email</label>
                                                    <input class="form-control" placeholder="Enter Email" value="<?=isset($_GET["edit"])? $row["User_email"]:""?>" type="email" name="User_email">
                                                </div>
                                                <div class="form-group">
                                                    <label>ID number</label>
                                                    <input type="number" class="form-control" placeholder="Id number" value="<?=isset($_GET["edit"])? $row["Id_no"]:""?>" name="Id_no">
                                                </div>
                                                <div class="form-group">
                                                    <label>User type</label>
                                                    <p class="form-control">User</p>
                                                    <input type="hidden" name="User_type" value="user"/>
                                                    <!-- <select class="form-control" name="User_type">
                                                        <option value="">Choose</option>
                                                        <option value="admin">admin</option>
                                                        <option value="user">user</option>
                                                    </select> -->
                                                 </div>
                                                <div class="form-group">
                                                    <label>Coutry</label>
                                                    <select class="form-control" id="countries" name="country">
                                                        <?php foreach ($countries as $country) { ?>
                                                            <option value="<?= $country ?>"  <?=isset($_GET["edit"]) && $row["User_country"] == $country? "selected=selected":""?>><?= $country ?></option>
                                                        <?php } ?>
                                                    </select>
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
                            <h1 class="page-header">View Users </h1>
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
                                            $sel = "select * from users where User_active = '1'";
                                            $qr = mysqli_query($conf,$sel) or die(mysqli_error($conf));
                                        ?>
                                        <table id="dataTables-example" class="table">
                                            <thead>
                                                   <th>Username </th>
                                                    <th>Full name</th>
                                                    <th>Email</th>
                                                    <th>ID no</th>
                                                    <th>Country</th>
                                                    <th colspan="2">Opt</th>
                                             </thead>
                                            <tbody>
                                            <?php 
                                                while($rows = mysqli_fetch_array($qr)){
                                            ?>
                                                <tr>
                                                    <td><?=$rows["User_name"]?></td>
                                                    <td><?=$rows["User_fullname"]?></td>
                                                    <td><?=$rows["User_email"]?></td>
                                                    <td><?=$rows["Id_no"]?></td>
                                                    <td><?=$rows["User_country"]?></td>
                                                    <td><a href="manageusers.php?edit=<?=$rows["User_code"]?>">Edit</a></td>
                                                    <td><a href="manageusers.php?del=<?=$rows["User_code"]?>">Delete</a></td>
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