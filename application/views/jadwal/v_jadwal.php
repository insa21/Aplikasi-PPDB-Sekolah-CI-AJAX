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
                        <th>Gelombang</th>
                        <th>Pendaftaran</th>
                        <th>Test Tulisan dan Wawancara</th>
                        <th>Test Kesehatan</th>
                        <th>Pengumuman Hasil Test</th>
                        <th>Daftar Ulang</th>
                        <th style="width:150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Pendaftaran</th>
                        <th>Test Tulisan dan Wawancara</th>
                        <th>Test Kesehatan</th>
                        <th>Pengumuman Hasil Test</th>
                        <th>Daftar Ulang</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- isi di dalam script -->


        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Jadwal</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id" />
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">gelombang</label>
                                    <div class="col-md-9">
                                        <input name="gelombang" placeholder="Masukan gelombang" class="form-control" type="integer">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pendaftaran</label>
                                    <div class="col-md-9">
                                        <input name="pendaftaran" placeholder="Masukan Pendaftaran" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Test Tulisan dan Wawancara</label>
                                    <div class="col-md-9">
                                        <input name="test" placeholder="Masukan Test Tulisan dan Wawancara" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Test Kesehatan</label>
                                    <div class="col-md-9">
                                        <input name="kesehatan" placeholder="Masukan Test Kesehatan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pengumuman Hasil Test</label>
                                    <div class="col-md-9">
                                        <input name="pengumuman" placeholder="Masukan Pengumuman Hasil Test" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Daftar Ulang</label>
                                    <div class="col-md-9">
                                        <input name="ulang" placeholder="Masukan Daftar Ulang" class="form-control" type="text">
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