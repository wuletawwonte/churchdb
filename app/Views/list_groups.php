

  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-4">
    <!-- Content Header (Page header) -->
    <div class="mb-6"><h1 class="text-2xl font-bold">
        <?= lang('label.groups') ?>
      </h1>
      <div class="breadcrumbs text-sm"><ul>
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li> ቡድኖች </li>
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

    <div class="card border border-base-300 bg-base-100 shadow-md">
    	<div class="card-body border-b border-base-300 pb-3 mb-3"><?= lang('label.create_group') ?></div>
    	<div class="card-body">
            <div class="form-group">
            <form method="POST" action="<?= base_url('admin/savegroup'); ?>">
                <div class="col-md-5">
                    <select name="type" class="input input-bordered w-full max-w-full s2">
                    	<option value="የአገልግሎት ቡድን">የአገልግሎት ቡድን</option>
                        <option value="የአስተዳደር ቡድን">የአስተዳደር ቡድን</option>
                        <option value="መዘምራን">መዘምራን</option>
                        <option value="የሰንበት ትምህርት ቡድን">የሰንበት ትምህርት ቡድን</option>
                    </select>
                </div>
				<div class="col-md-4">
					<input type="text" name="name" maxlength="48"  class="input input-bordered w-full max-w-full" required>
				</div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-primary" name="" value="<?= lang('label.save') ?>">
				</div>
			</form>
			</div>	            
    	</div>
    </div>


    <!-- Default box -->
    <div class="box">
        <div class="card-body border-b border-base-300 pb-3 mb-3">
            <h3 class="card-title text-lg">የቡድኖች ዝርዝር</h3>
        </div>
        <div class="card-body">


            <p></p>



            <table class="table table-zebra w-full dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th  style="text-align: center">Actions</th>
                    <th><?= lang('label.name') ?></th>
                    <th align="center"><?= lang('label.group_type') ?></th>
                    <th align="center"><?= lang('label.created') ?></th>

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
        <!-- /.card-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  
