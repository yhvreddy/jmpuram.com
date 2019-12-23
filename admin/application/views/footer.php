<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<!-- begin theme-panel -->

<!-- end theme-panel -->
<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->
<!-- ================== BEGIN BASE JS ================== -->
<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/plugins/js-cookie/js.cookie.js"></script>
<script src="<?=base_url()?>assets/js/theme/default.min.js"></script>
<script src="<?=base_url()?>assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->
<script src="<?=base_url()?>assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?=base_url()?>assets/plugins/highlight/highlight.common.js"></script>
<script src="<?=base_url()?>assets/js/demo/render.highlight.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?=base_url()?>assets/plugins/d3/d3.min.js"></script>
<script src="<?=base_url()?>assets/plugins/nvd3/build/nv.d3.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?=base_url()?>assets/js/demo/dashboard-v2.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="<?=base_url()?>assets/plugins/dropify-master/dist/js/dropify.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/masked-input/masked-input.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="<?=base_url()?>assets/plugins/clipboard/clipboard.min.js"></script>
<script src="<?=base_url()?>assets/js/demo/form-plugins.demo.min.js"></script>
<script src="<?=base_url()?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/js/demo/table-manage-default.demo.min.js"></script>
<script src="<?=base_url()?>assets/plugins/superbox/js/jquery.superbox.min.js"></script>
<script src="<?=base_url()?>assets/plugins/lity/dist/lity.min.js"></script>
<script src="<?=base_url()?>assets/js/demo/profile.demo.min.js"></script>
<script src="<?=base_url()?>assets/plugins/intl-tel-input-master/build/js/intlTelInput.js"></script>
<script>
    $(document).ready(function() {
        $('.textarea_editor').wysihtml5();
        $('.default-select2,.select2').select2();
        $('.mydatepicker').datepicker({
            autoclose: true,
        });
        $('.mypicker').datepicker({
            format: "yyyy-mm",
            startView: 1,
            minViewMode: 1,
            maxViewMode: 2,
            autoclose: true,
            toggleActive: true
        })
    });
    $(document).ready(function() {
        App.init();
        DashboardV2.init();
        Highlight.init();
        FormPlugins.init();
        TableManageDefault.init();
        $('[data-toggle="tooltip"]').tooltip();
        $(".select2").select2();
        $('.mytimepicker,.timepicker,.mytimepickeredit').timepicker();
        $(".mytimepicker").val('');
    });
</script>
<script>
    var input = document.querySelector("#Mobileno");
    var errorMsg = document.querySelector("#error-msg");
    var validMsg = document.querySelector("#valid-msg");

    var telInput = window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        // hiddenInput: "full_number",
        initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        preferredCountries: ['In', 'US'],
        separateDialCode: true,
        hiddenInput: "full_phone",
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js'
        //"<?=base_url('assets/plugins/intl-tel-input-master/build/js/utils.js')?>",
    });

    // Error messages based on the code returned from getValidationError
    var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // Validate on blur event
    input.addEventListener('blur', function() {
        reset();
        if(input.value.trim()){
            if(telInput.isValidNumber()){
                validMsg.classList.remove("hide");
                /* get code here*/
                //alert(input);
            }else{
                input.classList.add("error");
                var errorCode = telInput.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#AadhaarCard').keyup(function() {
            var foo = $(this).val().split("-").join(""); // remove hyphens
            if (foo.length > 0) {
                foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
            }
            $(this).val(foo);
        });
    });

    $(document).ready(function() {
        $('#myTable').DataTable();
        $('#example23,#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                /* 'copy',*/ 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });

</script>

<script type="text/javascript">
    var logoutlock = 500*6000;
    var IDLE_TIMEOUT = logoutlock; //seconds
    var _localStorageKey = 'global_countdown_last_reset_timestamp';
    var _idleSecondsTimer = null;
    var _lastResetTimeStamp = (new Date()).getTime();
    var _localStorage = null;

    AttachEvent(document, 'click', ResetTime);
    AttachEvent(document, 'mousemove', ResetTime);
    AttachEvent(document, 'keypress', ResetTime);
    AttachEvent(window, 'load', ResetTime);

    try {
        _localStorage = window.localStorage;
    }
    catch (ex) {
    }

    _idleSecondsTimer = window.setInterval(CheckIdleTime, 1000);

    function GetLastResetTimeStamp() {
        var lastResetTimeStamp = 0;
        if (_localStorage) {
            lastResetTimeStamp = parseInt(_localStorage[_localStorageKey], 10);
            if (isNaN(lastResetTimeStamp) || lastResetTimeStamp < 0)
                lastResetTimeStamp = (new Date()).getTime();
        } else {
            lastResetTimeStamp = _lastResetTimeStamp;
        }

        return lastResetTimeStamp;
    }

    function SetLastResetTimeStamp(timeStamp) {
        if (_localStorage) {
            _localStorage[_localStorageKey] = timeStamp;
        } else {
            _lastResetTimeStamp = timeStamp;
        }
    }

    function ResetTime() {
        SetLastResetTimeStamp((new Date()).getTime());
    }

    function AttachEvent(element, eventName, eventHandler) {
        if (element.addEventListener) {
            element.addEventListener(eventName, eventHandler, false);
            return true;
        } else if (element.attachEvent) {
            element.attachEvent('on' + eventName, eventHandler);
            return true;
        } else {
            //nothing to do, browser too old or non standard anyway
            return false;
        }
    }

    function WriteProgress(msg) {
        var oPanel = document.getElementById("SecondsUntilExpire");
        if (oPanel){
            oPanel.innerHTML = msg;
        }else if (console){
            //console.log(msg);
        }
    }

    function CheckIdleTime() {
        var currentTimeStamp = (new Date()).getTime();
        var lastResetTimeStamp = GetLastResetTimeStamp();
        var secondsDiff = Math.floor((currentTimeStamp - lastResetTimeStamp) / 1000);
        if (secondsDiff <= 0) {
            ResetTime();
            secondsDiff = 0;
        }
        WriteProgress((IDLE_TIMEOUT - secondsDiff) + "");
        if (secondsDiff >= IDLE_TIMEOUT) {
            window.clearInterval(_idleSecondsTimer);
            ResetTime();
            //alert("Time expired!");
            document.location.href = "<?=base_url('sessionlocked');?>";
        }
    }
</script>
</body>

</html>
