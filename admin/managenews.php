<?php include("header.php");
 $conds = "";
 if(isset($_GET)){
    if(!empty($_GET["edit"])){
        $seledit = "select * from news where id ='".$_GET["edit"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        $row = mysqli_fetch_array($qredit);   
        
        $conds= " and id <> '".$_GET["edit"]."'";
    }
    elseif(!empty($_GET["del"]))
    {
        $seledit = "delete from news where id ='".$_GET["del"]."'";
        $qredit = mysqli_query($conf,$seledit) or die(mysqli_error($conf));
        if(mysqli_affected_rows($conf) > 0)
         echo alert("success","Done" ,"The user deleted successfuly");
         else
         echo alert("error","Fatal Error" ,"You cannot delete all users ");
    }
 }
?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        height: 400,
        menubar: true,
        plugins: [
            'fullpage advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks advcode fullscreen',
            'insertdatetime media table contextmenu'
        ],
        toolbar: 'code fullpage',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css']
        });
</script>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">News </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Manage News
                                </div>
                                <div class="panel-body">
                                    <div class="row">
            <?php 
                if(isset($_POST["btn_submit"])) {
                    extract($_POST);
          
                    // Define upload directory and allowed file types
                        $uploadDir = "../uploads/";
                        $storeploadDir = "uploads/";
                        $allowedTypes = array("jpg", "jpeg", "png", "gif");
                        $is_upload = 0;
                        $done_uploading = 0;
                        $targetPath ="";
                    // Get form input
                        $ntitle = clean_value_dashboard($conf,$_POST["ntitle"]);
                        $ndesc = clean_value_dashboard($conf,$_POST["ndesc"]);
                        $ndetails = clean_value_dashboard($conf,$_POST["ndetails"]);
                   
                        if($_FILES["nphoto"]["name"]){
                            $nphoto = $_FILES["nphoto"]["name"];
                            $fileType = strtolower(pathinfo($nphoto, PATHINFO_EXTENSION));    
                            if (in_array($fileType, $allowedTypes)) {
                                // Generate a unique file name
                                $fileName = uniqid() . "." . $fileType;
                                $targetPath = $uploadDir . $fileName;
                                $targetPathwthoutdash = $storeploadDir . $fileName;
                                move_uploaded_file($_FILES["nphoto"]["tmp_name"], $targetPath);
                                } else {
                                    echo "Invalid file type. Allowed types: " . implode(", ", $allowedTypes);
                                }
                            $is_upload = 1;
                        }
               
                        if(empty($_GET["edit"]))
                       {
                             
                        // Validate input (you may add more validation)
                            if (empty($ntitle) || empty($ndetails) || empty($_FILES["nphoto"]["name"])) {
             
                                echo alert("error","Fatal Error" ,"All fields are required ");
                            } 
                            else {
                                 
                           if($is_upload == 1){
                            // Check if the file type is allowed
                                $qr = "INSERT INTO news (ntitle, ndesc,ndetails, nphoto) VALUES ('$ntitle','$ndesc', '".$ndetails."', '$targetPathwthoutdash')";

                            }
                            else{
                                $qr = "INSERT INTO news (ntitle, ndesc,ndetails) VALUES ('$ntitle', '$ndesc', '".$ndetails."')";
                            }
                        }

                        }
                        else // edit moad 
                        {

                            // Check if the file type is allowed
                            if($is_upload == 1){
                                $qr =  "UPDATE `news` SET 
                                        `ntitle` = '".clean_value($conf,$ntitle)."',
                                        `ndesc` = '".clean_value($conf,$ndesc)."',
                                        `ndetails` = '".  $ndetails ."',
                                        `nphoto` = '".$targetPathwthoutdash."' 
                                        WHERE id = '".$_GET["edit"]."'";
                          }
                          else{
                            $qr =  "UPDATE `news` SET 
                            `ntitle` = '".clean_value($conf,$ntitle)."',
                            `ndesc` = '".clean_value($conf,$ndesc)."',
                            `ndetails` = '". $ndetails ."'  
                             WHERE id = '".$_GET["edit"]."'";
                          }
                        }
               
                            $ins = mysqli_query($conf,$qr) or die(mysqli_error($conf));
                        if ($ins) {
                            
                             echo alert("success","Success" ," New addedd Successfuly");
                        }
                    }      
                 ?>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                              <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" value="<?=isset($_GET["edit"])? $row["ntitle"]:""?>"   class="form-control" placeholder="Enter the news title" name="ntitle">
                                                 </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" value="<?=isset($_GET["edit"])? $row["ndesc"]:""?>" class="form-control" placeholder="Enter Description" name="ndesc">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>News Details</label>
                                                    <textarea class="form-control" placeholder="News Details"   name="ndetails"><?=isset($_GET["edit"])? $row["ndetails"]:""?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Photo</label>
                                                    <input type="file"  class="form-control" placeholder="Upload Photo" name="nphoto">
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
                            <h1 class="page-header">View News </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                      
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    View News
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php 
                                            $sel = "select * from news order by id desc";
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
                                                    <td><img src="../<?=$rows["nphoto"]?>" width="150" /></td>
                                                    <td><?=$rows["ntitle"]?></td>
                                                    <td><?=$rows["ndesc"]?></td>
                                                    <td><?=$rows["ndate"]?></td>
                                                     <td><a href="managenews.php?edit=<?=$rows["id"]?>">Edit</a></td>
                                                    <td><a href="managenews.php?del=<?=$rows["id"]?>">Delete</a></td>
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