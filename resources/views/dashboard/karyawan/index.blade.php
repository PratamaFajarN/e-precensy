<!-- Menghubungkan dengan view template master -->
@extends('dashboard.template')

@section("konten")
<div id="appemploye">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Employee Files</h3>
                    <h6 class="font-weight-normal mb-0">You Have 100<span class="text-primary"> employee!</span></h6>
                </div>


            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">


                <div class="row">
                    <div class="col-12">
                        <table id="table_id" class="display expandable-table dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="sorting">No</th>
                                    <th class="sorting">Name</th>
                                    <th class="sorting">Gender</th>
                                    <th class="sorting">Email</th>
                                    <th class="sorting">Company</th>
                                    <th class="sorting">Jabatan</th>
                                    <th class="sorting">Alamat</th>
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



@endsection

@section("script")

<script>
    var vmKaryawan = new Vue({
        el: "#appemploye",
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
                    vmKaryawan.table = $('#table_id').DataTable({
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
                            targets: [3, 4, 5]
                        }],



                    });


                });
            },
            appendTable() {
                var data = {};
                $.ajax({
                    url: '<?=$getemploye?>',
                    type: 'POST',
                    data: {
                        data,
                        _token: "{{csrf_token()}}"
                    },
                    success(response) {
                        console.log(response);
                        $.each(response.data, function () {
                            vmKaryawan.table.row.add([
                                vmKaryawan.no++,
                                this.name,
                                this.gender,
                                this.email,
                                this.company,
                                this.jabatan,
                                this.alamat,

                            ]).draw();
                        }); //each end

                    },
                    error(response, textStatus, errorThrown) {

                        Alert.error("Error", "Coba Lagi")
                    }
                })
            },

        },
        mounted() {
            $(function () {
                setTimeout(function () {
                    vmKaryawan.appendTable();

                    vmKaryawan.getDatatable();
                }, 100);

            });
        },
    });

</script>
@endsection
