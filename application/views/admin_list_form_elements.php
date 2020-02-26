

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Elements
      </h1>

 	</section>

    <!-- Main content -->
    <section class="content container-fluid">


    <!-- Default box -->
    <div class="box">
        <div class="box-body">


            <p></p>



            <table class="table table-hover table-bordered table-striped dt-responsive" style="width:100%;">
                <thead>
                <tr>
                    <th>Form Element</th>
                    <th align="center"><?= lang('group_type') ?></th>
                    <th align="center"><?= lang('created') ?></th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($groups as $group) {  ?>

                    <tr>
                        <td style="text-align: center"> 
                            <a href="<?= base_url('admin/groupdetails/'.$group['gid']) ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $group['gid'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $group['gid'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                        <td>
                            <a href="<?= base_url('admin/groupdetails/'.$group['gid']); ?>"> <?= $group['name']; ?></a>
                        </td>

                        <td><?= $group['type']; ?></td>
                        <td><?= $group['created']; ?></td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
            <p><?= $links; ?></p>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
