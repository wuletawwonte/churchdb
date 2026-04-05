

<div class="space-y-4">
    <div class="mb-6">
      <h1 class="text-2xl font-bold">
        የሲስተም ተጠቃሚዎች
        <span class="mt-1 block text-base font-normal opacity-70">የሲስተም ተጠቃሚዎች ዝርዝር</span>
      </h1>
      <div class="breadcrumbs text-sm">
        <ul>
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
          <li><a href="<?php echo base_url(); ?>admin/users"> የሲስተም ተጠቃሚዎች</a></li>
        </ul>
      </div>
    </div>
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



    <div class="card border border-base-300 bg-base-100 shadow-md">
        <div class="card-body flex flex-wrap gap-2 border-b border-base-300">
            <a href="<?php echo base_url(); ?>admin/newuserform" class="btn btn-outline btn-sm"><i class="fa fa-user-plus"></i> አዲስ ተጠቃሚ </a>
            <a href="SettingsUser.php" class="btn btn-outline btn-sm"><i class="fa fa-wrench"></i> የተጠቃሚዎች መቼት</a>
        </div>
    </div>

    <div class="card border border-base-300 bg-base-100 shadow-md">
            <div class="card-body border-b border-base-300 pb-3 mb-3">
                <h3 class="card-title text-lg">የተጠቃሚዎች ዝርዝር</h3>
            </div>
            <div class="card-body overflow-x-auto">
                <table class="table table-zebra w-full" id="user-listing-table">
                    <thead>
                    <tr>
                        <th>ተግባራት</th>
                        <th>ስም</th>
                        <th class="text-center">የተጠቃሚው አይነት</th>
                        <th class="text-center">ስንት ጊዜ ተገባ</th>
                        <th class="text-center">የተፈጠረበት ቀንና ሰዓት</th>
                        <th class="text-center">የይለፍ ቃል</th>

                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach($users as $user) {  ?>
                        <tr>
                            <td>
                                <?php if($user['user_type'] != 'ዋና የሲስተም አስተዳደር') { ?>

                                    <a href="<?php echo base_url(); ?>admin/edituserform/<?= $user['id'] ?>" class="link link-hover"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                    <a href="#" data-open-modal="myModal<?= $user['id']?>" class="link link-error"><i class="fa fa-trash"></i></a>

                                <?php } ?>
                            </td>

                            <td>
                                <a href="<?php echo base_url(); ?>admin/edituserform/<?= $user['id'] ?>" class="link link-hover"> <?php echo esc($user['firstname'].' '.$user['lastname']); ?></a>
                            </td>

                            <td class="text-center"><?= esc($user['user_type']); ?></td>
                            <td class="text-center"><?= esc($user['login_count']); ?></td>
                            <td><?php echo esc($user['created']); ?></td>

                            <td class="text-center">
                                <a href="#" class="link"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                           </td>

                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            <div class="text-end pt-4"><p><?= $links; ?></p></div>
        </div>
    </div>

    <?php foreach ($users as $user) {
        if ($user['user_type'] == 'ዋና የሲስተም አስተዳደር') {
            continue;
        } ?>
            <dialog id="myModal<?= $user['id']?>" class="modal">
              <div class="modal-box">
                <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                <p class="py-4">መልሶ ማግኘት አይቻልም</p>
                <div class="modal-action">
                  <form method="dialog"><button class="btn">አይ</button></form>
                  <a href="<?= base_url(); ?>admin/deleteuser/<?= $user['id']?>" class="btn btn-primary">አዎ</a>
                </div>
              </div>
              <form method="dialog" class="modal-backdrop"><button>close</button></form>
            </dialog>
    <?php } ?>

    </section>
  </div>
