<?php
include ('./init.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('include/head.php'); ?>
        <?php include('include/head.php'); ?>
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role = "navigation" style="margin-bottom: 0px">
                <?php include ('./include/menuHeader.php'); ?>
            </nav>

            <div id="sidebar-menu-wrapper">
                <!--side-->
                <?php include('./include/sidebar.php'); ?>
            </div>





            <div id="page-content-wrapper" class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success">
                                    <form role ="form" class="form-inline">
                                        <div class="form-group">

                                            <!-- <label class="control-label">Search Product </label>-->
                                            <input type="text" class="form-control" size="65%"/>

                                            <select class="form-control" name="cat">
                                                <option selected="selected">Select a Category</option>
                                                <option>Brakes, Suspension and Steering</option>
                                                <option>Headlights and Lighting</option>
                                                <option>Body Parts</option>
                                                <option>Engine</option>
                                                <option>Accessories (Interior and External)</option>
                                            </select>
                                            <button type="submit" class="btn btn-default">Search</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-striped">
                            <thead class="">
                                <tr>
                                    <td>S/N </td>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Ordered By</td>
                                    <td>Date Ordered</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $id = getStatusID(getStatus());
                                $data1 = getOrder($id);
                                while ($data = mysqli_fetch_assoc($data1)) {
                                    $count + 2;
                                    echo '  
                                                        
                                                    <tr>
                                                        <td>'
                                    ?><?php
                                    echo $count++;
                                    echo '</td>
                                                    
                                                    
                                                    <td>'
                                    ?><?php
                                    $i = $data["Prod_ID"];
                                    echo getProduct("prod_title", $i);
                                    echo '</td>

                                                     <td>'
                                    ?><?php
                                    echo $data["Ord_Qty"];
                                    echo '</td>
                                                          
                                                     <td>'
                                    ?><?php
                                    $userid = $data["User_ID"];
                                    echo getUsername($userid);
                                    echo '</td>
                                                        
                                                         <td>'
                                    ?><?php
                                    echo $data["DateCreated"];
                                    echo '</td>
                                                         
                                                        <td>
                                                        <button type = "button" name = '
                                    ?><?php
                                    echo $data["Ord_ID"];
                                    echo ' class = "btn btn-danger" id = "view">View</button>
                                                        </td>
                                                    ';
                                }
                                ?>  
                                </tr>        
                            </tbody>
                        </table>

                        <div class="panel panel-primary">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <button type="button" class="btn btn-primary btn-block">Previous</button>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <h5 class="text-center">Page 1 of 12 </h5>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <button type="button" class="btn btn-primary btn-block">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

<?php include('./include/notification.php'); ?>
                    </div>
                </div>

            </div>

        </div>


        <script>

            $(document).ready(function () {
                $(".dropdown-toggle").dropdown();
            });


            $('#toggle').click(function (e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

            $('#toggle1').click(function (e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

        </script>
    </body>
</html>
