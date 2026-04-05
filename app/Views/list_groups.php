

  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-4">
    <!-- Content Header (Page header) -->
    <?= view('templates/partials/page_heading', [
        'title' => lang('label.groups'),
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li><li class="text-base-content/80"> ቡድኖች </li></ul>',
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

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
    	<div class="card-body border-b border-base-content/15 pb-3 mb-3"><?= lang('label.create_group') ?></div>
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
        <div class="card-body border-b border-base-content/15 pb-3 mb-3">
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
  
