<?php

   session_start();

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }

?>
<!DOCTYPE html>
<html>
<head>
 <title>WellSide Pharmacy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="../src/facebox.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../src/facebox.js"></script>
    <script type="text/javascript">

       jQuery(document).ready(function($) {
    $("a[id*=popup").facebox({
      loadingImage : '../src/img/loading.gif',
      closeImage   : '../src/img/closelabel.png'
    })
  })

    </script>
    <style>
      * {
  transition: all 0.3s ease-in-out;
  
}

button:hover, a:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Add some animation to a section or div */
.animate {
  animation: fadeIn 2s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Use CSS grid to create a dynamic layout */
/* .grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
} */
/* 
.grid-item {
  background-color: #f0f0f0;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
} */

      /* Sidebar container */
/* Sidebar container */
/* Sidebar Styles */
/* Sidebar Styles */
/* Sidebar Styles */
/* Sidebar Styles */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  /* overflow-y: scroll; */
  width: 200px;
  background-color: black;
  color: #bbb;
  /* padding-right: px; */
  margin-top: 60px;
  transition: width 0.3s;
  overflow-x: hidden;
}

/* .main-content {
  flex: 1;
  padding: 20px;
  background-color: #f5f5f5;
  margin-top: 60px;
} */

.sidebar.collapsed {
  width: 100px;
}

.sidebar .brand {
  color: #fff;
  display: block;
  text-align: center;
}

.close-icon {
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #444;
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  width: 100%;
}

.nav {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.nav li {
  width: 100%;
  margin-bottom: 15px;
}

.nav a {
  color: white;
  display: flex;
  align-items: center;
  
  text-decoration: none;

  transition: color 0.3s;
}

.nav a:hover {
  color: white;
}


.nav .nav-label {
  margin-left: 10px;
}

.sidebar.collapsed .nav .nav-label,
.sidebar.collapsed .alert-label,
.sidebar.collapsed .notification-label {
  display: none;
  padding-left: 10px;

  /* margin-right: 10px; */
}

.notification {
  display: flex;
  align-items: center;
}


.header {
  text-align: center;
  background-color: #1A535C;
  color: white;
  position: relative;
  width: 100%;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.sidebar.collapsed {
  width: 80px;
}

body {
  margin-left: 200px;
  
}

.sidebar.collapsed + .container {
  margin-left: 40px;
  width: calc(100% - 40px);
}

.sidebar-active {
  width: 250px;
}

.sidebar-active .menu-label {
  display: inline;

  /* transition: display 0.3s; */
}

.icon-menu {
  font-size: 24px;
  
}

.notification .icon-exclamation-sign,
.notification .icon-bell {
  position: relative;
  /* top: 2px; */
  left: -5px;
}


.nav-label, .alert-label, .notification-label {
  color: white;
  padding-right: 10px;

}

.sidebar ul li a {
  display: flex;
  align-items: center;
  color: white;
  /* padding-left: 30px; */
  text-decoration: none;
  padding: 10px;
}

.toggle-btn {
  background-color: #444;
  border: none;
  color: white;
  padding: 10px;
  cursor: pointer;
  width: 100%;
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






.container-fluid {
  padding: 0; /* Remove padding from container */
  display: flex; /* Use flexbox to align the items */
  flex-direction: column; /* Arrange items vertically */
  height: 100%; /* Ensure container takes full height */
}

.sidebar .d-flex {
  /* padding: 10px; */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  /* height: 100%; */
  /* padding-top: 20px; */
  padding-bottom: 25px;


}

.sidebar .nav {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.sidebar .nav li {
  width: 100%;
  padding-left: 15px;
  padding-bottom: 5px;
  /* margin-bottom: 15px; */
}

.sidebar .nav a {
  color: #bbb;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: color 0.3s;
}

.sidebar .nav a:hover {
  color: white;
}

.sidebar .nav .nav-label {
  margin-left: 10px;
}

.sidebar.collapsed {
  width: 100px;
}

.sidebar .close-icon {
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #444;
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  width: 100%;
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
        margin-left: 15px;
        bottom: 9;
        /* right: 0; */
        /* z-index: 1; */
        /* display: flex; */
        /* justify-content: center;
        align-items: center; */
      }
    


    </style>
    <script>
      function toggleSidebar() {
  var sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('collapsed');
}
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const labels = document.querySelectorAll(".nav-label, .alert-label, .notification-label");
        
        if (sidebar.style.width === "240px" || sidebar.style.width === "") {
            sidebar.style.width = "90px";
            labels.forEach(label => label.style.display = "none");
        } else {
            sidebar.style.width = "240px";
            labels.forEach(label => label.style.display = "inline");
        }
    }
</script>

</head>
<body>
<div class="header" style="margin: 0; position: fixed; font-weight: bold; font-size: 20px; padding: 10px; top: 0; left: 0; right: 0; z-index: 1000;">
    <h1 style="margin: 0; font-family: dancing script;"><b>WellSide Pharmacy</b></h1>
  </div>

  <div class="sidebar" id="sidebar" style="background-color: #1A535C; width: 240px; transition: width 0.3s;">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
        <span class="close-icon" onclick="toggleSidebar()" style="margin: 0; cursor: pointer; color: white; font-size: 20px;">
          <i class="icon-menu">&#9776;</i>
          <!-- <span class="menu-label" style="font-size: 20px; padding-left: 10px;">Menu</span> -->
        </span>
      </div>
      <ul class="nav flex-column">
        <li>
          <?php 
          include("../dbcon.php");
          $quantity = "5";
          $select_sql1 = "SELECT * FROM stock WHERE remain_quantity <= '$quantity' AND status='Available'";
          $result1 = mysqli_query($con, $select_sql1);
          $row2 = $result1->num_rows;

          if ($row2 == 0) {
            echo '<a href="#" class="notification label-inverse">
                    <span class="icon-exclamation-sign icon-large"></span>
                    <span class="alert-label" style="padding-left: 18px;">Alert</span>
                  </a>';
          } else {
            echo '<a href="../qty_alert.php" class="notification label-inverse" id="popup">
                    <span class="icon-exclamation-sign icon-large"></span>
                    <span class="alert-label" style="padding-left: 18px;">Alert</span>
                    <span class="badg">' . $row2 . '</span>
                  </a>';
          }
          ?>
        </li>
        <li>
          <?php
          $date = date('d-m-Y');    
          $inc_date = date("Y-m-d", strtotime("+6 month", strtotime($date))); 
          $select_sql = "SELECT * FROM stock WHERE expire_date <= '$inc_date' AND status='Available'";
          $result = mysqli_query($con, $select_sql); 
          $row1 = $result->num_rows;

          if ($row1 == 0) {
            echo '<a href="#" class="notification label-inverse">
                    <span class="icon-bell icon-large"></span>
                    <span class="notification-label" style="padding-left: 18px;">Notification</span>
                  </a>';
          } else {
            echo '<a href="../ex_alert.php" class="notification label-inverse" id="popup">
                    <span class="icon-bell icon-large"></span>
                    <span class="notification-label" style="padding-left: 18px;">Notification</span>
                    <span class="badg">' . $row1 . '</span>
                  </a>';
          }
          ?>
        </li>
        <li><a href="../home.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-home"></span><span class="nav-label" style="padding-left: 18px;"> Home</span></a></li>
        <li><a href="../sales_report.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-bar-chart"></span><span class="nav-label" style="padding-left: 18px;"> Sales Report</span></a></li>
        <li><a href="../backup.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-folder-open"></span><span class="nav-label" style="padding-left: 18px;"> Backup</span></a></li>
        <li><a href="../logout.php" class="link"><span class="icon-off" style="color:red;"></span><span class="nav-label" style="padding-left: 18px;"> Logout</span></a></li>
      </ul>
    </div>
  </div>



     <div class="container" style="margin-right: center;">

      <div class="row" style="margin-left: 40px;">
        <div class="contentheader" style="margin-top: 5px; margin-left: 10px;">
          <h1>Products</h1>
           </div><br>
    
            <input type="text"  id="name_med1" size="4"  onkeyup="med_name1()" placeholder="Filter using BarCode" title="Type BarCode">
            <input type="text" size="4"  id="med_quantity" onkeyup="quanti()" placeholder="Filter using Medicine Name" title="Type Medicine Name">
            <input type="text" size="4" id="med_exp_date" onkeyup="exp_date()" placeholder="Filter using Registered Date" title="Type in registered date">
            <input type="text" size="4" id="med_status" onkeyup="stat_search()" placeholder="Filter using Profit Margin" title="Type in profit amount">
           <a href="index.php?invoice_number=<?php echo $_GET['invoice_number']?>" id="popup"><button class="btn btn-success btn-md" name="submit"><span class="icon-plus-sign icon-large"></span> Add New Medicine</button></a>
               <form action="import_xls.php?invoice_number=<?php echo $_GET['invoice_number']?>" method="post"
                name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <div>
              
           
               <input type="file" name="file"
                   id="file" accept=".xls,.xlsx" required>
                </div>
    
           <button class="btn btn-primary btn-md" name="submit"><span class="icon-download icon-large"></span> Import Excel file</button>
    
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?>
              
            </div>
        
              
            </form>
      </div>
 
    </div><!---****SEARCHES_CONTENT*****--->

 
    <?php

       include('../dbcon.php');

         $select_sql = "SELECT * FROM stock order by quantity";
         $select_query = mysqli_query($con,$select_sql);
         $row = mysqli_num_rows($select_query);

    ?>

      <div style="text-align:center;">
        Total Medicines : <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $row;?>]</font>
      </div>
    <!-- <div class="container" style="overflow-x:auto; overflow-y: auto;"> -->
      <div class="container">
      <!---***CONTENT****----->
    <div class="row">
      <div class="col-12">
        <form method="POST">
          <!-- <div style="overflow-x:auto; overflow-y: auto; height: auto;"> -->
            <div style="height: auto;">
          <table id="table0" class="table table-bordered table-striped table-hover">
           <thead>
             <tr style="background-color: #383838; color: #FFFFFF;" >
             <th width="3%">Code</th>
             <th width="3%">Medicine</th>
             <th width="1%">Category</th>
             <th width="5%">Registered Qty</th>
             <th width="1%">Sold Qty</th>
             <th  width="1%">Remain Qty</th>
             <th width="1%">Registered</th>
             <th style="background-color: #c53f3f;" width="1%">Expiry</th>
             <th width="1%">Remark</th>     
             <th width="2%">Acutal Price</th>
             <th width="2%">Selling Price</th>
             <th width="2%">Profit</th>
             <th width = "3%">Status</th>
             <th width = "5%">Actions</th>
             </tr>
           </thead>
            <tbody>
   
        <?php include("../dbcon.php"); ?>
        <?php $sql = "SELECT  id,bar_code, medicine_name, category, quantity,used_quantity, remain_quantity,act_remain_quantity, register_date, expire_date, company, sell_type , actual_price, selling_price, profit_price, status FROM stock order by id desc"; ?>
        <?php $result =  mysqli_query($con,$sql); ?>
      <!--Use a while loop to make a table row for every DB row-->
        <?php while( $row =  mysqli_fetch_array($result)) : ?>
  
  
        <tr style="">
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['bar_code']; ?></td>
            <td><?php echo $row['medicine_name']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['quantity']."&nbsp;&nbsp;(<strong><i>".$row['sell_type']."</i></strong>)"?></td>              
            <td><?php echo $row['used_quantity']; ?></td>
            <td><?php echo $row['remain_quantity']; ?></td>
            <td><?php echo  date("d-m-Y", strtotime($row['register_date'])); ?></td>
            <td><?php echo date("d-m-Y", strtotime($row['expire_date'])); ?></td>
            <td><?php echo $row['company']; ?></td>
            <td><?php echo $row['actual_price']; ?></td>
            <td><?php echo $row['selling_price']; ?></td>
            <td><?php echo $row['profit_price']; ?></td>
            <td><?php $status = $row['status'];
  
                if($status == 'Available'){
                  echo '<span class="label label-success">'.$status.'</span>';
                }else{
                  echo '<span class="label label-danger">'.$status.'</span>';
                }
  
            ?></td>
            <td><a id="popup" href="update_view.php?id=<?php echo $row['id']?>&invoice_number=<?php echo $_GET['invoice_number']?>"><button class="btn btn-info"><span class="icon-edit"></span></button></a>
          <button class="btn btn-danger delete" id="<?php echo $row['id']?>"><span class="icon-trash"></span>&nbsp;</button></td>
  
            </tr>
        <?php endwhile ?>
    </tbody>
           </table>
         </div>
      </form> 
      </div>
    </div>
    </div>
 </body>
</html>
<script type="text/javascript">
function med_name1() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_med1");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function quanti() {//***Search For quantity *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_quantity");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function exp_date() {//***Search For expireDate *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_exp_date");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function stat_search() {//***Search For Status*****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_status");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[11];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(".delete").click(function(){//***Showing Alert When Deleting*****

  var element = $(this);

  var del_id = element.attr("id");

  var info = 'id='+del_id;

  if(confirm("Delte This Product!!Are You Sure??")){

    $.ajax({

      type :"GET",
      url  :'delete.php',
      data :info,
      success:function(){
        location.reload(true);
      },
      error:function(){
        alert("error");
      }

    });
    
  }
  return false;

});//***Showing Alert When Deleting********



</scrip>
