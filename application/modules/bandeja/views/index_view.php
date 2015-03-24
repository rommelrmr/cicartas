<blockquote>
    <p>Bandeja de Cartas</p>    
</blockquote>

<div class="row-fluid">
    <?php $this->load->view("form_view") ?>
</div>

<div class="row-fluid" id="capa-datatables">


</div>

<div class="row-fluid">



</div>
<script type="text/javascript">
    $(function () {
        fn_datatables();
    })


    function fn_datatables() {
        $("#capa-datatables").load("<?php echo BASE_URL ?>bandeja/grid");
    }

</script>