
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">

<?= view('templates/partials/page_heading', [
    'title_html' => 'ቆሼ<span class="mt-1 block text-base font-normal opacity-70">የሌሉና የጠፉ ምዕመናን</span>',
    'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li><li><a href="' . esc(base_url('admin/users'), 'url') . '" class="link link-hover"> ቆሼ </a></li></ul>',
]); ?>

<section class="space-y-4">

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
    <?php } elseif (session()->getFlashdata('error')) { ?>
        <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
    <?php } ?>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body border-b border-base-content/15">
            <h2 class="card-title">የምዕመናኑ ዝርዝር</h2>
        </div>
        <div class="card-body overflow-x-auto">
            <table class="table table-zebra w-full min-w-[480px]" id="example1">
                <thead>
                    <tr>
                        <th>ስም</th>
                        <th>የምዕመን ሁኔታ</th>
                        <th>የተመዘገበበት</th>
                        <th>ትግባራት</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($members)) { ?>
                        <tr class="odd">
                            <td colspan="4" class="dataTables_empty" valign="top">ምንም መረጃ አልተገኘም።</td>
                        </tr>
                    <?php } else {
                        foreach ($members as $member) { ?>
                            <tr>
                                <td><a href="<?= base_url() ?>admin/memberdetails/<?= $member['id']; ?>" class="link link-hover"><?= esc($member['firstname'] . ' ' . $member['middlename']) ?></a></td>
                                <td>
                                    <?php
                                    $badge = 'badge-ghost';
                                    if ($member['status'] == 'የጠፋ') {
                                        $badge = 'badge-error';
                                    } elseif ($member['status'] == 'የሌለ') {
                                        $badge = 'badge-warning';
                                    }
                                    ?>
                                    <span class="badge <?= $badge ?>"><?= esc($member['status']) ?></span>
                                </td>
                                <td><?= nice_date($member['created'], 'M d, Y'); ?></td>
                                <td>
                                    <button type="button" class="btn btn-error btn-xs" data-open-modal="deleteMember<?= $member['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                    <?php }
                        } ?>
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

    <?php if (!empty($members)) {
        foreach ($members as $member) { ?>
            <dialog id="deleteMember<?= $member['id'] ?>" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                    <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
                    <div class="modal-action">
                        <form method="dialog"><button class="btn btn-ghost">አይ</button></form>
                        <a href="<?= base_url(); ?>admin/permanentdeletemember/<?= $member['id']; ?>" class="btn btn-error">አዎ</a>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop"><button>close</button></form>
            </dialog>
    <?php }
        } ?>

</section>

<script>
    $(function () {
        $('#example1').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            language: {
                url: '<?= base_url() ?>assets/vendors/DataTables/locale/Amharic.json'
            }
        });
    });
</script>
