<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login page</title>
  </head>

  <body>
  
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $showerror=false;
        $showlogin=false;
      // Submit these to a database

      // Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_management";
// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{ 
  // Submit these to a database
  // Sql query to be executed 
  
  $sql = "SELECT * from admin WHERE emailid='$email' AND password='$pass' ";
  $result = mysqli_query($conn, $sql);
  $num=mysqli_num_rows($result);
 
  
  if($num==1){
  $showlogin=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$name;
    header("location: SearchUser.php");

  }
  else{
    $showerror=true;
  }

  if($showlogin==true){
    echo '<div class="alert alert-success alert-dismissible" role="alert">
    <strong>Success!</strong> You are successfully LOGGED IN ! And we are happy to inform that your account is LOGGED IN!
  </div>';
  }
  if($showerror==true){
      // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
    <strong>Error!</strong> INVALID CREDENTIALS ! We regret to inform account NOT LOGGED IN!
  </div>';
  }



}
    }

    
?>

  <div align="center" class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div >
      <img class="mx-auto h-12 w-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZhoF76o9Tz2M1UynYnEl8203DGbK_isGM4A&usqp=CAU" 
      alt="Workflow" width="250" align="center"
     height="250" hspace="20" vspace="20">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your Employee management system</h2>
      
    </div>
    
    <form class="mt-8 space-y-6" action="/employeesystem/login.php" method="POST">
      <input type="hidden" name="remember" value="true">
      <table cellpadding="10">
      <tr><div class="rounded-md shadow-sm -space-y-px">
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
      </table>
    <br><br>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Sign in
        </button>
      </div>
      
    </form>
    
  </div>
</div>
  
  </body>
  </html>