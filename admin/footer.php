<!-- /page content -->

<!-- footer content -->
<footer>
  <div class="pull-right">

  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
<!--  </div>
    </div> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript">
  jQuery(function($) {
    $('body').on('click', '#selectall', function() {
      $('.checkbox').prop('checked', this.checked);
    });

    $('body').on('click', '.checkbox', function() {
      if ($('.checkbox').length == $('.checkbox:checked').length) {
        $('#selectall').prop('checked', true);
      } else {
        $("#selectall").prop('checked', false);
      }

    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var selectall = $("#selectall");

    selectall.click(function() {
      if ($(this).is(":checked")) {
        $("#delete").removeAttr("disabled");
        $("#update").removeAttr("disabled");
      } else {
        $("#delete").attr("disabled", "disabled");
        $("#update").attr("disabled", "disabled");
      }
    });
  });
</script>

<script type="text/javascript">
  $('.checkbox').on("change", function() {
    if ($('.checkbox:checked').length > 0) {
      $('#delete').prop("disabled", false);
    } else {
      $('#delete').prop("disabled", true);
    }
  });

  $('.checkbox').on("change", function() {
    if ($('.checkbox:checked').length == 1) {
      $('#update').prop("disabled", false);
    } else {
      $('#update').prop("disabled", true);
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 20; //Input fields increment limitation
    var addAsset = $('.add_asset'); //Add button selector
    var addwhtax = $('.add_whtax');
    var addwhstax = $('.add_whstax');
    var addvat = $('.add_vat');
    var addcitax = $('.add_citax');
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldasset = '<div><button style="float: right;" type="button" class="remove_button btn btn-danger"><i class="fa fa-trash"></i> ลบ</button><table class="table table-striped table-bordered"><tbody><tr><th colspan="2"><h2 style="float: left;">รายละเอียด : </h2></th></tr><tr><th style="width: 15%;"><div style="float : right;"><h2>จำนวนปี : </h2></div></th><th style="padding: 12px;"><input type="text" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="asset_year[]" id="asset_year" required maxlength="25"></th></tr><tr><th><div style="float : right;"><h2>เริ่มต้น : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="asset_start[]" id="asset_start" maxlength="50"></th></tr><tr><th><div style="float : right;"><h2>สิ้นสุด : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="asset_end[]" id="asset_end" maxlength="50"></th></tr><tr><th><div style="float : right;"><h2>หมายเหตุ : </h2></div></th><th style="padding: 12px;"><input type="text" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="asset_note[]" id="asset_note" maxlength="50"></th></tr></tbody></table></div>'; //New input field html 
    var fieldwhtax = '<div><button style="float: right;" type="button" class="remove_button btn btn-danger"><i class="fa fa-trash"></i> ลบ</button><table class="table table-striped table-bordered"><tbody><tr><th colspan="2"><h2 style="float: left;">รายละเอียด : </h2></th></tr><tr><th style="width: 15%;"><div style="float : right;"><h2>เปอร์เซ็นต์อัตรา : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whtax_percent[]" id="whtax_percent" required maxlength="25"></th></tr><tr><th><div style="float : right;"><h2>เริ่มต้น : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whtax_start[]" id="whtax_start" maxlength="50"></th></tr>   <tr><th><div style="float : right;"><h2>สิ้นสุด : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whtax_end[]" id="whtax_end" maxlength="50"></th></tr><tr><th><div style="float : right;"><h2>หมายเหตุ : </h2></div></th><th style="padding: 12px;"><input type="text" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whtax_note[]" id="whtax_note" maxlength="50"></th></tr></tbody></table></div>';
    var fieldwhstax = '<div><button style="float: right;" type="button" class="remove_button btn btn-danger"><i class="fa fa-trash"></i> ลบ</button><table class="table table-striped table-bordered"><tbody><tr><th colspan="2"><h2 style="float: left;">รายละเอียด : </h2></th></tr><tr><th style="width: 15%;"><div style="float : right;"><h2>เปอร์เซ็นต์อัตรา : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whstax_percent[]" id="whstax_percent" required maxlength="25"></th></tr><tr><th><div style="float : right;"><h2>เริ่มต้น : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whstax_start[]" id="whstax_start" maxlength="50"></th></tr>   <tr><th><div style="float : right;"><h2>สิ้นสุด : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whstax_end[]" id="whstax_end" maxlength="50"></th></tr><tr><th><div style="float : right;"><h2>หมายเหตุ : </h2></div></th><th style="padding: 12px;"><input type="text" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="whstax_note[]" id="whstax_note" maxlength="50"></th></tr></tbody></table></div>';
    var fieldvat = '<div><button style="float: right;" type="button" class="remove_button btn btn-danger"><i class="fa fa-trash"></i> ลบ</button><table class="table table-striped table-bordered"><tbody><tr><th colspan="2"><h2 style="float: left;">รายละเอียด : </h2></th></tr><tr><th style="width: 15%;"><div style="float : right;"><h2>เปอร์เซ็นต์อัตรา : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="vat_percent[]" id="vat_percent" required maxlength="25"></th></tr><tr><th><div style="float : right;"><h2>เริ่มต้น : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="vat_start[]" id="vat_start" maxlength="50"></th></tr>   <tr><th><div style="float : right;"><h2>สิ้นสุด : </h2></div></th><th style="padding: 12px;"><input type="month" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="vat_end[]" id="vat_end" maxlength="50"></th></tr><tr><th><div style="float : right;"><h2>หมายเหตุ : </h2></div></th><th style="padding: 12px;"><input type="text" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="vat_note[]" id="vat_note" maxlength="50"></th></tr></tbody></table></div>';
    var fieldcitax = '<div><button style="float: right;" type="button" class="remove_button btn btn-danger"><i class="fa fa-trash"></i> ลบ</button><table class="table table-striped table-bordered"><tbody><tr><th colspan="2"><h2 style="float: left;">รายละเอียด : </h2></th></tr><tr><th style="width: 15%;"><div style="float : right;"><h2>ยอดกำไรสุทธิ จาก : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="citax_from[]" id="citax_from" required maxlength="25"></th></tr><tr><th><div style="float : right;"><h2>ยอดกำไรสุทธิ ถึง : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="citax_to[]" id="citax_to" maxlength="50"></th></tr>   <tr><th><div style="float : right;"><h2>เปอร์เซ็นต์อัตรา : </h2></div></th><th style="padding: 12px;"><input type="number" step="0.01" style="border-color: #acc3e8; width: 50%; padding : 4px;" name="citax_percent[]" id="citax_percent" maxlength="50"></th></tr></tbody></table></div>';
    var x = 1; //Initial field counter is 1<a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a>

    //Once add button is clicked
    $(addAsset).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldasset); //Add field html
      }
    });

    $(addwhtax).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldwhtax); //Add field html
      }
    });

    $(addwhstax).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldwhstax); //Add field html
      }
    });

    $(addvat).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldvat); //Add field html
      }
    });

    $(addcitax).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldcitax); //Add field html
      }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
    });
  });
</script>

<script>
  function goBack() {
    window.history.back();
  }
</script>

<script>
  $(function() {
    $('a').each(function() {
      if ($(this).prop('href') == window.location.href) {
        $(this).addClass('current');
      }
    });
  });
</script>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../js/script.js"></script>
<!-- jQuery -->
<script src="../template/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../template/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../template/vendors/nprogress/nprogress.js"></script>
<!-- validator -->
<!-- <script src="../template/vendors/validator/validator.js"></script> -->
<!-- bootstrap-progressbar -->
<script src="../template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../template/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../template/vendors/moment/min/moment.min.js"></script>
<script src="../template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../template/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../template/vendors/google-code-prettify/src/prettify.js"></script>
<!-- starrr -->
<script src="../template/vendors/starrr/dist/starrr.js"></script>
<!-- Ion.RangeSlider -->
<script src="../template/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- jQuery Tags Input -->
<script src="../template/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="../template/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../template/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="../template/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="../template/vendors/autosize/dist/autosize.min.js"></script>

<!-- jQuery autocomplete -->
<script src="../template/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../template/build/js/custom.js"></script>

<!-- Datatables -->
<script src="../template/vendors/datatables.net/js/jquery.dataTables.js"></script>
<script src="../template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../template/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../template/vendors/jszip/dist/jszip.min.js"></script>
<script src="../template/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../template/vendors/pdfmake/build/vfs_fonts.js"></script>