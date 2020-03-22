
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.01
    </div>
    <!-- Default to the left -->
    <strong><?= lang('copyright') ?> &copy; <?= date('Y'); ?> <a href="#"><b>Grace</b>Soft webdesign</a>.</strong> <?= lang('all_rights_reserved') ?>.
  </footer>

</div>
<!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.js"></script>
 
<script type="text/javascript">   
     // Wait for window load
     $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");

        $('#searchbox').select2({
          placeholder: '<?= lang('search') ?>',
          ajax: {
            url: '<?= base_url('admin/ajax_get_member') ?>',
            datatype: 'json',
            delay: 250,
            processResults: function(data) {
              return {
                results: data
              };
            },
            cache: true
          }
        });

        $(".s2").select2({
          minimumResultsForSearch: Infinity
          });
        $(".s2searchable").select2();
     });
   
</script>

</body>
</html>