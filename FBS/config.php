<?php session_start();

include('database connection.php');

if(isset($_POST['login']));
{
    $user_unsafe=$_POST['user'];
    $pass_unsafe=$_POST['pass'];

    $user = mysqli_real_escape_string($con,$user_unsafe);
    $pass = mysqli_real_escape_string($con,$pass_unsafe);

    $query=mysqli_query($con,"select * from login where user='$user' and pass='$pass'")or die(mysqli_error($con));

    $row=mysqli_fetch_array($query);

         $name=$row['user'];
         $counter=mysqli_num_rows($query);
         $id=$row['id'];

         if ($counter == 0)
         {
            echo "<script type='text/javascript'>alert('Invalid Usrename or Password!');
            document.location='admin.php'</script>";
         }
         else
         {
            $_SESSION['id']=$id;
            $_SESSION['user']=$name;

            echo "<script type='text/javascript'>document.location='userprofile.php'</script>";
         }

}
?>