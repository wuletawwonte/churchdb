



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የሲስተም ተጠቃሚዎች
        <small>የሲስተም ተጠቃሚዎች ዝርዝር</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
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
<!--         <div class="box-header" align="right">
            <button class="btn"><i class="fa fa-file-excel-o"></i> Excel</button>
            <button class="btn"><i class="fa fa-file-o"></i> CSV</button>
            <button class="btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
            <button class="btn"><i class="fa fa-print"></i> Print</button>
        </div>        
 -->        
            <div class="box-header with-border">
                <h3 class="box-title">የተጠቃሚዎች ዝርዝር</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="user-listing-table">
                    <thead>
                    <tr>
                        <th>ተግባራት</th>
                        <th>ስም</th>
                        <th align="center">የተጠቃሚው አይነት</th>
                        <th align="center">ስንት ጊዜ ተገባ</th>
                        <th align="center">የተፈጠረበት ቀንና ሰዓት</th>
                        <th align="center">የይለፍ ቃል</th>

                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach($users as $user) {  ?>
                        <tr>
                            <td>
                                <?php if($user['user_type'] != 'ዋና የሲስተም አስተዳደር') { ?>

                                    <a href="<?php echo base_url(); ?>admin/edituserform/<?= $user['id'] ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                    <a data-toggle="modal" href="#myModal<?= $user['id']?>"><i class="fa fa-trash" style="color: #dd4b39;"></i></a>
                                <?php } ?>
                            </td>

                            <td>
                                <a href="#"> <?php echo $user['firstname'].' '.$user['lastname']; ?></a>
                            </td>

                            <td><?= $user['user_type']; ?></td>
                            <td align="center"><?= $user['login_count']; ?></td>
                            <td><?php echo $user['created']; ?></td>

                            <td>
                                <a href="#"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i></a>&nbsp;&nbsp;
                           </td>

                        </tr>




                                        <div id="myModal<?= $user['id']?>" class="modal fade" role="dialog" style="margin-top: 100px;">
                                          <div class="modal-dialog modal-sm">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header" align="left">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">እርግጠኛ ኖት?</h4><p>መልሶ ማግኘት አይቻልም</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">አይ</button>
                                                <a href="<?= base_url(); ?>admin/deleteuser/<?= $user['id']?>" class="btn btn-primary">አዎ</a>
                                              </div>
                                            </div>

                                          </div>
                                        </div>








                        <?php } ?>

                    </tbody>
                </table>
            <div style="text-align: end;"><p><?= $links; ?></p></div>
        </div>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
