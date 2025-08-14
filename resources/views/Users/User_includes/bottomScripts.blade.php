<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>

{{-- select 2  --}}
<script src="vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap Core JS -->
<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- FeatherIcons JS -->
<script src="dist/js/feather.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Simplebar JS -->
<script src="vendors/simplebar/dist/simplebar.min.js"></script>

<!-- Data Table JS -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="vendors/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Daterangepicker JS -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/daterangepicker/daterangepicker.js"></script>
<script src="dist/js/daterangepicker-data.js"></script>

<!-- Amcharts Maps JS -->
<script src="vendors/@amcharts/amcharts4/core.js"></script>
<script src="vendors/@amcharts/amcharts4/maps.js"></script>
<script src="vendors/@amcharts/amcharts4-geodata/worldLow.js"></script>
<script src="vendors/@amcharts/amcharts4-geodata/worldHigh.js"></script>
<script src="vendors/@amcharts/amcharts4/themes/animated.js"></script>

<!-- Apex JS -->
<script src="vendors/apexcharts/dist/apexcharts.min.js"></script>

<!-- Init JS -->
<script src="dist/js/init.js"></script>
<script src="dist/js/chips-init.js"></script>
<script src="dist/js/dashboard-data.js"></script>
<script>
    $(document).ready(function() {
        function updateFooterWidth() {
            var layoutStyle = $('.hk-wrapper').attr('data-layout-style');
            if (layoutStyle === 'default') {
                $('.hk-footer').css('width', '80%');
            } else {
                $('.hk-footer').css('width', '95%');
            }
        }

        // Initial run
        updateFooterWidth();

        // Watch for attribute changes on .hk-wrapper
        var target = document.querySelector('.hk-wrapper');
        if (target) {
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'data-layout-style') {
                        updateFooterWidth();
                    }
                });
            });

            observer.observe(target, {
                attributes: true
            });
        }
    });
</script>

@yield('customButtomScripts')
