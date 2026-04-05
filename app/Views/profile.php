
<div class="space-y-4">
    <div class="mb-6"><h1 class="text-2xl font-bold"> የተጠቃሚ አካውንት ማስተካከያ </h1>
        <div class="breadcrumbs text-sm"><ul>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
            <li> አካውንት </li>
        </ul></div>
    </div>
    <section class="content">




        <?php if(session()->getFlashdata('success')) { ?>
            <div class="alert alert-info">
                <?php echo session()->getFlashdata('success')." ልብ ይበሉ: ለውጦቹን ለማየት ወጥተው መግባት ይኖርቦታል።"; ?>
            </div>
        <?php } else if(session()->getFlashdata('error')) { ?>
            <div class="alert alert-error">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>



            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card border border-base-300 bg-base-100 shadow-md">
                        <div class="card-body box-profile" align="center">
                            <a href="<?= base_url('admin/profile'); ?>">
                            	<?php $pp = $current_user['profile_picture'] ?? null; if($pp === null || $pp === '') { ?>
                                    <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                                        <img class="rounded-full" id="profilePicture" style="border: 3px solid #3c8dbc;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/img/user-icon.jpg">
                                    </div>
                                <?php } else { ?>
                                    <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                                        <img class="rounded-full" id="profilePicture" style="border: 3px solid #3c8dbc;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/profile_pictures/<?= esc($pp); ?>">
                                    </div>
                                <?php } ?>
                            </a><br>
                          
                            <a href="<?= base_url('admin/profile'); ?>"><h3 class="profile-username text-center">
                                <?= $current_user['firstname']." ".$current_user['lastname']; ?></h3>
                            </a>


                             <div class="input-group input-group-lg">
                                <input type="file" form="UserEditor" accept="image/*"  class="input input-bordered w-full max-w-full" id="avatarInput" name="profile_picture_input" onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0]);" style="display: none;">
                                    <button type="button" class="btn btn-lg btn-primary" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
                                    <button type="button" class="btn btn-lg btn-info" onclick="document.getElementById('avatarInput').value = ''; document.getElementById('profilePicture').src = '<?= base_url(); ?>assets/<?php if($pp === null || $pp === '') { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$pp; } ?>'"  style="border-radius: 0px;"><i class="fa fa-refresh"></i></button>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="card border border-base-300 bg-base-100 shadow-md">
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/saveprofilechange') ?>" enctype="multipart/form-data" id="UserEditor">
                            <div class="card-body border-b border-base-300 pb-3 mb-3">
                              <i class="fa fa-info"></i>
                              <h3 class="card-title text-lg"> መሰረታዊ የተጠቃሚ መረጃ </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-3 control-label"> ስም </label>

                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $current_user['firstname']; ?>" class="input input-bordered w-full max-w-full" name="firstname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-3 control-label"> የአባት ስም </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $current_user['lastname']; ?>" class="input input-bordered w-full max-w-full" name="lastname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label"> የሲስተም መግቢያ ስም </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= $current_user['username']; ?>" class="input input-bordered w-full max-w-full" name="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">መዝግብ</button>
                            </div>
                        </form>
                    </div>

                    <?php if(session()->getFlashdata('password-change-success')) { ?>
                        <div class="alert alert-info">
                            <?php echo session()->getFlashdata('password-change-success'); ?>
                        </div>
                    <?php } else if(session()->getFlashdata('password-change-failure')) { ?>
                        <div class="alert alert-error">
                            <?php echo session()->getFlashdata('password-change-failure'); ?>
                        </div>
                    <?php } ?>


                    <div class="card border border-base-300 bg-base-100 shadow-md"> 
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/savepasswordchange') ?>">

                            <div class="card-body border-b border-base-300 pb-3 mb-3">
                                <i class="fa fa-shield"></i>
                                <h3 class="card-title text-lg"> የይለፍቃል መለወጫ </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> የአሁን ይለፍ ቃል </label>

                                    <div class="col-sm-9">
                                        <input type="password" class="input input-bordered w-full max-w-full" name="current_password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> አዲሱ የይለፍ ቃል </label>

                                    <div class="col-sm-9">
                                        <input type="password" min=6 class="input input-bordered w-full max-w-full" name="new_password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> የይለፍ ቃል በድጋሚ </label>

                                    <div class="col-sm-9">
                                        <input type="password" min=6 class="input input-bordered w-full max-w-full" name="confirm_password" required>
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
