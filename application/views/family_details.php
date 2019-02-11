<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2.min.css') ?>">
<script type="text/javascript" src="<?= base_url('assets/vendors/select2/js/select2.full.min.js') ?>"></script>

<style type="text/css">

.member-profile-image {
  margin: 0 auto;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 15px;
  color: #fff;
  text-align: center;
  line-height: 50px;	
}

.profile-image {
  margin: 0 auto;
  margin-top: 15px;
  width: 70%;
  height: 130px;
  border-radius: 5%;
  border: 3px solid #d2d6de; 
  font-size: 60px;
  color: #fff;
  text-align: center;
  line-height: 130px;
}

table tbody td a, table tbody td span {
    line-height: 50px;
}


</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1><?= lang('person_profile') ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            	<a href="<?= base_url('admin/familydetails/'.$family['id']); ?>"><div class="profile-image" style="background: <?= $family['profile_color']?>"><?= $family['name'][0]?></div></a><br>              
	            <h3 class="profile-username text-center"><?= lang('family').': '.$family['name'] ?></h3>

                <a href="<?= base_url('admin/editfamily/'.$family['id']); ?>" class="btn btn-primary btn-block" id="EditPerson"><b><?= lang('edit') ?></b></a>
				<br><ul class="list-group list-group-unbordered">
                	<li class="list-group-item">
				        <ul class="fa-ul">
				          <li><i class="fa-li fa fa-home"></i><?= lang('address') ?>: <span>
						  	<?= $family['house_number'].': '.$family['kebele'].' '.$family['subcity'].' Arbaminch, Ethiopia' ?>
						  </li>
				          <li>
				            <i class="fa-li fa fa-calendar"></i><?= lang('wedding_year') ?>: <?= $family['wedding_year']; ?>
				          </li>
				          <li><i class="fa-li fa fa-phone"></i><?= lang('home_phone') ?>: <span><?= $family['home_phone']; ?></span></li>
				        </ul>
                	</li>
              	</ul>
            
            </div>

      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>



		    <div class="col-lg-9 col-md-9 col-sm-9">
		        <div class="box box-primary box-body">
	          		<a class="btn btn-app" href="/master/PrintView.php?PersonID=59"><i class="fa fa-print"></i> <?= lang('printable_page') ?></a>
	          		<a class="btn btn-app" href="/master/WhyCameEditor.php?PersonID=59"><i class="fa fa-money"></i> <?= lang('tithes_info') ?></a>
	          		<a class="btn btn-app" href="/master/NoteEditor.php?PersonID=59"><i class="fa fa-sticky-note"></i> <?= lang('note_info') ?></a>
	          		<a class="btn btn-app" id="addGroup"><i class="fa fa-users"></i> <?= lang('assign_new_group') ?> </a>
	          		<a class="btn btn-app bg-maroon delete-person" data-person_name="Franklin Beck" data-person_id="59"><i class="fa fa-trash-o"></i> <?= lang('delete_this_family') ?> </a>
	          		<a class="btn btn-app" role="button" href="/master/SelectList.php?mode=person"><i class="fa fa-list"></i> List familys</span></a>
	        	</div>
	        </div>
	        <div class="col-lg-9 col-md-9 col-sm-9">
	        		<div class="box box-solid">
	        			<div class="box-header"><?= lang('family_members')?></div>
	        			<div class="box-body table-responsive clearfix">
	        				<table class="table user-list table-hover">
	        					<thead>
	        						<tr>
	        							<th></th>
	        							<th><span><?= lang('name') ?></span></th>
	        							<th class="text-center"><span>Role</span></th>
	        							<th><span>Birthday</span></th>
	        							<th><span>Email</span></th>
	        							<th></th>
	        						</tr>
	        					</thead>
	        					<tbody>
	        					<?php foreach($members as $member) {?>
	        						<tr>
	        							<td>
	        								<div class="member-profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div>
	        							</td>
	        							<td>											
	        								<a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"
	        								class="user-link"><?= $member['firstname'].' '.$member['middlename'];?> </a>
	        							</td>
	        							<td class="text-center">
	        								<span style="line-height: 50px;" class='label label-default'><?= $member['family_role']?> </span>
	        							</td>
	        							<td>
	        								<span> <?= $member['birthdate']?> </span>                                
	        							</td>
        								<td>
        									<a href="mailto:wuletaw.wonte@amu.edu.et"><?= $member['email'] ?></a>
        								</td>
        								<td style="width: 20%;">
        								<?php if($family['head_id'] != $member['id']) { ?>
        									<a class="delete-person" href="<?= base_url('admin/remove_member_from_family/'.$member['id']); ?>">
	        									<span class="fa-stack">
	        										<i class="fa fa-square fa-stack-2x"></i>
	        										<i class="fa fa-minus fa-stack-1x fa-inverse btn-danger"></i>
	        									</span>
	        								</a>
	        							<?php } ?>
	        							</td>
	        						</tr>
	        					<?php } ?>
	        		</tbody>
	        	</table><p/><hr>
	        	<div class="box">
	        		<div class="box-header">Add Member</div>
	        		<div class="box-body">
		        	<form action="<?= base_url('admin/add_family_member') ?>" method="POST">
		        		<input type="text" name="family_id" value="<?= $family['id'] ?>" hidden>
						<div class="col-md-4">
							<select name="family_role" class="form-control input-sm select2">
								<option value="<?= lang('daughter') ?>" ><?= lang('daughter') ?></option>
								<option value="<?= lang('son') ?>" ><?= lang('son') ?></option>
								<option value="<?= lang('wife') ?>" ><?= lang('wife') ?></option>
								<option value="<?= lang('husband') ?>" ><?= lang('husband') ?></option>
							</select>							
						</div>

						<div class="col-md-6">
		                	<select id="members" name="member_id" class="form-control input-lg" style="width: 100%;">


 		                  		<?php foreach($all_members as $member) { ?>
		                  		<option value="<?= $member['id']?>"><?= $member['firstname'].' '.$member['middlename']; ?></option>
		                  		<?php } ?>
		                	</select>
		                </div>
		                <div>
		                	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
		                </div>	
		            </form>
		            </div>        	
	        	</div>
			</div>
    	</div>
    </section>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('.select2').select2();
	$('#members').select2();
});
</script>






