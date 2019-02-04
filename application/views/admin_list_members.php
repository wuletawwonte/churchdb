<style type="text/css">

.profile-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  font-size: 30px;
  color: #fff;
  text-align: center;
  line-height: 80px;
  margin: 0 0; 
}

table tbody td a, table tbody td span {
    line-height: 80px;
}


</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('members') ?>
      </h1>

 	</section>

    <!-- Main content -->
    <section class="content container-fluid">

    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>


    <!-- Default box -->
    <div class="box">
        <div class="box-body">


            <p></p>



            <table class="table dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th width="120"></th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($members as $member) {  ?>

                    <tr>

                        <td><a href=""><div class="profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div></a></td>

                        <td>
                            <a href="#"> <?= $member['firstname'].' '.$member['middlename']; ?></a>
                        </td>

                        <td><span><?= $member['birthdate']?></span></td>
                        <td>
                            <a href="#"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                        </td>

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
