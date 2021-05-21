<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/transfer.css">    
  </head>
  <body>

    <div class="top-container">
      <nav class="navbar"> 
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
    <?php
      $sender_name=$_GET["name"];
      $sender_acc=$_GET["acc"];
      $sender_bal=$_GET["bal"];
    ?>

    <h1>Money Transfer</h1>
    <form action='submit.php' method='post'>
      <div class='container'>
      <div class='row'>
        <div class='col-md'>
           <table class='table1'>
            <tr>
              <th>Sender Details</th><th></th>
            </tr>
            <tr>
              <td><label class='table-item'>Name:</label></td><td><input type='text' name="sendname"value='<?php echo $sender_name ?>' readonly></td>
            </tr>
            <tr>
              <td><label class='table-item'>Account Number:</label></td><td><input type='text'name="sendacc" value='<?php echo $sender_acc ?>' readonly></td>
            </tr>
          </table>
        </div>
        <div class='col-md'>
          <table class='table2'>
            <tr>
              <th>Receiver Details</th><th></th>
            </tr>
            <tr>
              <td><label class='table-item'>Name:</label></td><td><input type='text' class='input' name='receiver_name' placeholder="Enter Name"></td>
            </tr>
            <tr>
              <td><label class='table-item'>Account Number:</label></td><td><input type='text' class='input' name='receiver_acc' placeholder="Enter Account Number"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class='amt'>
        <label for="amt" class='amt-label'>Amount</label>
        <input class='amt-input' type="text" name="amt" placeholder="Enter Amount in Rs.">
      </div>
      <input type="submit" name="submit" class="btn btn-lg btn-outline-primary" value="Transfer">
      <!--<button type="submit" name='submit' class="btn btn-lg btn-outline-primary">Transfer</button>-->
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
