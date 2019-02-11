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
  border-radius: 10%;
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
	        			<div class="box-body table-responsive clearfix">
	        				<table class="table user-list table-hover">
	        					<thead>
	        						<tr>
	        							<th></th>
	        							<th><span>Family Members</span></th>
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
        									<a href="PersonEditor.php?PersonID=109" class="table-link">
        										<span class="fa-stack">
        											<i class="fa fa-square fa-stack-2x"></i>
        											<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
        										</span>
        									</a>
        									<a class="delete-person" data-person_name="dgfg Aashutosh"
        									data-person_id="109" data-view="family">
	        									<span class="fa-stack">
	        										<i class="fa fa-square fa-stack-2x"></i>
	        										<i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
	        									</span>
	        								</a>
	        							</td>
	        						</tr>
	        					<?php } ?>
	        		</tbody>
	        	</table>
			</div>
    	</div>
    </section>
</div>