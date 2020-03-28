
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css">


<div class="content-wrapper">
    <section class="content-header">
        <h1> የክፍያ ዝርዝር </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
            <li class="active"> የክፍያ ዝርዝር </li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ክፍያ መመዝገብያ</h3>
            </div>

            <form method="post" action="<?= base_url(); ?>admin/savepayment">
                <input type="text" name="page" value="listpayments" hidden>    

            <div class="box-body">


                <?php if($this->session->flashdata('payment_save_success')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> ማስታወሻ!</h4>
                        <?php echo $this->session->flashdata('payment_save_success'); ?><br>
                        <a href="<?= base_url()?>admin/printreceipt/<?= $this->session->flashdata('transaction_id'); ?>" target="_blank" class="btn btn-outline" style="text-decoration: none;"><i class="fa fa-print"></i> ደረሰኝ አትም</a>                            
                    </div>
                <?php } else if($this->session->flashdata('payment_save_error')) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-ban"></i> ይቅርታ</h4>
                        <?php echo $this->session->flashdata('payment_save_error'); ?>
                    </div>
                <?php } ?>


                <div class="col-md-4" style="padding-left: 0px;">
                    <select name="member_id" class="form-control s2searchable" style="width: 100%;" tabindex="-1" area-hidden="true" required>
                        <option disabled selected>ምዕመን</option>
                        <?php foreach($members as $member) { ?>
                            <option value="<?= $member['id']?>"> <?= $member['firstname'].' '.$member['middlename']?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="payment_type" class="form-control s2" style="width: 100%;" tabindex="-1" area-hidden="true" required>
                        <option disabled selected>ምክንያት</option>
                        <option value="አስራት"> አስራት </option>
                        <option value="የፍቅር ስጦታ"> የፍቅር ስጦታ </option>
                        <option value="በኩራት"> በኩራት </option>
                    </select>
                </div>

                <div class="col-md-4" style="padding-right: 0px;">
                    <div class="input-group">
                        <input type="tel" name="payment_amount" placeholder="የገንዘብ መጠን" class="form-control" required>
                        <div class="input-group-addon">ብር</div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <a data-toggle="modal" href="#savepayment" class="btn btn-primary btn-flat pull-right">መዝግብ</a>


                <!-- pre payment saving modal massage -->
                <div id="savepayment" class="modal modal-info fade" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body" align="left">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">እርግጠኛ ኖት?</h4><p>መልሶ ማስተካከል አይቻልም</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline btn-flat pull-left" data-dismiss="modal">አይ</button>
                                <input type="submit" class="btn btn-outline btn-flat" value="አዎ">
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            </form>

            
        </div>

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">የምዕመናን የክፍያ መረጃ</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="30px">መለያ</th>
                            <th>የከፋይ ስም</th>
                            <th>የክፍያው ምክንያት</th>
                            <th>የገንዘብ መጠን</th>
                            <th>ቀን</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($payments)) { ?>
                            <tr class="odd"><td colspan="5" class="dataTables_empty" valign="top">ምንም የክፍያ መረጃ አልተመዘገበም</td></tr>
                        <?php } else { foreach($payments as $payment) { ?>
                            <tr>
                                <td><?= $payment['pid']?></td>
                                <td><a href="<?= base_url()?>admin/memberdetails/<?= $payment['id']; ?>"><?= $payment['firstname'].' '.$payment['middlename']?></td></a>
                                <td><?= $payment['payment_type']?></td>
                                <td><?= $payment['payment_amount']?></td>
                                <td><?= nice_date($payment['date_issued'], 'M d, Y')?></td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>መለያ</th>
                          <th>የከፋይ ስም</th>
                          <th>የክፍያው ምክንያት</th>
                          <th>የገንዘብ መጠን</th>
                          <th>ቀን</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box -->
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
        'autoWidth' : true,
        'language'  : {
                url: '<?= base_url()?>assets/vendors/DataTables/locale/Amharic.json'
            }
        })
  })
</script>
