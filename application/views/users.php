



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>List of Registered Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>sadmin/users"><i class="glyphicon glyphicon-users"></i> Users</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>



    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header">
            <a href="<?php echo base_url(); ?>sadmin/newuserform" class="btn btn-app"><i class="glyphicon glyphicon-user"></i>New User</a>
            <a href="SettingsUser.php" class="btn btn-app"><i class="glyphicon glyphicon-wrench"></i>User Settings</a>
        </div>

        <div class="box-body">
            <table class="table table-hover dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th>Actions</th>
                    <th>Name</th>
                    <th align="center">Last Login</th>
                    <th align="center">Total Logins</th>
                    <th align="center">Date Created</th>
                    <th align="center">Password</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($users as $user) {  
                            if($user['user_type'] != 'super_administrator') { ?>

                    <tr>
                        <td>
                            <a href="<?php echo base_url(); ?>sadmin/edituserform/<?= $user['id'] ?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                        </td>

                        <td>
                            <a href="#"> <?php echo $user['firstname'].' '.$user['lastname']; ?></a>
                        </td>

                        <td>Jan 23, 2018</td>
                        <td align="center">20</td>
                        <td><?php echo $user['created']; ?></td>

                        <td>
                            <a href="#"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick="#"><i class="glyphicon glyphicon-send" aria-hidden="true"></i></a>
                       </td>

                    </tr>

                    <?php } } ?>

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
