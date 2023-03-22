<?php 
session_start();
require_once "header.php";
?>
<html>
<head>
</head>
<body>

<nav class="navbar" style="background-color: #e3f2fd;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <h5 class="navbar-brand" href="#">
		<?php 
if(isset($_SESSION['username']))
{
	echo "Welcome ".$_SESSION['username'];

?>
		</h5>
		<button type="submit" class="btn btn-primary"><a href="logout.php" style="color:white;">Logout</a></button>
        </div>
      </div>
    </nav>
</nav>
<div class="container">
  <div class="row">
    <div class="col-8 m-auto">

    <h1 class="display-4 text-center" >To Do List</h1>
      <form class="mt-4" action="index_valid.php" method="post">
        <div class="form-group">
          <input class= "form-control form-control-lg" type="text" name="textfield" placeholder="Enter your task"  >

        </div>
        <div class="form-group">
          <input class="btn btn-success btn-block" type="submit" name="addtask" value="Add Task">

        </div>
      </form>
    </div>
  </div>
<!-- ===================== show delete alert message ============= -->
<?php 
  if(isset($_SESSION['delete_success'])) { ?>

<div class="alert alert-warning text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['delete_success'];?>
</div>

<?php
  unset($_SESSION['delete_success']);

}

?>

<!-- ========================== update alert message ==================== -->

<?php 
  if(isset($_SESSION['upadate_success'])) { ?>

<div class="alert alert-warning text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['upadate_success'];?>
</div>



<?php
  unset($_SESSION['upadate_success']);

}

?>

<!-- =================================== table =========================== -->

<table style="width:66%;" class="table table-sm table-borderless table-striped text-center mx-auto mt-3" > 
<thead class="bg-dark text-white text-center">
  <tr>
    <th>Serial</th>
    <th>task</th>
    <th>added date</th>
    <th>added time</th>
    <th>action </th>
  </tr>
</thead>

<?php
require_once "db.php";
$task_show_query = "SELECT * FROM task_table";
$result = $dbcon -> query($task_show_query);
if($result->num_rows!=0){
  $serial = 1;
  foreach ($result as $row) {
    $temp_date_time=(explode(' ',$row['added_tiime']));
    $date = $temp_date_time[0];
    $time = $temp_date_time[1];

?>

<tr>
  <td><?=$serial++?></td>
  <td ><?=$row['task_name'] ?></td>
  <td><?=$date?></td>
  <td><?=$time?></td>


  <td>
  <div class="btn-group">
    <a class="btn btn-sm btn-warning" href="update.php?id=<?php echo base64_encode($row['id']); ?>">update</a>
    <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo base64_encode($row['id']); ?>">delete</a>
    </div>
  </td>
</tr>





<?php



}
}
// ========================== if no data found ========================
else{
?>
  <tr>
  <td colspan="20" class="text-center display-4" >No task</td>
  </tr>
<?php
}
?>


</table>


<?php
}
else
{
	Header("location:login.php");
}
?>
</body>
</html>