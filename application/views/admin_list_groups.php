

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('groups') ?>
      </h1>

 	</section>

    <!-- Main content -->
    <section class="content container-fluid">

<!--     <div class="pull-right">
        <a class="btn btn-success" role="button" href="<?= base_url('admin/familyregistration') ?>">
        <span class="glyphicon glyphicon-plus"></span> <?= lang('add_new_group'); ?></a>
    </div>
    <p><br><br></p>
 -->
    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>

    <div class="box box-primary">
    	<div class="box-header with-border"><?= lang('create_group') ?></div>
    	<div class="box-body">
            <div class="form-group">
            <form method="POST" action="<?= base_url('admin/savegroup'); ?>">
                <div class="col-md-5">
                    <select name="type" class="form-control s2">
                    	<option value="የአገልግሎት ቡድን">የአገልግሎት ቡድን</option>
                        <option value="የአስተዳደር ቡድን">የአስተዳደር ቡድን</option>
                        <option value="መዘምራን">መዘምራን</option>
                        <option value="የሰንበት ትምህርት ቡድን">የሰንበት ትምህርት ቡድን</option>
                    </select>
                </div>
				<div class="col-md-4">
					<input type="text" name="name" maxlength="48"  class="form-control" required>
				</div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-primary" name="" value="<?= lang('save') ?>">
				</div>
			</form>
			</div>	            
    	</div>
    </div>


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
