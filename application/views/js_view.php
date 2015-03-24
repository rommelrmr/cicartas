<script src="<?= URL_JS ?>jquery.min.js"></script>

<script src="<?= URL_LIB ?>jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>

<script src="<?= URL_JS ?>jquery-migrate.min.js"></script>


<!-- smart resize event -->
<script src="<?= URL_JS ?>jquery.debouncedresize.min.js"></script>


<!-- hidden elements width/height -->
<script src="<?= URL_JS ?>jquery.actual.min.js"></script>


<!-- js cookie plugin -->
<script src="<?= URL_JS ?>jquery_cookie.min.js"></script>


<!-- main bootstrap js -->
<script src="<?= URL_BOOTSTRAP ?>js/bootstrap.min.js"></script>


<!-- bootstrap plugins -->
<script src="<?= URL_JS ?>bootstrap.plugins.min.js"></script>


<!-- tooltips -->
<script src="<?= URL_LIB ?>qtip2/jquery.qtip.min.js"></script>


<!-- jBreadcrumbs -->
<script src="<?= URL_LIB ?>jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>


<!-- lightbox -->
<script src="<?= URL_LIB ?>colorbox/jquery.colorbox.min.js"></script>


<!-- fix for ios orientation change -->
<script src="<?= URL_JS ?>ios-orientationchange-fix.js"></script>


<!-- scrollbar -->
<script src="<?= URL_LIB ?>antiscroll/antiscroll.js"></script>

<script src="<?= URL_LIB ?>antiscroll/jquery-mousewheel.js"></script>

<!-- to top -->
<script src="<?= URL_LIB ?>UItoTop/jquery.ui.totop.min.js"></script>

<!-- mobile nav -->
<script src="<?= URL_JS ?>selectNav.js"></script>


<!-- common functions -->
<script src="<?= URL_JS ?>gebo_common.js"></script>

<script src="<?= URL_LIB ?>jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>

<!-- touch events for jquery ui-->
<script src="<?= URL_JS ?>forms/jquery.ui.touch-punch.min.js"></script>

<!-- multi-column layout -->
<script src="<?= URL_JS ?>jquery.imagesloaded.min.js"></script>

<script src="<?= URL_JS ?>jquery.wookmark.js"></script>

<!-- responsive table -->
<script src="<?= URL_JS ?>jquery.mediaTable.min.js"></script>




<!-- sortable/filterable list -->
<script src="<?= URL_LIB ?>list_js/list.min.js"></script>
<script src="<?= URL_LIB ?>list_js/plugins/paging/list.paging.js"></script>
<!-- dashboard functions -->
<script src="<?= URL_JS ?>gebo_dashboard.js"></script>


<!-- validation -->
<script src="<?= URL_LIB ?>validation/jquery.validate.min.js"></script>

<!-- wizard -->
<script src="<?= URL_LIB ?>stepy/js/jquery.stepy.min.js"></script>

<!--<script src="<?= URL_JS ?>gebo_wizard.js"></script>-->




<!-- datatable -->
<script src="<?= URL_LIB ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= URL_LIB ?>datatables/extras/Scroller/media/js/dataTables.scroller.min.js"></script>
<!-- datatables bootstrap integration -->
<script src="<?= URL_LIB ?>datatables/jquery.dataTables.bootstrap.min.js"></script>


<!-- FORM -->
<script src="<?= URL_JS ?>jquery.form.js"></script>






<!-- masked inputs -->
<script src="<?= URL_JS ?>forms/jquery.inputmask.min.js"></script>

<script>
    $(document).ready(function() {
        //* show all elements & remove preloader
        setTimeout('$("html").removeClass("js")', 1000);


    });

</script>

<?php $this->load->view("js_funciones_view"); ?>


<!-- enhanced select (chosen) -->
<script src="<?= URL_LIB ?>chosen/chosen.jquery.min.js"></script>


<!-- JALERT -->
<script src="<?= URL_LIB ?>jalert/jquery.alerts.js"></script>



<!-- datatable table tools -->
<script src="<?= URL_LIB ?>datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script src="<?= URL_LIB ?>datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>