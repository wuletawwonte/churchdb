
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">የምዕመናን የክፍያ መረጃ</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
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


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
  })
</script>
