
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">

<?= view('templates/partials/page_heading', [
    'title' => 'የክፍያ ዝርዝር',
    'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li><li class="text-base-content/80"> የክፍያ ዝርዝር </li></ul>',
]); ?>

<section class="space-y-6">

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body border-b border-base-content/15 pb-4">
            <h2 class="card-title">ክፍያ መመዝገብያ</h2>
        </div>

        <form method="post" action="<?= base_url(); ?>admin/savepayment">
            <input type="text" name="page" value="listpayments" hidden>

            <div class="card-body space-y-4">

                <?php if (session()->getFlashdata('payment_save_success')) { ?>
                    <div role="alert" class="alert alert-success">
                        <button type="button" class="btn btn-sm btn-ghost btn-circle" data-dismiss="alert" aria-label="close">×</button>
                        <div>
                            <h3 class="font-bold"><i class="fa fa-check"></i> ማስታወሻ!</h3>
                            <p><?php echo session()->getFlashdata('payment_save_success'); ?></p>
                            <a href="<?= base_url() ?>admin/printreceipt/<?= session()->getFlashdata('transaction_id'); ?>" target="_blank" rel="noopener" class="btn btn-sm btn-outline mt-2"><i class="fa fa-print"></i> ደረሰኝ አትም</a>
                        </div>
                    </div>
                <?php } elseif (session()->getFlashdata('payment_save_error')) { ?>
                    <div role="alert" class="alert alert-error">
                        <button type="button" class="btn btn-sm btn-ghost btn-circle" data-dismiss="alert" aria-label="close">×</button>
                        <span><i class="fa fa-ban"></i> ይቅርታ <?php echo session()->getFlashdata('payment_save_error'); ?></span>
                    </div>
                <?php } ?>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <label class="form-control w-full">
                        <span class="label-text">ምዕመን</span>
                        <select name="member_id" class="s2searchable w-full" style="width: 100% !important;" tabindex="-1" required>
                            <option disabled selected>ምዕመን</option>
                            <?php foreach ($members as $member) { ?>
                                <option value="<?= $member['id'] ?>"> <?= esc($member['firstname'] . ' ' . $member['middlename']) ?> </option>
                            <?php } ?>
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">ምክንያት</span>
                        <select name="payment_type" class="s2 w-full" style="width: 100% !important;" required>
                            <option disabled selected>ምክንያት</option>
                            <option value="አስራት"> አስራት </option>
                            <option value="የፍቅር ስጦታ"> የፍቅር ስጦታ </option>
                            <option value="በኩራት"> በኩራት </option>
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">የገንዘብ መጠን (ብር)</span>
                        <input type="tel" name="payment_amount" placeholder="የገንዘብ መጠን" class="input input-bordered w-full" required>
                    </label>
                </div>
            </div>

            <div class="card-actions justify-end border-t border-base-content/15 bg-base-200/30 px-6 py-4">
                <button type="button" class="btn btn-primary" data-open-modal="savepayment">መዝግብ</button>
            </div>

            <dialog id="savepayment" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                    <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
                    <div class="modal-action">
                        <button type="button" class="btn btn-ghost" onclick="document.getElementById('savepayment').close()">አይ</button>
                        <button type="submit" class="btn btn-primary">አዎ</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop"><button>close</button></form>
            </dialog>
        </form>
    </div>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body border-b border-base-content/15">
            <h2 class="card-title">የምዕመናን የክፍያ መረጃ</h2>
        </div>
        <div class="card-body overflow-x-auto">
            <table id="example1" class="table table-zebra w-full min-w-[600px]">
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
                    <?php if (empty($payments)) { ?>
                        <tr class="odd">
                            <td colspan="5" class="dataTables_empty" valign="top">ምንም የክፍያ መረጃ አልተመዘገበም</td>
                        </tr>
                    <?php } else {
                        foreach ($payments as $payment) { ?>
                            <tr>
                                <td><?= esc($payment['pid']) ?></td>
                                <td><a href="<?= base_url() ?>admin/memberdetails/<?= $payment['id']; ?>" class="link link-hover"><?= esc($payment['firstname'] . ' ' . $payment['middlename']) ?></a></td>
                                <td><?= esc($payment['payment_type']) ?></td>
                                <td><?= esc($payment['payment_amount']) ?></td>
                                <td><?= nice_date($payment['date_issued'], 'M d, Y') ?></td>
                            </tr>
                    <?php }
                        } ?>
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
