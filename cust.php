<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/customer.css">
  </head>
  <body>
    <div class="top-container">
      <nav class="navbar ">
        <a href="index.html" class="navbar-brand-lg">
          My Bank
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="cust.php">View Customers</a>
          </li>    
        </ul>
      </nav>
    </div>
    <h1>Customers List</h1>
    <div class="middle-container">
    <table class="table table-hover "><!-- so basically what the table tag does is...it arranges things in a table fashion so everything looks good-->
      <thead class="thead-dark">
      <tr><!-- this creates a single row in table-->
        <th scope="col" class='head-item'>SL. No.</th>
        <th scope="col" class='head-item'>Name</th><!--this makes a table heading-->
        <th scope="col" class='head-item'>Operation</th>
      </tr>
    </thead>
    <tbody>
      <?php //this is where a php code starts, the browser will know its php because of this tag right here
        $servername = "localhost";//we r working on a localhost so tthis is server name, when we host our site, our server name will change
        $username = "root";//this is the user name and pwd to connect to server(by default)
        $password = "";
        $dbname ="mybank";//this is ur db name
        $conn = new mysqli($servername, $username, $password, $dbname);//this is the line where we connect to the server, thats why we have written conn as variable name, signifying connection to server.
        if($conn->connect_error)//incase if the connection fails, like server is off or somehow connection wasnt made, then this if will execute
        {
          die("Connection failed: " .  $conn->connect_error);
        }
        else // if connection is success then this will execute
        {
          $sql = "SELECT * FROM customers";//this is the sql line...normal sql line which works on a mysql db..u know it
          $result = mysqli_query($conn,$sql);//this line is basically creating a whole list of items in the db that satisfy our sql statement
          if(mysqli_num_rows($result) > 0)//we r checking if there r any rows that we have retireved, like sometimes the db could be empty or maybe the data doesnt satisfy the sql conditions, that time no data will be retrieved na....so thats why we r checking if the result list has atleast 1 element by >0 condition
          {
          //if it enters this block, that means some data has been retrieved now lets print it onto the webpage
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {

              //since there could be more than one element retrieved we'll use while loop to print it
                echo "
                <form action='view.php' method='get'>
                  <tr scope=".'row'.">
                    <td>".$i."</td><td><input type='text' class='name' name='name' value='".$row["name"]."' readonly></td>
                    <td><button type=".'submit'." class=".'btn btn-lg btn-outline-primary'.">View >></button></td>
                  </tr>
                </form>
                  ";
                  $i++;
            }
          }
          else//this will execute when no data is retrieved, u must have figured that out
          {
              echo "<p>No Record found</p>";
          }
        }


      ?>

    </tbody>
    </table>
  </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
