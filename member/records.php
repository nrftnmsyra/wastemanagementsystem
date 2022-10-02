<?php
session_start();

$user = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Waste-Management-System</title>
   <!-- Font Awesome -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }
      table tr td p{
         margin-top: -0.8rem !important;
         margin-bottom: -0.8rem !important;
         font-size: 0.9rem;
      }
      td a.btn{
         font-size: 0.7rem;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(86,181,42)">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="#" role="button">
                  <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="../logout.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
         <img src="../asset/img/logo.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="index.php" class="nav-link">
                        <img src="../asset/img/dashboard.png" width="30">
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="recycle-center.php" class="nav-link">
                        <img src="../asset/img/recycle-center.png" width="30">
                        <p>
                           Recycling Center
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="records.php" class="nav-link">
                        <img src="../asset/img/records.png" width="30">
                        <p>
                           Collection Record
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/records.png" width="40"> Collection Records</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Collection Records</li>
                        </ol>
                     </div>
                     <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#add"
                        style="margin-top: 20px;margin-left: 10px;background-color: rgb(86,181,42)"><i
                           class="fa fa-plus-square"></i>
                        Upload Items</a>
                  </div>
               </div>
            </div>
                           <?php
                           include ('connection.php');
                           echo '
                           <section class="content">
                           <div class="container-fluid">
                              <div class="card card-info">
                                 <br>
                                 <div class="col-md-12">
                                    <table id="example1" class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Garbage Type</th>
                                             <th>Quantity</th>
                                             <th>Unit</th>
                                             <th>Total Amount</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                           '; 
                           $count=0;
                           $sql = "SELECT tbl_collection_record.record_id, tbl_member.username, tbl_member.first_name, tbl_member.last_name, tbl_garbage_type.name, tbl_collection_record.quantity, tbl_collection_record.unit, tbl_collection_record.total_amount, tbl_collection_record.date FROM tbl_member
                           JOIN tbl_collection_record ON tbl_collection_record.member_id = tbl_member.member_id
                           JOIN tbl_garbage_type ON tbl_garbage_type.type_id = tbl_collection_record.type_id WHERE tbl_member.username = '$user' ";
                           $result = mysqli_query($connection, $sql);
                           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                           {
                              $count++;
                              $fullname = $row["first_name"]. ' ' . $row["last_name"];
                               echo '                 
                                                      <tbody>
                                                      <tr class="del_mem'.$row['record_id'].'">
                                                      <td style="display:none;">'.$row["record_id"].'</td>
                                                            <td>'.$row["name"].'</td>
                                                            <td>'.$row["quantity"].'</td>
                                                            <td>'.$row["unit"].'</td>
                                                            <td>'.$row["total_amount"].'</td>
                                                            <td>'.$row["date"].'</td>
                                                            <td class="text-center">
                                                            <button type="button" class="btn btn-success editbtn"><span class="glyphicon glyphicon-trash"></span> Update</button>
                                                            <button type="button" class="btn btn-danger" data-target="#modal_delete'.$count.'" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                                                            </td>
                                                                 </tr>
                                                                 <div class="modal fade" id="modal_delete'.$count.'" aria-hidden="true">
                                                                 <div class="modal-dialog modal-dialog-centered">
                                                                  <div class="modal-content">
                                                                     <div class="modal-body text-center">
                                                                        <img src="../asset/img/sent.png" alt="" width="50" height="46">
                                                                        <h3>Are you sure want to delete this Record?</h3>
                                                                        <div class="m-t-20"> 
                                                                           <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                                                           <a type="button" class="btn btn-danger" href="deleterecord.php?record_id='.$row['record_id'].'">Delete</a>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                             </div>';
                                                      
                           }
                              echo '
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- /.container-fluid -->
                                       </section>
                                       ';
                                          mysqli_close ($connection);
                                          echo '</table>';
                                    ?>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <div id="editmodal" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form method="post" action="editrecord.php">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><img src="../asset/img/garbage-collect.png" width="40"> Edit Collection</h5>
                              </div>
                              <div class="row">
                              <input type="hidden" name="record_id" id="record_id">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Garbage Type</label>
                                       <?php
                                       include ('connection.php');
                                       $sql="SELECT type_id, name FROM tbl_garbage_type order by type_id"; 

                                       /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                                       echo '<select class="form-control" id="type_id" name="type_id"><option>Choose</option>'; // list box select command

                                       foreach ($connection->query($sql) as $row){//Array or records stored in $row

                                       echo '<option value='.$row["type_id"].'>'.$row["name"].'</option>'; 

                                       /* Option values are added by looping through the array */ 

                                       }

                                       echo '</select>';// Closing of list box
                                       ?>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Quantity</label>
                                       <input type="text" name="qty" id="qty" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Unit</label>
                                       <input type="text" name="unit" id="unit" class="form-control" placeholder="pcs, kg etc">
                                    </div>
                                 </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Total Amount</label>
                                       <input type="text" name="total" id="total" class="form-control" placeholder="12.00">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Date</label>
                                       <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                        <button type="submit" name="addrecord" class="btn btn-save">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form method="post" action="addrecord.php">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><img src="../asset/img/garbage-collect.png" width="40"> Add Collection</h5>
                              </div>
                              <div class="row">
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Junkshop Name</label>
                                       <?php
                                       include ('connection.php');
                                       $sql="SELECT shop_id, shop_name FROM tbl_junkshop order by shop_id"; 

                                       /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                                       echo '<select class="form-control" name="shop_id"><option>Choose</option>'; // list box select command

                                       foreach ($connection->query($sql) as $row){//Array or records stored in $row

                                       echo '<option value='.$row["shop_id"].'>'.$row["shop_name"].'</option>'; 

                                       /* Option values are added by looping through the array */ 

                                       }

                                       echo '</select>';// Closing of list box
                                       ?>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Garbage Type</label>
                                       <?php
                                       include ('connection.php');
                                       $sql="SELECT type_id, name FROM tbl_garbage_type order by type_id"; 

                                       /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                                       echo '<select class="form-control" name="type_id"><option>Choose</option>'; // list box select command

                                       foreach ($connection->query($sql) as $row){//Array or records stored in $row

                                       echo '<option value='.$row["type_id"].'>'.$row["name"].'</option>'; 

                                       /* Option values are added by looping through the array */ 

                                       }

                                       echo '</select>';// Closing of list box
                                       ?>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Quantity</label>
                                       <input type="text" name="qty" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Unit</label>
                                       <input type="text" name="unit" class="form-control" placeholder="pcs, kg etc">
                                    </div>
                                 </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Total Amount</label>
                                       <input type="text" name="total" class="form-control" placeholder="12.00">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Date</label>
                                       <input type="date" name="date" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                        <button type="submit" name="addrecord" class="btn btn-save">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
         });
      </script>
      <!-- delete record -->
      <script>
         $(document).ready(function(){
         $('.delete_record').click(function(e){
         e.preventDefault();
         var rid = $(this).attr('id');
         var parent = $(this).parent("td").parent("tr");
         bootbox.dialog({
         message: "Are you sure you want to Delete ?",
         title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
         buttons: {
         success: {
         label: "No",
         className: "btn-success",
         callback: function() {
         $('.bootbox').modal('hide');
         }
         },
         danger: {
         label: "Delete!",
         className: "btn-danger",
         callback: function() {
         $.ajax({
         type: 'POST',
         url: 'deleterecord.php',
         data: 'rid='+rid
         })
         .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
         })
         .fail(function(){
         bootbox.alert('Error....');
         })
         }
         }
         }
         });
         });
         });
      </script>
         <script>
      $(document).ready(function() {

         $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();

            console.log(data);

            $('#record_id').val(data[0]);
            $('#type_id').val(data[1]);
            $('#qty').val(data[2]);
            $('#unit').val(data[3]);
            $('#total').val(data[4]);
            $('#date').val(data[5]);
         });
      });
   </script>
   </body>
</html>