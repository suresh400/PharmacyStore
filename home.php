<?php

session_start();

if(!isset($_SESSION['user_session'])){  //User_session

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
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"> -->
    <link rel="stylesheet" href="css/jquery.css">
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    /* Add a smooth transition effect to all elements */
* {
  transition: all 0.3s ease-in-out;
}

/* Create a hover effect for buttons or links */
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
.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}

.grid-item {
  background-color: #f0f0f0;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Sidebar container */
/* Header Styling */
.header {
    text-align: center;
    background-color: #1A535C;
    color: white;
    padding: 10px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    font-size: 20px;
    font-weight: bold;
    z-index: 1000;
}

/* Sidebar Styling */
.sidebar {
    position: fixed;
    top: 60px; /* Adjust to place below header */
    left: 0;
    height: 100%;
    width: 250px;
    background-color: #1A535C;
    color: #bbb;
    transition: width 0.3s;
    overflow-x: hidden;
}

.sidebar.collapsed {
    width: 100px;
}

.menu-header {
    background-color: #444;
    color: white;
    text-align: center;
    cursor: pointer;
    padding: 10px;
}

.nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav li {
    padding: 5px;
    margin: 10px;
}

.nav a {
    color: white;
    text-decoration: none;
    display: flex;
    justify-content: flex-start;
    font-size: 20px;
    align-items: center;
    transition: color 0.3s;
}


/* Ensure no hover enlargement on sidebar list items */
/* Ensure no hover enlargement on sidebar list items */
.nav li,
.nav a {
    transition: none; /* Prevents any size changes or animations */
    font-size: inherit; /* Keeps font size consistent */
    padding: 10px; /* Apply padding to both list items and links */
}

/* Remove any hover styles if they exist */
.nav li:hover,
.nav a:hover {
    transform: none;
    font-size: inherit; /* Keeps font size consistent on hover */
    color: gray; /* Optional: keep a simple color change without resizing */
    scale: 1; /* No scaling on hover */
}

.close-icon {
  background-color: #444;
      border: none;
      color: white;
      padding: 10px;
      cursor: pointer;
      width: 100%;
}
.menu-label {
    margin-left: 10px;
}

/* Hide menu labels when collapsed */
.sidebar.collapsed .menu-label {
    display: none;
    border: 1px solid white;
}

.notification {
    display: flex;
    align-items: center;
}

.badge {
  background-color: red;
        color: white;
        border-radius: 50%;
        font-size: 10px;
        padding:1px 6px 1px 6px;
        margin-left: 1px;
        position: absolute;
        top: 0;
        margin-left: 2px;
        bottom: 9;
}

/* Adjust body margin based on sidebar state */
body {
    margin-left: 250px;
    background-color: #F1F8F6;
    transition: margin-left 0.3s;
}

.sidebar.collapsed + body {
    margin-left: 80px;
}

.contentheader {
    font-size: 20px;
    padding-left: 50px;
    padding-top: 20px;
    color: #1A535C;
}



  </style>
    <script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const body = document.body;

    // Toggle the "collapsed" class on the sidebar
    sidebar.classList.toggle('collapsed');

    // Adjust body margin when sidebar is expanded or collapsed
    if (sidebar.classList.contains('collapsed')) {
      body.style.marginLeft = '10px'; // Adjust based on collapsed width
    } else {
      body.style.marginLeft = '250px'; // Adjust based on expanded width
    }
  }

  // Set sidebar to be collapsed by default on page load
  document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.add('collapsed');
    document.body.style.marginLeft = '80px'; // Adjust based on collapsed width
  });
</script>

    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>

 
    <script type="text/javascript">
       jQuery(document).ready(function($) {
    $("a[id*=popup]").facebox({
      loadingImage : 'src/img/loading.gif',
      closeImage   : 'src/img/closelabel.png'
    })
  })
    </script>
     <script>
  function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
}

</script>

<script type="text/javascript">


//GET Medicine Name And Expire Date

  $(document).ready(function(){

       $("#qty").focus(

            function(){

              var medicine_name = $("#product_hidden").val();
              var expire_date   = $("#date_hidden").val();

            $.ajax({
              type:'POST',
              url :'auto.php',
              dataType:"json",
              data:{medicine_name:medicine_name,expire_date:expire_date},
              success:function(data){

                $("#avai_qty").val(data);
              },

            });
    });

//GET Medicine Name And Expire Date

         //Disabled Button If Quantity Not Available

          $("#qty").blur(function(){

             var avai_qty = $("#avai_qty").val();
             var in_qty = parseInt($("#qty").val());
             var avai_qty_int = parseInt($("#avai_qty").val());
             if(avai_qty == "" ||  in_qty > avai_qty_int || in_qty <= 0){
                    
                    $("#btn_submit").attr('disabled','disabled');
                    alert("Something went wrong!!");

             }
             else{

              $("#btn_submit").removeAttr('disabled');

             }

          });

         //Disabled Button If Quantity Not Available
});
     </script>

     <script language="javascript" type="text/javascript">

      //Clock
      
      var timerID = null;
        var timerRunning = false;

        function stopclock() {
            if (timerRunning) clearTimeout(timerID);
            timerRunning = false;
        }

        function showtime() {
            var now = new Date();
            
            // Convert current time to IST (UTC +5:30)
            var utcOffset = now.getTimezoneOffset() * 60000; // Local time offset in milliseconds
            var istOffset = 5.5 * 60 * 60000; // IST offset in milliseconds (5 hours and 30 minutes)
            var istTime = new Date(now.getTime() + utcOffset + istOffset);
            
            var hours = istTime.getHours();
            var minutes = istTime.getMinutes();
            var seconds = istTime.getSeconds();
            var timeValue = "" + ((hours > 12) ? hours - 12 : hours);
            if (timeValue == "0") timeValue = 12;
            timeValue += (minutes < 10 ? ":0" : ":") + minutes;
            timeValue += (seconds < 10 ? ":0" : ":") + seconds;
            timeValue += (hours >= 12) ? " P.M." : " A.M.";
            
            document.clock.face.value = timeValue;
            timerID = setTimeout(showtime, 1000);
            timerRunning = true;
        }

        function startclock() {
            stopclock();
            showtime();
        }

        window.onload = startclock;
     </script>
    

</head>
<body>
 <!-- Sidebar Navigation -->
 <div class="header">
    <h1 style="margin: 0; font-family: Dancing Script"><b>WellSide Pharmacy</b></h1>
</div>

<div class="sidebar" id="sidebar">
    <div class="menu-header">
        <span class="close-icon" onclick="toggleSidebar()">
            <i class="icon-menu" style="font-size: 22px;">&#9776;</i> <!-- Toggle Menu Icon -->
            <!-- <span class="menu-label" style="font-size: 20px;">Menu</span> -->
        </span>
    </div>
    <ul class="nav">
        <li>
            <?php 
            include("dbcon.php");
            $quantity = "10";
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
                        <span class="badge">' . $row2 . '</span>
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
                echo '<a href="#" class="notification">
                        <span class="icon-bell icon-large"></span>
                        <span class="menu-label">Notification</span>
                      </a>';
            } else {
                echo '<a href="ex_alert.php" class="notification" id="popup">
                        <span class="icon-bell icon-large"></span>
                        <span class="menu-label">Notification</span>
                        <span class="badge">' . $row1 . '</span>
                      </a>';
            }
            ?>
        </li>
        <li style="padding-top: 5px;"><a href="product/view.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-th" ></span><span class="menu-label" style="padding: 10px;">Products</span></a></li>
        <li style="padding-top: 5px;"><a href="sales_report.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-bar-chart" "></span><span class="menu-label" style="padding-left: 10px;">Sales Report</span></a></li>   
        <li style="padding-top: 5px;"><a href="backup.php?invoice_number=<?php echo $_GET['invoice_number'] ?>"><span class="icon-folder-open" "></span><span class="menu-label" style="padding-left: 10px;">Backup</span></a></li>
        <li style="padding-top: 5px;"><a href="logout.php" class="link"><span class="icon-off" style="color:red;"></span><span class="menu-label" style="padding-left: 10px;">Logout</span></a></li>
    </ul>
</div>




 
 <div class="container" style="margin-top: 60px;">
 <div class="contentheader">
    <div class="row">
      <div class="pull-right">
        <font>Today's Sales:</font>
                  <strong><?php
  
                    include("dbcon.php");
  
                    $date = date("Y-m-d");
  
                    $select_sql = "SELECT sum(total_amount) from sales where Date = '$date'";
  
                    $select_query = mysqli_query($con,$select_sql);
  
                    while($row = mysqli_fetch_array($select_query)){
  
                               echo '₹'.$row['sum(total_amount)'];
  
  
                    }
  
  
  
                  ?></strong>  
        </div>
        <h2 style="margin: 10px;padding-bottom: 30px; font-size: 40px">Home</h2>
        <i class="icon-calendar icon-large" style="float: left; margin-right: 10px; display: flex; align-items: center; margin-bottom: 15px;">
    
</i>
<?php
    // Set the timezone to ensure correct date (optional)
    date_default_timezone_set('Asia/Kolkata');

    // Get today's date in the desired format
    $today = date('l, F d, Y');
    echo $today;
    ?>

        </div>

                    
     <form name="clock" method="POST" action="#"><!--*****Clock******-->
     <input style="width:150px;background: #000;color: #fff;border-radius: 5px;height: 30px;" readonly type="submit" class="trans" name="face" value="">
      </form><!--*****Clock******-->

      
    </div>
  </div>
   
   <div class="container">
     <div class="row">
      
        
      <hr>
     
    <center>
      <div class="col-md-12">
        <form method="POST" action="insert_invoice.php?invoice_number=<?php echo $_GET['invoice_number']?> " >
         <input type="text" name="bar_code" id="bar_code" autocomplete="off" placeholder="Enter Barcode Number" style="width:300px;height: 30px;">
     <input type="text" id="product" required  autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
     <!-- <div class="ui-widget"> -->
     <input type="hidden" name="product" id="product_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
   <!-- </div> -->
      <input type="hidden" name="expire_date" id="date_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
     <input type="number" name="avai_qty" id="avai_qty"  readonly placeholder="Available qty" style="width: 100px; height:30px;">
   
     <input type="number" name="qty" id="qty"  placeholder="Qty" autocomplete="off"  style="width: 100px; height:30px;" required>
     <input type="hidden" name="date" value="<?php echo date("m/d/Y");?>">
     <Button type="submit"  name="submit" class="btn btn-success" id="btn_submit" style="width: 130px; height:40px; margin-top:-8px;"><i class="icon icon-plus-sign"></i> Add to Cart</button>
      </form> 
      </div>
    </center>
     </div>

  </div>

  
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-striped table-hover" id="resultTable" data-responsive="table">
  
        <thead>
        <tr style="background-color: #383838; color: #FFFFFF;" >
            <th> Medicine </th>
            <th> Category</th>
            <th style="background: #c53f3f;"> Expiry Date</th>
            <th> Price </th>
            <th> Qty </th>
            <th> Amount </th>
            <th> Action </th>
          </tr>
        </thead>
      
               <tbody>
                <?php
            $invoice_number= $_GET['invoice_number'];
            $medicine_name = "";
            $category= "";
            $quantity= "";
      
                include("dbcon.php");
      
                $select_sql = "SELECT * from on_hold where invoice_number = '$invoice_number' ";
      
                $select_query = mysqli_query($con ,$select_sql);
      
                   $i = 0;
                    
                  while($row = mysqli_fetch_array($select_query)):
      
                    $i++;
                ?>
      
                <tr class="record">
                     <td><?php
      
      
                       $med_id = $row['id'];
                       $medicine_name=$row['medicine_name'];
                       echo $medicine_name;
                       echo "<input type='hidden' value=$med_id id='med_id$i' name='med_id'>";
                       echo "<input type='hidden' value=$medicine_name id='med_name$i' name='med_name'>"
                      ?></td>
                     <td><?php $category = $row['category'];
                     echo $category;
                      ?>
                         <input type="hidden" value='<?php echo $category?>' id='med_cat<?php echo $i?>' name='med_cat'>
                        
                      </td>
                      <td>
                        <?php 
                        $ex_date=$row['expire_date'];
                        echo $ex_date;
                         ?>
                         <input type="hidden" id="ex_date<?php echo $i?>" value='<?php echo $ex_date?>'' name='ex_date'>
      
                      </td>
                     <td><?php echo  $row['cost']; ?></td>
                     <td>
                     <?php
      
                        $quantity =  $row['qty'];
                        $type     =  $row['type'];
                        echo "<input type='hidden' id='hid_quantity$i' value='$quantity' name='hid_quantity'>";
                        echo "<input type='number' id='quantity$i' name='quantity' value='$quantity' min='1' max='10' style='width:50px'>"."&nbsp;(".$type.")&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<a href='#' class='qty_upd$i'><span class='icon-refresh'></span></a>";
                        echo "<div class='ajax-loader$i' style='visibility:hidden'>
      
                             <img src='src/img/loading.gif'>
      
                             </div>
                           ";
                                     ?>
                     </td>
                     
                     <td><?php echo $row['amount']; ?></td>
           <td><a href="delete_invoice.php?invoice_number=<?php echo $_GET['invoice_number']?>&id=<?php echo $row['id'];?>&name=<?php echo $row['medicine_name']?>&expire_date=<?php echo $row['expire_date']?>&quantity=<?php echo $row['qty'];?>" class="btn btn-danger">Remove</a></td>
      
                  <?php endwhile; ?>  
                </tr>
                <tr>
              <th colspan="5" ><font size=6><strong> Total:</strong></font></th>
              <td  colspan="2"><strong>
      
                <?php
      
                $select_sql = "SELECT sum(amount) , sum(profit_amount) from on_hold where invoice_number = '$invoice_number'";
      
                $select_query= mysqli_query($con,$select_sql);
      
                while($row = mysqli_fetch_array($select_query)){
      
                  $grand_total = $row['sum(amount)'];
                  $grand_profit =$row['sum(profit_amount)'];
                  echo '₹'.$grand_total;
                }
                ?>
              </td>
            </tr>
        </tbody>
      </table><br>
      
          <?php
           if($medicine_name && $category && $quantity !=null){
            ?>
      
            <a id="popup" href="checkout.php?invoice_number=<?php echo $_GET['invoice_number']?>&medicine_name=<?php echo $medicine_name?>&category=<?php echo $category?>&ex_date=<?php echo $ex_date?>&quantity=<?php echo $quantity?>&total=<?php echo $grand_total?>&profit=<?php echo $grand_profit?>" style="width:400px;" class="btn btn-info btn-large">Proceed <i class="icon icon-share-alt"></i></a>
      
          <?php
           }else{
      
      
            ?>
          <?php
       
                }
      
          ?>
    </div>
      </div>
 
  </body>
 </html>
<script type="text/javascript">


  $(document).ready(function(){

     $("#product").focus(

            function(){

              var bar_code = $("#bar_code").val();

            $.ajax({
              type:'POST',
              url :'bar_code.php',
              dataType:"json",
              data:{bar_code:bar_code},
              success:function(data){

                $("#product").val(data);
              },

            });
    });

      //****AUTO COMPLETE*****
    $("#product").typeahead({

               source: function(drug_result, result){

            $.ajax({

          url : 'autocomplete.php',
          method :'POST',
          data :{drug_result:drug_result},
          dataType:"json",

          success:function(data){

            result($.map(data,function(item){



              return item;

            }));
          },

        });
      },

    });

      //****AUTO COMPLETE*****



     //****Medicine name and Date*****
     $("#product").focusout(function(){
         
               var value = $("#product").val();

               var res= value.split(",");

               var name = res[0];

               var date = res[1];

            $("#product_hidden").val(name);
          $("#date_hidden").val(date);

    });
    //****Medicine name and Date*****

    //*******Qty Update*******
  for(var i=1;i<=100;i++){

  $("a.qty_upd"+i).click(function(){

        for(var i1=1;i1<=100;i1++){

                var med_id=$("#med_id"+i1).val();
                var med_name=$("#med_name"+i1).val();
                var med_cat=$("#med_cat"+i1).val();
                var ex_date=$("#ex_date"+i1).val();
                var hid_qty = $("#hid_quantity"+i1).val();
                var qty=$("#quantity"+i1).val();

                if(qty <= 0){

                  alert("Sorry Error");

                }else{

             $.ajax({
              type:'POST',
               beforeSend:function(){
                 $('.ajax-loader'+i1).css("visibility", "visible");
              },
              url :'quantity_upd.php',
              data:{med_id:med_id,med_name:med_name,med_cat:med_cat,ex_date:ex_date,hid_qty:hid_qty,qty:qty},

              success:function(){

                location.reload();

              },

            });

           }

         }
  });

}
     //*******Qty Update*******

  });
</script>
 