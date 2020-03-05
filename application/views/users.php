



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የሲስተም ተጠቃሚዎች
        <small>የሲስተም ተጠቃሚዎች ዝርዝር</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-cog"></i> መቼት</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>admin/users"> የሲስተም ተጠቃሚዎች</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>



    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header">
            <a href="<?php echo base_url(); ?>admin/newuserform" class="btn btn-app"><i class="fa fa-user-plus"></i> አዲስ ተጠቃሚ </a>
            <a href="SettingsUser.php" class="btn btn-app"><i class="fa fa-wrench"></i>የተጠቃሚዎች መቼት</a>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table table-hover table-bordered dt-responsive table-striped" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th>ተግባራት</th>
                    <th>ስም</th>
                    <th align="center">ለመጨረሻ ጊዜ የተገባበት</th>
                    <th align="center">ስንት ጊዜ ተገባ</th>
                    <th align="center">የተፈጠረበት ቀንና ሰዓት</th>
                    <th align="center">የይለፍ ቃል</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($users as $user) {  ?>
                    <tr>
                        <td>
                            <?php if($user['user_type'] != 'super_administrator') { ?>

                                <a href="<?php echo base_url(); ?>sadmin/edituserform/<?= $user['id'] ?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                            <?php } ?>
                        </td>

                        <td>
                            <a href="#"> <?php echo $user['firstname'].' '.$user['lastname']; ?></a>
                        </td>

                        <td><?= $user['last_login']; ?></td>
                        <td align="center"><?= $user['login_count']; ?></td>
                        <td><?php echo $user['created']; ?></td>

                        <td>
                            <a href="#"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick="#"><i class="glyphicon glyphicon-send" aria-hidden="true"></i></a>
                       </td>

                    </tr>

                    <?php } ?>

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
