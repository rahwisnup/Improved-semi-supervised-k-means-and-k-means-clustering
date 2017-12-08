<!-- jQuery -->
    <script src="<?php  echo base_url();?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap -->
    <!-- <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <!-- <script src="../vendors/fastclick/lib/fastclick.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/fastclick/lib/fastclick.js" type="text/javascript"></script>
    <!-- NProgress -->
    <!-- <script src="../vendors/nprogress/nprogress.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/nprogress/nprogress.js" type="text/javascript"></script>
    <!-- iCheck -->
    <!-- <script src="../vendors/iCheck/icheck.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/iCheck/icheck.min.js" type="text/javascript"></script>
    
    <!-- Datatables -->
    <!-- <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/javascript"></script>
    <!-- <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/jszip/dist/jszip.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/jszip/dist/jszip.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/pdfmake/build/pdfmake.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
    <!-- <script src="../vendors/pdfmake/build/vfs_fonts.js"></script> -->
    <script src="<?php  echo base_url();?>assets/vendors/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>

    <!-- Custom Theme Scripts -->
    <!-- <script src="../build/js/custom.min.js"></script> -->
    <script src="<?php  echo base_url();?>assets/build/js/custom.min.js" type="text/javascript"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->