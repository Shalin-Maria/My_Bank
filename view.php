<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
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
    <h1>View Customer</h1>
    <table>
      <th>Name</th>
      <th>Email</th>
      <th>Account Number</th>
      <th>Current Balance</th>

      <?php

        $name=$_GET["name"];
        $conn = new mysqli("localhost", "root", "", "mybank");
        if($conn->connect_error)
        {
          die("Connection failed: " .  $conn->connect_error);
        }
        else
        {
            $sql = "SELECT * FROM customers where name='".$name."'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                  echo "
                  <form action='transfer.php' method='get'>
                    <tr>
                      <td><input type='text' class='name' name='name' value='".$row["name"]."' readonly></td>
                      <td><input type='text' class='name' name='acc' value='".$row["email"]."' readonly></td>
                      <td><input type='text' class='name' name='acc' value='".$row["accno"]."' readonly></td>
                      <td><input type='text' class='name' name='bal' value='".$row["balance"]."' readonly></td>
                    </tr>
                    </table>
                    <button type=".'submit'." class=".'btn btn-lg btn-outline-primary'.">Transfer Money</button>
                  </form>
                    ";
              }
            }
        }
       ?>

    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
