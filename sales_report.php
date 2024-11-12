<?php

   session_start();

  if(!isset($_SESSION['user_session'])){
    
      header("location:index.php");

  }

?>
<!DOCTYPE html>
<html>
<head>
 <title>WellSide Pharmacy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
  <link rel="stylesheet" type="text/css" href="css/tcal.css">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/facebox.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
    $("a[id*=popup]").facebox({
      loadingImage : 'src/img/loading.gif',
      closeImage   : 'src/img/closelabel.png'
    })
  }) 
    </script>
    <script type="text/javascript" src="js/tcal.js"></script>
    <script type="text/javascript">

      function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}

      
    </script>
    <style>
    body {
      margin: 0;
      /* overflow: hidden; */
    }
    .header {
    text-align: center;           /* Center the text */
    /* padding: 20px;               Add some padding around the text */
    background-color: #1A535C;     /* Set background color to black */
    color: white;                /* Set text color to white for contrast */
    position: relative;           /* Position relative to allow z-index */
    width: 100%;                  /* Full width of the viewport */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Optional shadow for depth */
    z-index: 1000;               /* Ensure it's on top of other elements */
}




    .sidebar {
      width: 250px;
      background-color: #1A535C;
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      transition: width 0.3s;
      overflow: hidden;
    }
    .toggle-btn {
      background-color: #444;
      border: none;
      color: white;
      padding: 10px;
      cursor: pointer;
      width: 100%;
    }
    .menu-items {
      flex: 1;
      display: flex;
      flex-direction: column;
      
      padding-top: 20px;
    }
    .nav {
      list-style: none;
      padding: 0;
      
      margin: 0;
    }
    .nav li {
      padding: 10px;
      
      display: flex;
      align-items: center;
    }
    .nav li a {
      color: white;
      text-decoration: none;
      display: flex;
      margin-left: 1px;
      align-items: center;
      width: 100%;
    }
    .notification .icon-exclamation-sign,
.notification .icon-bell {
  position: relative;
  /* left: 5px;  */
  /* padding-left: px; */
  /* border: 2px white solid; */
}
    .nav li a .icon-large {
      margin-left: 10px;
      /* padding-right: 10px; */
      /* border: 2px white solid; */
    }
    .text, .menu-label {
      display: inline;
      /* border: 2px white solid; */
      padding-left: 20px;
      /* padding-right: 10px; */
      /* padding-left: 50px; */
      transition: opacity 0.3s;
    }
    .sidebar.collapsed {
      width: 80px;
      
    }
    .sidebar.collapsed .icon-large {
      display: none;
      margin-right: 10px;
      /* border: 2px white solid; */
      padding-right: 20px;
    }
    .sidebar.collapsed .text, .sidebar.collapsed .menu-label {
      opacity: 0;
      
    }
    .sidebar.collapsed .nav li {
      padding-left: 20px;
      
    }
    .sidebar.collapsed .nav li a {
      justify-content: center;
      text-align: center;
      
      width: 100%;

    }
    .main-content {
      flex: 1;
      padding: 20px;
      background-color: #f5f5f5;
      margin-top: 60px;
      
    }
    .notification {
        display: flex;
        align-items: center;
        /* border: 2px white solid; */
        /* padding-right: 100px; */
    }
    .icon-exclamation-sign,
    .icon-bell {
        position: relative;
        
        /* left: 20px; Move the icons 5px to the left */
    }
    .badg {
      background-color: red;
        color: white;
        border-radius: 50%;
        font-size: 10px;
        padding:1px 6px 1px 6px;
        margin-left: 1px;
        position: absolute;
        top: 0;
        margin-left: 28px;
        bottom: 9;
    }

    .nav-label, .alert-label, .notification-label {
        color: white;
        padding-left: 10px;
        
    }
    .menu-label {
      /* margin-left: px; */
      font-size: 20px;
    }
    .sidebar ul li a {
        display: flex;
        align-items: center;
        color: white;
        
        text-decoration: none;
        padding: 10px;
    }
    .report-container {
  max-height: 400px; /* Optional: Control max height if table should have its own scroll */
  overflow-y: auto; /* Ensures only this container scrolls for large content */
}

table {
  width: 100%;
  table-layout: fixed;
}
  </style>

  
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const labels = document.querySelectorAll(".text, .menu-label");

      if (sidebar.style.width === "250px" || sidebar.style.width === "") {
        sidebar.style.width = "100px";
        labels.forEach(label => label.style.display = "none");
      } else {
        sidebar.style.width = "250px";
        labels.forEach(label => label.style.display = "inline");
      }
    }
  </script>


     
</head>
<body>
<body style="height: 100%; display: flex; overflow: hidden; ">
  <div class="header" style="margin: 0; position: fixed; font-weight: bold; font-size: 20px; padding: 10px; top: 0; left: 0; right: 0; z-index: 1000;">
    <h1 style="margin: 0; font-family: dancing script;"><b>WellSide Pharmacy</b></h1>
  </div>

  <div class="sidebar" id="sidebar" style="background-color: Light Cyan; width: 250px; transition: width 0.3s;">
    <button id="toggleBtn" onclick="toggleSidebar()" class="toggle-btn">
      <i class="icon-menu" style="font-size: 24px;">&#9776;</i>
      <!-- <span class="menu-label">Menu</span> -->
    </button>

    <div class="menu-items">
      <ul class="nav">
        <li>
          <?php 
          include("dbcon.php");
          $quantity = "5";
          $select_sql1 = "SELECT * FROM stock WHERE remain_quantity <= '$quantity' AND status='Available'";
          $result1 = mysqli_query($con, $select_sql1);
          $row2 = $result1->num_rows;

          if ($row2 == 0) {
            echo '<a href="#" class="notification">
                    <span class="icon-exclamation-sign icon-large"></span>
                    <span class="menu-label">Alert</span>
                  </a>';
          } else {
            echo '<a href="qty_alert.php" class="notification" id="popup">
                    <span class="icon-exclamation-sign icon-large"></span>
                    <span class="menu-label">Alert</span>
                    <span class="badg">'.$row2.'</span>
                  </a>';
          }
          ?>
        </li>

        <li>
          <?php
          $date = date('Y-m-d');    
          $inc_date = date("Y-m-d", strtotime("+6 month", strtotime($date))); 
          $select_sql = "SELECT * FROM stock WHERE expire_date <= '$inc_date' AND status='Available'";
          $result = mysqli_query($con, $select_sql); 
          $row1 = $result->num_rows;

          if ($row1 == 0) {
            echo '<a href="#" class="notification">
                    <span class="icon-bell icon-large"></span>
                    <span class="menu-label">Notification</span>
                  </a>';
          } else {
            echo '<a href="ex_alert.php" class="notification" id="popup">
                    <span class="icon-bell icon-large"></span>
                    <span class="menu-label">Notification</span>
                    <span class="badg">'.$row1.'</span>
                  </a>';
          }
          ?>
        </li>

        <li><a href="home.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-home" style="padding-left: 12px;"></span><span class="text" style="margin-left: 5px;"> Home</span></a></li>
        <li><a href="product/view.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-th" style="padding-left: 12px;"></span><span class="text" style="margin-left: 5px;"> Products</span></a></li>
        <li><a href="backup.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-folder-open" style="padding-left: 12px;"></span><span class="text" style="margin-left: 5px;"> Backup</span></a></li>
        <li><a href="logout.php" class="link"><span class="icon-off text-danger" style="color:red; padding-left: 12px;"></span><span class="text text-danger" style="margin-left: 5px;"> Logout</span></a></li>
      </ul>
    </div>
  </div><!--*****Header******-->

      <div class="container">


    <div class="row">
      <div class="contentheader">

        <h2 style="margin-top: 20px;">Sales Report</h2>
  
      </div><br>
  
  
   <center> <form action="sales_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" method="POST">
  <strong>From : <input type="date" style="width: 223px; padding:14px;" name="d1" class="tcal" autocomplete="off" value="" /> To: <input type="date" style="width: 223px; padding:14px;" name="d2" autocomplete="off" class="tcal" value="" />
   <button class="btn btn-info" style="width: 123px; height:50px; margin-top:-8px;margin-left:8px;" type="submit" name="submit"><i class="icon icon-search icon-large"></i> Search</button>
  </strong>
  </form></center>
  
  <center>
    <div class="alert alert-info" role="alert">
      <small><b>Info:</b> All the downloaded invoices are stored inside the directory " <b>C:/invoices/</b> "</small>
    </div>
  <!-- For more projects: Visit codeastro.com  -->
  </center>
  
        <div class="report-container">
  
       <table class="table table-bordered table-striped table-hover">
  
       <thead>
       <tr style="background-color: #383838; color: #FFFFFF;" >
              <th>Date</th>
              <th>Invoice No.</th>
             <th>Medicines</th>
             <th>Qty (Type)</th>
              <th>Total Amount</th>
              <th>Total Profit</th>  
              <th>Action</th>
            <!--  <th>Action</th>-->
            </tr></thead>
  
          <?php
  
              include("dbcon.php");
              error_reporting(1);
              if(isset($_POST['submit'])){
              $d1=$_POST['d1'];
              $d2=$_POST['d2'];
              $select_sql = "SELECT * FROM sales where Date BETWEEN '$d1' and '$d2' order by Date desc";
              $select_query = mysqli_query($con,$select_sql);
              while($row = mysqli_fetch_array($select_query)) :
           ?>
            <tbody>
            <tr>
              <td><?php echo $row['Date']?></td>
              <td><?php $invoice_number =  $row['invoice_number'];
  
                   echo $invoice_number;
  
                   ?></td>
            
              <td><?php echo $row['medicines']?></td>
              <td><?php echo $row['quantity']?></td>
              <td><?php echo $row['total_amount']?></td>
              <td><?php echo $row['total_profit']?></td>
                  <td><a href="download.php?invoice_number=<?php echo $invoice_number?>"><button class="btn btn-success btn-md"><span class="icon-download-alt"></span> Download</button></a>
               </td>
  
                                       <?php endwhile;?>
  
            </tr>
            </tbody>
  
            <th colspan="4">Total:</th>
                <th>
                  <?php
  
                  $select_sql = "SELECT sum(total_amount) from sales where Date BETWEEN '$d1' and '$d2'";
  
                  $select_query = mysqli_query($con, $select_sql);
  
                  while($row = mysqli_fetch_array($select_query)){
  
                     echo '₹'.$row['sum(total_amount)'];
  
                }
  
                  ?>
                </th>
                <th colspan="2">
                  <?php
  
                  $select_sql = "SELECT sum(total_profit) from sales where Date BETWEEN '$d1' and '$d2'";
  
                  $select_query = mysqli_query($con, $select_sql);
  
                  while($row = mysqli_fetch_array($select_query)){
  
                     echo '₹'.$row['sum(total_profit)'];
                }
                  ?>
                            <?php }else{
  
  
  
  
                            $select_sql = "SELECT * FROM sales where Date = '$date'";
                            $select_query = mysqli_query($con,$select_sql);
                            while($row = mysqli_fetch_array($select_query)) :
  
  
                              ?>
  
                               <tbody>
            <tr> 
              <td><?php echo $row['Date']?>&nbsp;&nbsp;(<font size='2' color='#009688;'>Today</font>)</td>
              <td><?php $invoice_number =  $row['invoice_number'];
  
                   echo $invoice_number;
  
                   ?></td>
            
             <td><?php echo $row['medicines']?></td>
             <td><?php echo $row['quantity']?></td>
  
              <td><?php echo $row['total_amount']?></td>
              <td><?php echo $row['total_profit']?></td>
              <td><a href="download.php?invoice_number=<?php echo $invoice_number?>"><button class="btn btn-success btn-md"><span class="icon-download-alt"></span> Download</button></a>
          </td>
         <?php endwhile;?>
  
            </tr>
            </tbody>
  
             <th colspan="4">Total:</th>
                <th>
                  <?php
  
                  $select_sql = "SELECT sum(total_amount) from sales where Date = '$date'";
  
                  $select_query = mysqli_query($con, $select_sql);
  
                  while($row = mysqli_fetch_array($select_query)){
  
                     echo '₹'.$row['sum(total_amount)'];
  
                }
  
                  ?>
                </th>
                <th colspan="2">
                  <?php
  
                  $select_sql = "SELECT sum(total_profit) from sales where Date = '$date'";
  
                  $select_query = mysqli_query($con, $select_sql);
  
                  while($row = mysqli_fetch_array($select_query)){
  
                     echo '₹'.$row['sum(total_profit)'];
                }
                  ?>
  
                            <?php } ?>
                </th>
  
        </table>
  
     </div>
    </div>
  </div>
  </body>
</html>