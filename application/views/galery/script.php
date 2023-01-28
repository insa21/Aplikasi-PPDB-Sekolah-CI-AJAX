<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>


<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('galery/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (photo)
                    "orderable": false, //set not orderable
                },
            ],

        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        //atur input / textarea / pilih acara saat mengubah nilai, hapus kesalahan kelas dan hapus blok bantuan teks
        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });



    function add_person() {
        save_method = 'add';
        $('#form')[0].reset(); // atur ulang formulir pada modals
        $('.form-group').removeClass('has-error'); // hapus kelas kesalahan
        $('.help-block').empty(); // hapus string kesalahan
        $('#modal_form').modal('show'); // tampilkan modal bootstrap
        $('.modal-title').text('Add Person'); // Setel Judul menjadi judul modal Bootstrap

        $('#photo-preview').hide(); // sembunyikan modal pratinjau foto

        $('#label-photo').text('Upload Photo'); // label photo upload
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // atur ulang formulir pada modals
        $('.form-group').removeClass('has-error'); // hapus kelas kesalahan
        $('.help-block').empty(); // hapus string kesalahan


        //Ajax Memuat data dari ajax
        $.ajax({
            url: "<?php echo site_url('galery/ajax_edit') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id"]').val(data.id);
                $('[name="nama"]').val(data.nama);
                // $('[name="kelas"]').val(data.kelas);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

                // show photo preview modal
                $('#photo-preview').show();
                if (data.photo) {
                    $('#label-photo').text('Tambah Photo'); // label photo upload
                    $('#photo-preview div').html('<img src="' + base_url + 'upload/' + data.photo + '" class="img-responsive">'); // show photo
                    $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.photo + '"/> Hapus foto saat menyimpan'); // remove photo

                } else {
                    $('#label-photo').text('Upload Photo'); // label photo upload
                    $('#photo-preview div').text('(No photo)');
                }


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Kesalahan mendapatkan data dari ajax');
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('galery/ajax_add') ?>";
        } else {
            url = "<?php echo site_url('galery/ajax_update') ?>";
        }

        // ajax menambahkan data ke basis data

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function delete_person(id) {
        if (confirm('Apakah anda yakin mau menghapus data ini?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('galery/ajax_delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal Menghapus Data');
                }
            });

        }
    }
</script>