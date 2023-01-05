    <div class="row">
        <div class="col-md-12">
        <?php
        if (empty($_GET['alert'])) {
            echo "";
        }

        elseif ($_GET['alert'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> Employee saved!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
 
        elseif ($_GET['alert'] == 2) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> Employee data updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
 
        elseif ($_GET['alert'] == 3) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> Employee data has been deleted!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
 
        elseif ($_GET['alert'] == 4) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-times-circle"></i> Uh oh,</strong> NIP <b><?php echo $_GET['nip']; ?></b> is already exist!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
            
            <table id="tabel-pegawai" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Picture</Picture></th>
                        <th>NIP</th>
                        <th>Name</th>
                        <th>Place and DOB</th>
                        <th>Birth date</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var table = $('#tabel-pegawai').DataTable( {
            "bAutoWidth": false,
            "scrollY": '58vh',
            "scrollCollapse": true,
            "processing": true,
            "serverSide": true,
            "ajax": 'emp_data.php',
            "columnDefs": [ 
                { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'center' },
                { "targets": 1, "data": null, "orderable": false, "searchable": false, "width": '45px', "className": 'center',
                  "render": function(data, type, row) {
                      var foto = "<img class=\"foto-thumbnail\" src=\"foto/"+data[ 1 ]+"\" alt=\"Foto Pegawai\">";
                      return foto;
                  } 
                },
                { "targets": 2, "width": '100px', "className": 'center' },
                { "targets": 3, "width": '170px' },
                {   "targets": 4, "width": '190px',
                    "render": function ( data, type, row ) {
                        return data +', '+ row[ 5 ];
                    }
                },
                { "targets": 5, "visible": false },
                { "targets": 6, "width": '30px', "className": 'center' },
                { "targets": 7, "width": '70px', "className": 'center' },
                { "targets": 8, "width": '180px' },
                { "targets": 9, "width": '80px', "className": 'center' },
                {
                  "targets": 10, "data": null, "orderable": false, "searchable": false, "width": '80px', "className": 'center',
                  "render": function(data, type, row) {
                      var btn = "<a style=\"margin-right:7px\" title=\"Ubah\" class=\"btn btn-outline-info btn-sm\" href=\"?page=ubah&nip="+data[ 10 ]+"\"><i class=\"fas fa-edit\"></i></a><span><a title=\"Delete Data\" class=\"btn btn-outline-danger btn-sm\" href=\"delete_emp.php?nip="+data[ 10 ]+"\"><i class=\"fas fa-trash\"></i></a></span>";
                      return btn;
                  } 
                } 
            ],
            "order": [[ 3, "asc" ]],
            "iDisplayLength": 10,
            "rowCallback": function (row, data, iDisplayIndex) {
                var info   = this.fnPagingInfo();
                var page   = info.iPage;
                var length = info.iLength;
                var index  = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        } );

        $('#tabel-pegawai tbody').on( 'click', 'span', function () {
            var data = table.row( $(this).parents('tr') ).data();
            return confirm("Anda yakin ingin menghapus pegawai "+ data[ 3 ] +" ?" );
        } );
    } );
    </script>