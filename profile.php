<?php 
$pageTitle = 'Profile';
include 'includes/header.php';
include 'includes/sidbar.php';

$id = $_SESSION['id'];
$sql = "SELECT id,name,email,password from users where id = $id";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)){
    while($rows = mysqli_fetch_assoc($result)){
        $name = $rows['name'];
        $email = $rows['email'];
        $oldpassword = $rows['password'];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $oldpassword = $_POST['oldpassword'];

    $query = '';

    $errorForm = array();
    if(empty($name)){
        $errorForm[] = 'Name is required';
    }else{
        $query .= 'name = '.$name.'';
    }
    if(empty($email)){
        $errorForm[] = 'Email is required';
    }else{
        $query .= ',email = '.$email.'';
    }
    if(!empty($password)){
        $password = sha1($password);
        $query .= ',password = '.$password.'';
    }
   
    if(count($errorForm) == 0){
        $sql = "Update users set email='$email', name='$name' where id = $id";
        $result = mysqli_query($con,$sql);
        if($result){
            $msg = 'Updated Successfully';
        }else{
            $msg = 'Error';
        }
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->

            <form action="" method="post">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              
              <div class="card-body">
              <?php if(isset($errorForm) and count($errorForm) > 0){
                        foreach($errorForm as $error){
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger"><?= $error?></div>
                        </div>
                    </div>

                <?php }}?>
                <?php 
                    if(isset($msg) and !empty($msg)){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success"><?= $msg?></div>
                        </div>
                    </div>
                      
                 <?php   }
                            
                ?>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text"  class="form-control name" value="<?php if(isset($name)){echo $name;} ?>" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email"  class="form-control email" value="<?php if(isset($email)){echo $email;} ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control password" name="password">
                    <input type="hidden" name="oldpassword" value="<?php if(isset($oldpassword)) { echo $oldpassword; } ?>">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary submit-btn">Update</button>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->


            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>



<?php 
include 'includes/footer.php';
?>
<!-- <script>
    $(document).on('click','.submit-btn',function(e){
        e.preventDefault();
        var name = $('.name').val();
        if(! name){
            alert('الاسم مطلوب');
        }
    });
</script> -->