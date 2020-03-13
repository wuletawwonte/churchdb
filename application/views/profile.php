
<div class="content-wrapper">
    <section class="content-header">
        <h1> የተጠቃሚ አካውንት ማስተካከያ </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
            <li class="active"> አካውንት </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">




        <?php if($this->session->flashdata('success')) { ?>
            <div class="callout callout-info">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } else if($this->session->flashdata('error')) { ?>
            <div class="callout callout-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>


            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile" align="center">
                            <a href="<?= base_url('admin/profile'); ?>">
                            	<?php if($_SESSION['current_user']['profile_picture'] == NULL) { ?>
                                    <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                                        <img class="img-circle" id="profilePicture" style="border: 3px solid #3c8dbc;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/img/user-icon.jpg">
                                    </div>
                                <?php } else { ?>
                                    <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                                        <img class="img-circle" id="profilePicture" style="border: 3px solid #3c8dbc;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/profile_pictures/<?= $_SESSION['current_user']['profile_picture']; ?>">
                                    </div>
                                <?php } ?>
                            </a><br>
                          
                            <a href="<?= base_url('admin/profile'); ?>"><h3 class="profile-username text-center">
                                <?= $_SESSION['current_user']['firstname']." ".$_SESSION['current_user']['lastname']; ?></h3>
                            </a>


                            <div class="input-group input-group-lg">
                                <input type="file" form="#UserEditor" accept="image/*"  class="form-control" id="avatarInput" name="profile_picture" onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0]);" style="display: none;">
                                    <button type="button" class="btn btn-lg btn-primary" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
                                    <button type="button" class="btn btn-lg btn-info btn-flat" onclick="document.getElementById('avatarInput').value = ''; document.getElementById('profilePicture').src = '<?= base_url(); ?>assets/<?php if($_SESSION['current_user']['profile_picture'] == NULL) { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$_SESSION['current_user']['profile_picture']; } ?>'"  style="border-radius: 0px;"><i class="fa fa-refresh"></i></button>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="box box-primary">
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/savememberchanges') ?>" enctype="multipart/form-data" id="UserEditor">
                            <div class="box-header with-border">
                              <i class="fa fa-info"></i>
                              <h3 class="box-title"> መሰረታዊ የተጠቃሚ መረጃ </h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-3 control-label"> ስም </label>

                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $_SESSION['current_user']['firstname']; ?>" class="form-control" id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-3 control-label"> የአባት ስም </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $_SESSION['current_user']['lastname']; ?>" class="form-control" id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label"> የሲስተም መግቢያ ስም </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $_SESSION['current_user']['username']; ?>" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">መዝግብ</button>
                            </div>
                        </form>
                    </div>

                    <?php if($this->session->flashdata('password-change-success')) { ?>
                        <div class="callout callout-info">
                            <?php echo $this->session->flashdata('password-change-success'); ?>
                        </div>
                    <?php } else if($this->session->flashdata('password-change-failure')) { ?>
                        <div class="callout callout-danger">
                            <?php echo $this->session->flashdata('password-change-failure'); ?>
                        </div>
                    <?php } ?>


                    <div class="box box-solid"> 
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/savepasswordchange') ?>">

                            <div class="box-header with-border">
                                <i class="fa fa-shield"></i>
                                <h3 class="box-title"> የይለፍቃል መለወጫ </h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> የአሁን ይለፍ ቃል </label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> አዲሱ የይለፍ ቃል </label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="new_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> የይለፍ ቃል በድጋሚ </label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>                            
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-warning btn-sm pull-right"> ቀይር </button>
                            </div>

                        </form>

                    </div>                    
                </div>
            </div> <!-- Row end -->

        </form>
    </section>
</div>
