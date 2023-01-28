<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add </button>
            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            <button onclick="printContent('div')" class="btn btn-danger"> <i class="fa fa-print"></i> Print</button>
            <!-- <button onClick="window.print();">Print</button> -->
            <br />
            <div id="div">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead id="thead">
                        <tr>

                            <th>Foto</th>
                            <th>Nama</th>
                            <th>SKHUN</th>
                            <th>NISN</th>
                            <!-- <th>Kelas</th> -->
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Sekolah Asal</th>
                            <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
                            <!-- <th>HP Wali</th> -->
                            <th>Email</th>
                            <th>Jurusan</th>
                            <!-- <th>status</th> -->
                            <th style="width:150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>SKHUN</th>
                            <th>NISN</th>
                            <!-- <th>Kelas</th> -->
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Sekolah Asal</th>
                            <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
                            <!-- <th>HP Wali</th> -->
                            <th>Email</th>
                            <th>Jurusan</th>
                            <!-- <th>status</th> -->
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
                            <input type="hidden" value="" name="id" />
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
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input name="nama" placeholder="Masukan Nama" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">SKHUN</label>
                                    <div class="col-md-9">
                                        <input name="skhun" placeholder="Masukan skhun" class="form-control" type="integer">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">NISN</label>
                                    <div class="col-md-9">
                                        <input name="nis" placeholder="Masukan Nis" class="form-control" type="integer">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-9">
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tahun Masuk</label>
                                    <div class="col-md-9">
                                        <input name="tahun_masuk" placeholder="Masukan Tahun Masuk" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">TTL</label>
                                    <div class="col-md-9">
                                        <input name="ttl" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" placeholder="Masukan Alamat" class="form-control"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Agama</label>
                                    <div class="col-md-9">
                                        <select name="agama" class="form-control">
                                            <option value="">--Pilih Agama--</option>
                                            <option value="islam">islam</option>
                                            <option value="kristen_protestan">kristen protestan</option>
                                            <option value="kristen_katolik">kristen katolik</option>
                                            <option value="hindu">hindu</option>
                                            <option value="buddha">buddha</option>
                                            <option value="konghucu">konghucu</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Sekolah Asal</label>
                                    <div class="col-md-9">
                                        <input name="sekolah_asal" placeholder="Masukan Sekolah Asal" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Ibu</label>
                                    <div class="col-md-9">
                                        <input name="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Ayah</label>
                                    <div class="col-md-9">
                                        <input name="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                            <label class="control-label col-md-3">HP Wali</label>
                            <div class="col-md-9">
                                <input name="telp" placeholder="Masukan NO HP" class="form-control" type="telp">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">E-mail</label>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="Masukan E-mail" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jurusan</label>
                                    <div class="col-md-9">
                                        <select name="jurusan" id="jurusan">
                                            <?php foreach ($project as $jurusan) : ?>
                                                <option value="<?php echo $jurusan->jurusan ?>"><?php echo $jurusan->jurusan ?></option>
                                            <?php endforeach ?>
                                        </select>
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

        <script>
            function printContent(el) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
        </script>