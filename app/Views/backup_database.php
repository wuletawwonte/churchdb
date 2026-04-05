

<div class="space-y-4">
    <?= view('templates/partials/page_heading', [
        'title' => 'የመረጃቋት ባካፕ',
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-users"></i> ዳሽቦርድ </a></li><li class="text-base-content/80"> የመረጃቋት ባካፕ </li></ul>',
    ]); ?>
    <section class="content">

        <div class="card border border-base-content/15 bg-base-100 shadow-md">
            <div class="card-body border-b border-base-content/15 pb-3 mb-3">
                <h3 class="card-title text-lg">የመረጃቋቱ ባካፕ ሲደረግ የሚከተሉትን መተግበር የተሻለ መንገድ ነው።</h3>
            </div>
            <div class="card-body">
                <ul>
                <li>የመረጃቋቱን ቢያንስ በወር አንድ ጊዜ ባካፕ ማድረግ ተመራጭ መንገድ ነው። ተደጋጋሚ የባካፕ እቅድ ማውታት ደግሞ የተሻለ ነው።</li><br>
                <li>የመረጃቋቱን ባካፕ ከሰርቨሩ ካወረዱ በኋላ፣ ሁለት ኮፒ ማዘጋጀት ያስፈልጋል። አንደኛውን ሊጠፋ በማይችል ቦታ ኮምፒውር ላይ ማስቀመጥ ሁለተኛውን ደግሞ ኢንተርኔት ላይ በኢሜልም ቢሆን ማስቀመጥ ያስፈልጋል።</li><br>
                <li>ሌሎች ሰዎች በሚያገኙበት ቦታ ደግሞ ከተቀመጠ Encrypt  አድርጎ ማስቀመጥ ያስፈልጋል።</li><br>
                </ul>
                <br><br>
                <form method="post" action="sRootPath/api/database/backup" id="BackupDatabase">
                Select archive type:
                <input type="radio" name="archiveType" value="2" checked="">Database Only (.sql)        <input type="radio" name="archiveType" value="3" checked="">Database and Photos (.tar.gz)        <br><br>
                <input type="checkbox" name="encryptBackup" value="1">Encrypt backup file with a password?        &nbsp;&nbsp;&nbsp;
                Password:<input type="password" name="pw1">
                Re-type Password:<input type="password" name="pw2">
                <br><span id="passworderror" style="color: red"></span><br><br>

                <a href="<?= base_url(); ?>admin/generatebackup" class="btn btn-primary">Generate Backup</a>
                <input type="button" class="btn btn-primary" id="doRemoteBackup" value="Generate and Ship Backup to External Storage">

                </form>
            </div>
        </div>


    </section>
</div>