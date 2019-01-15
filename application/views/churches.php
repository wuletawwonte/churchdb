



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Churches
        <small>List of churches Registered</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>sadmin/churches"><i class="fa fa-institution"></i> Churches</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header">
            <a href="<?php echo base_url(); ?>sadmin/newchurchform" class="btn btn-app"><i class="fa fa-institution"></i>New Church</a>
            <a href="SettingsUser.php" class="btn btn-app"><i class="fa fa-wrench"></i>Church Settings</a>
        </div>

        <div class="box-body">
            <table class="table table-hover dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th>Actions</th>
                    <th>Name</th>
                    <th align="center">City</th>
                    <th align="center">Families</th>
                    <th align="center">More</th>

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
                            <a href="#"> Mekane Eyesus</a>
                        </td>
                        <td>Arbaminch</td>
                        <td> <span class="text-red">8</span>
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








      <!--------------------------
        | Your Page Content Here |
        -------------------------->









    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
