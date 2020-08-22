

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('groups') ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li class="active"> ቡድኖች </li>
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
					<input type="submit" class="btn btn-primary btn-flat" name="" value="<?= lang('save') ?>">
				</div>
			</form>
			</div>	            
    	</div>
    </div>


    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">የቡድኖች ዝርዝር</h3>
        </div>
        <div class="box-body">


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
                            <a href="<?= base_url('admin/groupdetails/'.$group['gid']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                            <a href="<?= base_url(); ?>admin/deletegroup/<?= $group['gid'] ?>" onclick="return confirm('Are you sure? ')"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>&nbsp;&nbsp;
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
