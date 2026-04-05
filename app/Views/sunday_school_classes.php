

  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-4">
    <!-- Content Header (Page header) -->
    <div class="mb-6"><h1 class="text-2xl font-bold">
        የስንበት ትምህርት 
      </h1>
      <div class="breadcrumbs text-sm"><ul>
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li> የሰንበት ትምህርት </li>
      </ul></div>

 	</div>
    <section class="content container-fluid">

    <?php if(session()->getFlashdata('success')) { ?>
        <div class="alert alert-info">
            <?php echo session()->getFlashdata('success'); ?>
        </div>
    <?php } else if(session()->getFlashdata('error')) { ?>
        <div class="alert alert-error">
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php } ?>


    <!-- Default box -->
    <div class="box">
        <div class="card-body">


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
                        <label class="sr-only">Search:</label><input type="search" placeholder="<?= lang('label.search') ?>" class="input input-bordered w-full max-w-full" aria-controls="families">
                    </div>
                </div>
            </div>

            <p></p>



            <table class="table table-zebra w-full dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th  style="text-align: center">Actions</th>
                    <th><?= lang('label.name') ?></th>
                    <th align="center"><?= lang('label.class_type') ?></th>
                    <th align="center"><?= lang('label.created') ?></th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($sunday_school_classes as $class) {  ?>

                    <tr>
                        <td style="text-align: center"> 
                            <a href="<?= base_url('admin/groupdetails/'.$class['gid']) ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                        <td>
                            <a href="<?= base_url('admin/groupdetails/'.$class['gid']); ?>"> <?= $class['name']; ?></a>
                        </td>

                        <td><?= $class['type']; ?></td>
                        <td><?= $class['created']; ?></td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
            <!-- <p><?= $links; ?></p> -->

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  
