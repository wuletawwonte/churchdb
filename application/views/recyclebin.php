
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	    <h1>
	        ቆሼ 
	        <small>የሌሉና የጠፉ ምዕመናን</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
	        <li class="active"><a href="<?php echo base_url(); ?>admin/users"> ቆሼ </a></li>
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
    		<div class="box-header with-border">
    			<h3 class="box-title">የምዕመናኑ ዝርዝር</h3>
    		</div>
    		<div class="box-body">
				<table class="table table-hover table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>ስም</th>
                            <th>የምዕመን ሁኔታ</th>
                            <th>የተመዘገበበት</th>
                            <th>ትግባራት</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($members)) { ?>
                            <tr class="odd"><td colspan="4" class="dataTables_empty" valign="top">ምንም መረጃ አልተገኘም።</td></tr>
                        <?php } else { foreach($members as $member) { ?>
                            <tr>
                                <td><a href="<?= base_url()?>admin/memberdetails/<?= $member['id']; ?>"><?= $member['firstname'].' '.$member['middlename']?></td></a>
                                <td><span class="label <?php if($member['status'] == 'የጠፋ') { echo 'label-danger'; } else if($member['status'] == 'የሌለ') { echo 'label-warning'; } ?>"><?= $member['status']?></span></td>
                                <td><?= nice_date($member['created'], 'M d, Y'); ?></td>
                                <td>


                                    <a data-toggle="modal" class="btn btn-danger btn-xs" href="#deleteMember<?= $member['id']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a>


                                    <div id="deleteMember<?= $member['id']?>" class="modal modal-danger fade" role="dialog">
                                      <div class="modal-dialog modal-sm">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header" align="left">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">እርግጠኛ ኖት?</h4><p>መልሶ ማስተካከል አይቻልም</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">አይ</button>
                                            <a href="<?= base_url(); ?>admin/permanentdeletemember/<?= $member['id']; ?>" class="btn btn-danger">አዎ</a>
                                          </div>
                                        </div>

                                      </div>
                                    </div>          

                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ስም</th>
                            <th>የምዕመን ሁኔታ</th>
                            <th>የተመዘገበበት</th>
                        </tr>
                    </tfoot>
					
				</table>
    		</div>
    		
    	</div>
	</section>
</div>


<script>

    $(function () {
        $('#example1').DataTable({
        'paging'    : true,
        'lengthChange'  : true,
        'searching' : true,
        'ordering'  : true,
        'info'      : true,
        'autoWidth' : true
        })
  })
</script>
