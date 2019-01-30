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



    <!-- Default box -->
    <div class="box box-primary">



        <div class="box-body">
            <table class="table table-hover table-bordered dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th>Actions</th>
                    <th><?= lang('family_name') ?></th>
                    <th align="center"><?= lang('living_subcity') ?></th>
                    <th align="center"><?= lang('living_kebele') ?></th>
                    <th align="center"><?= lang('wedding_year') ?></th>
                    <th align="center"><?= lang('home_phone') ?></th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($families as $family) {  ?>

                    <tr>
                        <td>
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $family['id'] ?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                        </td>

                        <td>
                            <a href="#"> <?= $family['name']; ?></a>
                        </td>

                        <td><?= $family['subcity']?></td>
                        <td align="center"><?= $family['kebele']; ?></td>
                        <td align="center"><?= $family['wedding_year']; ?></td>
                        <td align="center"><?= $family['home_phone']; ?></td>

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
