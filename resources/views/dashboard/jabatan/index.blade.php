<!-- Menghubungkan dengan view template master -->
@extends('dashboard.template')

@section("konten")
<div id="appjabatan">
    <div class="row justify-content-end">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Jabatan Files</h3>
                    <h6 class="font-weight-normal mb-0">You Have 100 <span class="text-primary"> Jabatan!</span></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="pull-right">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">
                            <i class="ti-file btn-icon-prepend"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" name="name_jabatan">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tunjangan:</label>
                        <input type="text" class="form-control" name="tunjangan"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Sallary:</label>
                        <input type="text" class="form-control" name="sallary"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="postdatajabatan()" data-dismiss="modal"
                        class="btn-submit btn btn-primary">Send
                        message</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Jabatan</label>
                                    <input id="jabataninput" type="text" name="jabatans" class="form-control"
                                        placeholder="Another input">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tunjangan</label>
                                    <input id="tunjanganinput" type="text" name="tunjangans" class="form-control"
                                        placeholder="Another input">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Sallary</label>
                                    <input id="sallaryinput" type="text" name="sallarys" class="form-control"
                                        placeholder="Another input">
                                </div>


                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="id_data" type="hidden" name="idsdata" class="form-control"
                                        placeholder="Another input">
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="UpdateDataJabatan()" data-dismiss="modal"
                        class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <table id="table_jabatan" class="display expandable-table dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="sorting">No</th>
                                    <th class="sorting">Jabatan</th>
                                    <th class="sorting">Tunjangan</th>
                                    <th class="sorting">Salary</th>
                                    <th class="sorting">Action</th>
                                </tr>
                            </thead>

                        </table>



                    </div>
                </div>

            </div>


        </div>
    </div>

</div>
</div>
<!-- content-wrapper ends -->

<style>
    .tinggi {
        height: 35px;
        border-radius: 4px !important;
        align-items: center;
        display: flex;
    }

</style>

@endsection

@section("script")
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {});


    function postdatajabatan() {
        var jabatan = $("input[name=name_jabatan]").val();
        var tunjangan = $("input[name=tunjangan]").val();
        var sallary = $("input[name=sallary]").val();
        console.log(tunjangan);
        console.log(jabatan);
        console.log(sallary);
        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxjabatanPost') }}",

            data: {
                name_jabatan: jabatan,
                tunjangan: tunjangan,
                sallary: sallary,
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                vmJabatan.table.clear().draw();
                Swal.fire({
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                vmJabatan.appendTable();
            },
            error(response, textStatus, errorThrown) {
                vmJabatan.table.clear().draw();
                Swal.fire({
                    icon: 'error',
                    title: 'Not been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                vmJabatan.appendTable();
            }

        });
    }

    function UpdateDataJabatan() {
        var jabatans = $("input[name=jabatans]").val();
        var tunjangans = $("input[name=tunjangans]").val();
        var sallarys = $("input[name=sallarys]").val();
        var idsdata = $("input[name=idsdata]").val();
        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxjabatanUpdate') }}",
            data: {
                name_jabatan: jabatans,
                tunjangan: tunjangans,
                sallary: sallarys,
                id_jabatan: idsdata,
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                vmJabatan.table.clear().draw();
                Swal.fire({
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                vmJabatan.appendTable();
            },
            error(response, textStatus, errorThrown) {
                vmJabatan.table.clear().draw();
                Swal.fire({
                    icon: 'error',
                    title: 'Not been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                vmJabatan.appendTable();
            }
        });


    }

</script>
<script>
    var vmJabatan = new Vue({
        el: "#appjabatan",
        data: {
            table: '',
            no: 1,
            filterForm: {
                startDate: '',
                endDate: '',
                timeZone: '',
                category: '0',
                outlet: [],
                limit: 30,
                offset: 0,
                dataType: '1',
                shift: [],
                dataCategory: 1,
            },
        },
        methods: {

            getDatatable() {
                $(function () {
                    vmJabatan.table = $('#table_jabatan').DataTable({
                        paging: true,
                        serverSide: false,
                        destroy: true,
                        order: [
                            [1, 'asc']
                        ],
                        dom: "<'row'<'col-sm-6'l><'col-sm-6'Bf>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        responsive: true,
                        stateSave: true,
                        columnDefs: [{
                            type: 'formatted-num',
                            targets: [-1],
                            render: function (data, type, columns, metam, row) {
                                data =
                                    '<div class="container"><div class="row"><div class="col-lg-5"><button type="button" class="btn btn-warning tinggi " data-toggle="modal" data-target="#exampleModalLong"><i class="bi bi-pencil-square"></i></button></div><div class="col-lg-4"><a id="delete"    class="btn btn-danger tinggi " ><i class="bi bi-trash"></i></a></div><div></div>';
                                return data;
                            },
                        }, ],
                    });
                    $('#table_jabatan tbody').on('click', 'button', function () {
                        var data = vmJabatan.table.row($(this).parents('tr')).data();
                        var a = document.getElementById("jabataninput").value = data[1];
                        var b = document.getElementById("tunjanganinput").value = data[2];
                        var c = document.getElementById("sallaryinput").value = data[3];
                        var d = document.getElementById("id_data").value = data[4];

                    });
                    $('#table_jabatan tbody').on('click', 'a', function () {
                        var data = vmJabatan.table.row($(this).parents('tr')).data();
                         var idsdata = data[4];
                        $.ajax({
                            type: 'post',
                            url: "{{ route('deleteJabatan') }}",
                            data: {
                                 id_jabatan: idsdata,
                                _token: "{{csrf_token()}}"
                            },
                            success: function (data) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Your work has been saved',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                vmJabatan.table.clear().draw();
                                vmJabatan.appendTable();
                            },
                            error(response, textStatus, errorThrown) {
                                vmJabatan.table.clear().draw();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Not been saved',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                vmJabatan.appendTable();
                            }
                        });
                    });
                });
            },
            appendTable() {
                var data = {};
                $.ajax({
                    url: '/getJabatan',
                    type: 'POST',
                    data: {
                        data,
                        _token: "{{csrf_token()}}"
                    },
                    success(response) {
                        console.log(response);
                        $.each(response.data, function () {
                            vmJabatan.table.row.add([
                                vmJabatan.no++,
                                this.jabatan,
                                this.tunjangan,
                                this.sallary,
                                this.id,
                            ]).draw();
                        }); //each end

                    },
                    error(response, textStatus, errorThrown) {

                        console.log("error")
                    }
                })
            },

        },
        mounted() {
            $(function () {
                setTimeout(function () {
                    vmJabatan.appendTable();

                    vmJabatan.getDatatable();
                }, 100);

            });
        },
    });

</script>
@endsection
