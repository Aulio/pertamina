<script>
	function process_edit_kategori(){
		document.getElementById("form_edit_kategori").submit();
	}
	function process_add_kategori(){
		document.getElementById("form_add_kategori").submit();
	}
    function select_jenis_kategori(id){
        var parentElement = document.getElementById("isi_jenis_kategori");
        var siteName='<?php echo base_url('ternak/get_sub_kategori1'); ?>';
        var selectOption = document.getElementById(id);
        var selectedValue = selectOption.options[selectOption.selectedIndex].value;
        parentElement.innerHTML="";

        $("#isi_jenis_kategori").load(siteName, {parameter1:selectedValue});


    }
</script>