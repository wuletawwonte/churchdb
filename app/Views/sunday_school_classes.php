

  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-4">
    <!-- Content Header (Page header) -->
    <?= view('templates/partials/page_heading', [
        'title' => 'የስንበት ትምህርት',
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li><li class="text-base-content/80"> የሰንበት ትምህርት </li></ul>',
    ]); ?>

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
                    <div class="btns flex flex-wrap gap-2">          
                        <button class="btn btn-sm btn-outline btn-primary" tabindex="0" aria-controls="families" type="button">Copy</button> 
                        <button class="btn btn-sm btn-outline btn-primary" tabindex="0" aria-controls="families" type="button">Excel</button> 
                        <button class="btn btn-sm btn-outline btn-primary" tabindex="0" aria-controls="families" type="button">CSV</button> 
                        <button class="btn btn-sm btn-outline btn-primary" tabindex="0" aria-controls="families" type="button">PDF</button> 
                        <button class="btn btn-sm btn-outline btn-primary" tabindex="0" aria-controls="families" type="button">Print</button> 
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
                            <a href="<?= base_url('admin/group/'.$class['gid']) ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            <a href="<?php echo base_url(); ?>sadmin/editfamilyform/<?= $class['gid'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                        <td>
                            <a href="<?= base_url('admin/group/'.$class['gid']); ?>"> <?= $class['name']; ?></a>
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
  
