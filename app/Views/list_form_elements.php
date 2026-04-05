



  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-4">
    <!-- Content Header (Page header) -->
    <?= view('templates/partials/page_heading', [
        'title_html' => 'የቅፅ ማስተካከያ <span class="mt-1 block text-base font-normal opacity-70">የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</span>',
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li><li class="text-base-content/80"> የቅፅ ማስተካከያ </li></ul>',
    ]); ?>
    <section class="content">


         <?php if(session()->getFlashdata('success')) { ?>
            <div class="alert alert-info">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } else if(session()->getFlashdata('error')) { ?>
            <div class="alert alert-error">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>


      <div class="row">
        <div class="col-md-12">


          <div class="card border border-base-content/15 bg-base-100 shadow-md">
            <!-- /.box-header -->
            <div class="card-body">
              <table class="table table-bordered table-large table-hover">
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editmembershiplevels">የአባልነት ደረጃ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editministries">የአገልግሎት ዘርፍ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editmembershipcauses">አባል የሆኑበት ሁኔታ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editkifleketemas">ክፍለ ከተማ</a></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
