


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Forgot Password</title>
  </head>

  <body>
 
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
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
  
  $query = "SELECT * FROM `employee` WHERE `name` LIKE '%$name%' ";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">id</font> </td> 
          <td> <font face="Arial">name</font> </td> 
          <td> <font face="Arial">dept</font> </td> 
          <td> <font face="Arial">phn</font> </td> 
          <td> <font face="Arial">email</font> </td> 
          <td> <font face="Arial">pass</font> </td> 

      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $dept = $row["department"];
        $phn = $row["Phone no."];
        $email = $row["Email"]; 
        $pass = $row["Password"]; 


        echo '<tr> 
                  <td>'.$id.'</td> 
                  <td>'.$name.'</td> 
                  <td>'.$dept.'</td> 
                  <td>'.$phn.'</td> 
                  <td>'.$email.'</td> 
                  <td>'.$pass.'</td> 

              </tr>';
    }
    $result->free();
} 



  if($showlogin==true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account successfully Found !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
  }
  if($showerror==true){
      // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> INVALID CREDENTIALS ! We regret to inform account NOT Found!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
  }



}
    }

    
?>

  <div  align="center" class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div >
      <img class="mx-auto h-12 w-auto" src="https://png.pngtree.com/png-vector/20191003/ourmid/pngtree-user-login-or-authenticate-icon-on-gray-background-flat-icon-ve-png-image_1786166.jpg" 
      alt="Workflow" width="200" 
     height="200">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Search For User</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
       
      </p>
    </div>
    <form class="mt-8 space-y-6" action="/employeesystem/SearchUser.php" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Name</label>
          <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
        </div>
      </div> 
    <br><br>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Get User Details
        </button>
      </div>
    </form>
    <br><br>
      <div class="text-sm">
          <a href="./register.php" class="font-medium text-indigo-600 hover:text-indigo-500">Register New User </a>
        </div>
      </div>
      <br>
      <div class="text-sm">
          <a href="./logout.php" class="font-medium text-indigo-600 hover:text-indigo-500">Sign out? </a>
        </div>
      </div>
            
      </div>
<br>
  </div>
</div>
  
  </body>
  </html>