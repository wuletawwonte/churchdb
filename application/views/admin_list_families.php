  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('families') ?>
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

    <div class="pull-right">
        <a class="btn btn-success" role="button" href="<?= base_url('admin/familyregistration') ?>">
        <span class="glyphicon glyphicon-plus"></span> <?= lang('add_new_family'); ?></a>
    </div>
    <p><br><br></p>

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
                    <th>Actions</th>
                    <th><?= lang('family_name') ?></th>
                    <th><?= lang('living_subcity') ?></th>
                    <th><?= lang('living_kebele') ?></th>
                    <th><?= lang('wedding_year') ?></th>
                    <th align="center"><?= lang('home_phone') ?></th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($families as $family) {  ?>

                    <tr>
                        <td>
                            <a href="#"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $family['id'] ?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                        </td>

                        <td>
                            <a href="#"> <?= $family['name']; ?></a>
                        </td>

                        <td><?= $family['subcity']?></td>
                        <td><?= $family['kebele']; ?></td>
                        <td><?= $family['wedding_year']; ?></td>
                        <td><?= $family['home_phone']; ?></td>

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
