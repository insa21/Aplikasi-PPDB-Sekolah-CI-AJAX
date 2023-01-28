
<script type="text/javascript">
	$(document).ready(function(){

				//Simpan Siswa
			$('#btn_simpan').on('click',function(){
            var id=$('#id').val();
            var nis=$('#nis').val();
            var nama=$('#nama').val();
            var jenis_kelamin=$('#jenis_kelamin').val();
            var telp=$('#telp').val();
            var alamat=$('#alamat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/siswa/simpan_siswa') ?>",
                dataType : "JSON",
                data : {id:id , nis:nis, nama:nama, jenis_kelamin:jenis_kelamin, telp:telp, alamat:alamat},
                success: function(data){
                    $('[name="id"]').val("");
                    $('[name="nis"]').val("");
                    $('[name="nama"]').val("");
                    $('[name="jenis_kelamin"]').val("");
                    $('[name="telp"]').val("");
                    $('[name="alamat"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_siswa();
                }
            });
            return false;
        });
        </script>