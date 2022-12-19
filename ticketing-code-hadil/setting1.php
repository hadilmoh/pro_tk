<?php require 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en"> <!-- dir="rtl" -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- start css files -->
            <!-- botstrap link -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
            <!-- datatable link -->
        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <!-- this link i get it from youtube video to put icon -->
        <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
            <!-- rendear allelement normaly -->
        <link rel="stylesheet" href="css/normalize.css">
            <!-- font Awesome Library -->
        <link rel="stylesheet" href="css/all.min.css">
            <!-- master file -->
        <link rel="stylesheet" href="css/master.css">
        <!-- end css files -->
        <!-- google fonts  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&family=Work+Sans:wght@200;400;600;700&display=swap" rel="stylesheet">
        <!-- end google fonts  -->
        <!-- sweetalert for alert -->
        <link rel="stylesheet" href="sweetalert2.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    </head>
    <body>
        <!-- start form Modal -->
        
        <!-- Add Request Modal -->
        <div class="modal fade" id="requestAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="saveRequest">
                        <div class="modal-body">

                            <div id="errorMessage" class="alert alert-warning d-none"></div>

                            <div class="mb-3">
                                <label for="">Request name</label>
                                <input type="text" id="s_request_name" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Manager</label>
                                <select class="form-select" multiple="multiple" name="id[]" id="id" aria-label="Default select example">
                                    <option selected="" disabled="" value="">select dapartment</option>    
                                
                                    <?php                                   
                                    $query = "SELECT * FROM departments WHERE status='1'";
                                    $query_run = mysqli_query($con, $query);
                                        foreach($query_run as $dept){
                                            ?>
                                            <option value="<?php echo $dept['department_id']?>"><?php echo $dept['department_name']?></option>
                                            <?php
                                        }
                                 
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="">Group</label>
                                <select class="form-select"  name="" id="">
                                    <option selected="" disabled="" value="" >select departments first</option>   
                                </select>
                                
                            </div> -->
                            <!-- OR -->
                            <div class="mb-3">
                                <label for="">User</label>
                                <select class="form-select" multiple  name="users[]" id="s_users">
                                    <option selected="" disabled="" value="" >select departments first</option> 
                                </select> 
                            </div>
                            <div class="mb-3">
                                <label for="">Priority</label>
                                <select class="form-select js-example-basic-multiple"  name="priority" id="s_priority" aria-label="Default select example">
                                    <option value="normal" selected>normal</option>
                                    <option value="important">important</option>
                                    <option value="urgent">urgent</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Duration</label>
                                <div class="time-input" >
                                    <label for="">Day</label>
                                    <select id="s_day" name="day">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <label for="">hour</label>
                                    <select id="s_hour" name="hour">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Request Modal -->
        <div class="modal fade" id="requestEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateRequest">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="request_id" id="request_id" >

                            <div class="mb-3">
                                <label for="">Request name</label>
                                <input type="text" name="name" id="u_request_name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Department</label>
                                <select class="form-select" multiple name="id" id="u_departments" aria-label="Default select example">
                                    <option selected="" disabled="" value="">select dapartment</option>    
                                
                                    <?php                                   
                                    $query = "SELECT * FROM departments WHERE status='1'";
                                    $query_run = mysqli_query($con, $query);
                                        foreach($query_run as $dept){
                                            ?>
                                            <option value="<?php echo $dept['department_id']?>"><?php echo $dept['department_name']?></option>
                                            <?php
                                        }
                                 
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="">Group</label>
                                <select class="form-select"  name="" id="">
                                    <option selected="" disabled="" value="" >select departments first</option>   
                                </select>
                                
                            </div> -->
                            <!-- OR -->
                            <div class="mb-3">
                                <label for="">User</label>
                                <select class="form-select" multiple  name="" id="u_users">
                                    <option selected="" disabled="" value="" >select departments first</option> 
                                </select> 
                            </div>

                        
                        <div class="mb-3 select-data">
                            <label for="">Priority</label>
                            <select class="form-select" name="priority" id="u_priority" aria-label="Default select example">
                                <option value="normal">normal</option>
                                <option value="important">important</option>
                                <option value="urgent">urgent</option>
                            </select>
                        </div>
                        <div class="mb-3">
                                <label for="">Duration</label>
                                <div class="time-input" >
                                    <label for="">Day</label>
                                    <select name="day" id="u_day">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <label for="">hour</label>
                                    <select name="hour" id="u_hour">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- end form Modal -->

        <!-- modal -->
        <div class="modal fade" id="showDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <div class="modal-body body-user">
                            <!-- data -->
                            <?php

                            // if(isset($_GET['r_id']))
                            // {
                            //     $request_id = mysqli_real_escape_string($con, $_GET['r_id']);

                            //     $query = "SELECT user_id FROM request_user WHERE request_id='$request_id'";
                            //     $query_run = mysqli_query($con, $query);
                                                  
                            //     foreach($query_run as $request)
                            //     {

                            //       $request['user_id'] 
                                  
                            //     }       
                            // }

                            ?>
                            <!-- end data -->
                        </div>
                    

                </div>
            </div>
        </div>
        <!-- end modal -->

        <div class="page">
            <!--sidebar for all pages-->
            <div class="sidebar">
                <div class="logo-company">
                    <img src="image//dea0f3b7f480b1151c08db4a402a43b9.jpg" alt="">
                    <h3>Company</h3>
                </div>
                <ul>
                    <li>
                        <a class="op-nav" href="dashboard.php">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <span>Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="support.php">
                            <i class="fa-solid fa-headset"></i>
                            <span>Support Requests</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="departments.html">
                            <i class="fa-solid fa-building"></i>
                            <span>Departments</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="">
                            <i class="fa-solid fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                    <li>
                        <a class="op-nav" href="">
                            <i class="fa-solid fa-file-signature"></i>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <div class="actives op-nav menu-coll">
                            <i class="fa-solid fa-gear"></i>
                            <span>Settings</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="setting1.php" class="sub-list collapse__sublink">Account</a>
                                <a href="#" class="collapse__sublink">Language</a>
                                <a href="#" class="collapse__sublink">Chanels</a>
                                <a href="#" class="collapse__sublink">Job Title</a>
                            </ul>
                        </div>
                    </li>
                    
                    <li>
                        <a class="last op-nav" href="index.html">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="content">
                <!-- start head -->
                <div class="head">
                    <button>+ New</button>
                    <div class="icons">
                        <span class="notific">
                            <i class="fa-regular fa-bell"></i>
                        </span>
                        <img src="image/person.png" alt="">
                    </div>
                </div>
                <!-- end head -->
                <!-- start container -->
                <div class="support-page cont">
                    <div class="head-of-section">
                        <h2>Change Password</h2>                        
                    </div>
                    <div class="list-section">

                        put your code here 

                    </div>
                </div>
                <!-- end container -->
            </div>
        </div>

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
    </body>
</html>


