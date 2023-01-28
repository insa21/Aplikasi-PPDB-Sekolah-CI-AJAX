
        <div class="col-md-12">
         <div class="panel">
                <div class="panel-body">
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add </button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>

                    <th>Foto</th>
                    <th>Pembuat</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>NKS</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Tujuan</th>
                    <th>Kebijakan</th>
                    <th>Moto</th>
                    <th>Selengkapnya</th>
                    <th style="width:150px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
                <th>Foto</th>
                <th>Pembuat</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>NKS</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Tujuan</th>
                <th>Kebijakan</th>
                <th>Moto</th>
                <th>Selengkapnya</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>


    <!-- isi di dalam script -->
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>



    <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Pendaftaran Siswa</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pembuat</label>
                            <div class="col-md-9">
                                <input name="pembuat" placeholder="Masukan Pembuat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-9">
                                <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat</label>
                            <div class="col-md-9">
                                <input name="tempat" placeholder="Masukan Tempat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">NKS</label>
                            <div class="col-md-9">
                                <input name="nks" placeholder="Masukan Nama Kepala Sekolah" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Visi</label>
                            <div class="col-md-9">
                                <textarea name="visi" placeholder="Masukan Visi" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Misi</label>
                            <div class="col-md-9">
                                <textarea name="misi" placeholder="Masukan Misi" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tujuan</label>
                            <div class="col-md-9">
                                <textarea name="tujuan" placeholder="Masukan Tujuan" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kebijakan</label>
                            <div class="col-md-9">
                                <textarea name="kebijakan" placeholder="Masukan Kebijakan" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Moto</label>
                            <div class="col-md-9">
                                <textarea name="moto" placeholder="Masukan Moto" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Selengkapnya</label>
                            <div class="col-md-9">
                                <textarea name="selengkapnya" placeholder="Masukan Selengkapnya" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>