



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>List of Registered Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>sadmin/users"><i class="fa fa-users"></i> Users</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header">
            <a href="<?php echo base_url(); ?>sadmin/newuserform" class="btn btn-app"><i class="fa fa-user-plus"></i>New User</a>
            <a href="SettingsUser.php" class="btn btn-app"><i class="fa fa-wrench"></i>User Settings</a>
        </div>

        <div class="box-body">
            <table class="table table-hover dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th>Actions</th>
                    <th>Name</th>
                    <th align="center">Last Login</th>
                    <th align="center">Total Logins</th>
                    <th align="center">Failed Logins</th>
                    <th align="center">Password</th>

                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="#"> Wuletaw Wonte</a>
                        </td>
                        <td align="center">Jan 23, 2018</td>
                        <td align="center">20</td>
                        <td align="center"> <span class="text-red">8</span>
                                <a onclick="#"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-wrench" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick="#"><i class="fa fa-send-o" aria-hidden="true"></i></a>
                       </td>

                    </tr>

                    <tr>
                        <td>
                            <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="#"> Kaftile Torayto</a>
                        </td>
                        <td align="center">Sempt 20, 2019</td>
                        <td align="center">4</td>
                        <td align="center"> <span class="text-red">18</span>
                                <a onclick="#"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-wrench" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick="#"><i class="fa fa-send-o" aria-hidden="true"></i></a>
                       </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
