

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('classs') ?>
      </h1>

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
    <div class="box">
        <div class="box-body">


            <div class="row">
                <div class="col-sm-4">
                    <div class="btns">          
                        <button class="btn" tabindex="0" aria-controls="families" type="button">Copy</button> 
                        <button class="btn" tabindex="0" aria-controls="families" type="button">Excel</button> 
                        <button class="btn" tabindex="0" aria-controls="families" type="button">CSV</button> 
                        <button class="btn" tabindex="0" aria-controls="families" type="button">PDF</button> 
                        <button class="btn" tabindex="0" aria-controls="families" type="button">Print</button> 
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <label class="sr-only">Search:</label><input type="search" placeholder="<?= lang('search') ?>" class="form-control" aria-controls="families">
                    </div>
                </div>
            </div>

            <p></p>



            <table class="table table-hover table-bordered table-striped dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th  style="text-align: center">Actions</th>
                    <th><?= lang('name') ?></th>
                    <th align="center"><?= lang('class_type') ?></th>
                    <th align="center"><?= lang('created') ?></th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($sunday_school_classes as $class) {  ?>

                    <tr>
                        <td style="text-align: center"> 
                            <a href="<?= base_url('admin/classdetails/'.$class['gid']) ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                        <td>
                            <a href="<?= base_url('admin/classdetails/'.$class['gid']); ?>"> <?= $class['name']; ?></a>
                        </td>

                        <td><?= $class['type']; ?></td>
                        <td><?= $class['created']; ?></td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
            <!-- <p><?= $links; ?></p> -->

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
