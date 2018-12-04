 <!-- ============================================================== -->
  <script src="<?php echo e(asset('public/admin/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('public/admin/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- apps -->
    <?php echo $__env->yieldContent('script'); ?>
    <script src="<?php echo e(asset('public/admin/dist/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/dist/js/app.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/dist/js/app-style-switcher.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('public/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('public/admin/dist/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('public/admin/dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('public/admin/dist/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/dist/min/jquery.inputmask.bundle.min.js')); ?>"></script>
     <script src="<?php echo e(asset('public/admin/dist/js/pages/forms/mask/mask.init.js')); ?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo e(asset('public/admin/assets/libs/chartist/dist/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
    <!--c3 charts -->
    <script src="<?php echo e(asset('public/admin/assets/extra-libs/c3/d3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/extra-libs/c3/c3.min.js')); ?>"></script>
    <!--chartjs -->
    <script src="<?php echo e(asset('public/admin/assets/libs/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/dist/js/pages/dashboards/dashboard1.js')); ?>"></script>

<!--      // MAterial Date picker-->    

    <script src="<?php echo e(asset('public/admin/assets/libs/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js')); ?>"></script>

      <script src="<?php echo e(asset('public/admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>


     <script>

         // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
       format: 'yyyy/mm/dd',
        orientation: "bottom",
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });


    // MAterial Date picker    
    $('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('.timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
    $('.date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

    $('.min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
    $('.date-fr').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', lang: 'fr', weekStart: 1, cancelText: 'ANNULER' });
    $('.date-end').bootstrapMaterialDatePicker({ weekStart: 0 });
    $('.date-start').bootstrapMaterialDatePicker({ weekStart: 0 }).on('change', function(e, date) {
    $('.date-end').bootstrapMaterialDatePicker('setMinDate', date);
    });
    </script>