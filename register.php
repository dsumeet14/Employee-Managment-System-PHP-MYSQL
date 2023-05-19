


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registration page</title>
  </head>

  <body>
  
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $id=$_POST['EM_id'];  
      $name = $_POST['name'];
      $dept=$_POST['dept'];
      $phn=$_POST['phn'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
      $showalert=false;
      $showerror=false;
      // Submit these to a database

      // Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_management";
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $existSql = "SELECT * FROM `employee` WHERE email = '$email'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        echo "Email ID Already Exists";
        $showerror=true;
    }
    else{
        if($pass==$cpass){
        $sql = "INSERT INTO `employee` (`id`, `name`, `department`, `Phone no.`, `Email`, `Password`) VALUES ('$id', '$name', '$dept', '$phn','$email', '$pass');";
        $result = mysqli_query($conn, $sql);
        $showalert=true;
      }
      else
      {
        echo "BOTH PASSWORDS DOES NOT MATCH !";
        $showerror=true;
      }
    }
        if($showalert==true){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully! And we are happy to inform that your account is made!
        </div>';
        }
        if($showerror==true){
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We regret to inform account not made!
        </div>';
        }
      
      

    }

} 

?>

  <div align="center" class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div >
      <img class="mx-auto h-12 w-auto" src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" 
      alt="Workflow" width="200" 
     height="200">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Register your account</h2>
      
    </div>
    <form class="mt-8 space-y-6" action="/employeesystem/register.php" method="POST" >
      <input type="hidden" name="remember" value="true">
      <table cellpadding="10">
      <div class="rounded-md shadow-sm -space-x-0" >
        <tr><div>
          <td><label for="EmployeeId" class="sr-only">Employee ID</label></td>
          <td><input id="EM_id" name="EM_id" type="text" autocomplete="ID" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Employee ID"></td>
        </div>
        </tr>
      <tr><div>
          <td><label for="Name" class="sr-only">Name</label></td>
          <td><input id="name" name="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="User Name"></td>
        </div>
        </tr>
        <tr>
        <div>
          <td><label for="department" class="sr-only">Department</label></td>
          <td><input id="dept" name="dept" type="text" autocomplete="Department" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Department"></td>
        </div>
        </tr>
        <tr>
        <div>
          <td><label for="Phone" class="sr-only">Phone</label></td>
          <td><input id="phn" name="phn" pattern="[0-9]{10}" type="tel" autocomplete="000000000000" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone No."></td>
        </div>
        </tr>
        <tr>
        <div>
          <td><label for="email" class="sr-only">Email address</label></td>
          <td><input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address"></td>
        </div>
        </tr>
        <tr>
        <div>
          <td><label for="pass" class="sr-only">Password</label></td>
          <td><input id="pass" name="pass" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password"></td>
        </div>
      </div> 
      </tr>
      <tr>
      <div>
          <td><label for="cpass" class="sr-only">Confirm Password</label></td>
          <td><input id="cpass" name="cpass" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirm Password"></td>
        </div>
        </tr>
      </div> 
      
      </table>
<br>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Register
        </button>
      </div>
    </form>
    <br>
      <div class="text-sm">
          <a href="./SearchUser.php" class="font-medium text-indigo-600 hover:text-indigo-500">Search User? </a>
        </div>
        <br>
      <div class="text-sm">
          <a href="./logout.php" class="font-medium text-indigo-600 hover:text-indigo-500">Sign out? </a>
        </div>
      </div>
      </div>

  </div>
</div>
  
  </body>
  </html>