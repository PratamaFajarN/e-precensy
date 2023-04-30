@extends('dashboard.template')

@section("konten")

<div class="container">
    <div class="row">
        <div class="col lg-12">
            <h2 id="titles" class="text-primary">
                Your Company Location
            </h2>

        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-16">
            <div id='map' style='width: 500px; height: 80%;'></div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="formFile" class="form-label">Your Logo</label>
                <br>
                <div class="container">
                    <img src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.webp" alt=""
                        width="50" height="50">
                </div>
                <br>
                <br>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Your Company Name</label>
                <input type="text" id=nameprofile class="form-control" name="companyname" placeholder=" ">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Location</label>
                <input id="locationMap" type="text" class="form-control" name="location" placeholder=" ">

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class='input-group date' id='JamMasuk'>
                            <input id="jamBuka" type='text' name='Jammasuk' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class='input-group date' id='JamKeluar'>
                            <input id="jamTutup" type='text' name='Jamkeluar' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <button type="button" onclick="CompanyUpdate()" class="btn btn-primary">Submit</button>

        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    $(function () {
        $('#JamKeluar').datetimepicker({
            format: 'LT'
        });
        $('#JamMasuk').datetimepicker({
            format: 'LT'
        });
    });


     async function getProfile()  {
        let response = await fetch('http://localhost:8000/getMap');
        let data = await response.json();
        let long = data.data[0].long;
        let lat = data.data[0].lat;

        document.getElementById("nameprofile").value = String(data.data[0].companyname);
         document.getElementById("titles").innerHTML = String(data.data[0].companyname);
        document.getElementById("locationMap").value = String(data.data[0].location);
        document.getElementById("jamBuka").value = String(data.data[0].jamBuka);
        document.getElementById("jamTutup").value = String(data.data[0].jamTutup);

        mapboxgl.accessToken =
            'pk.eyJ1IjoicGZqcm4xNyIsImEiOiJjbGZmbnk1ZWMzcjFrM3NudDV4NmdvZDNhIn0.kCQk7dMWs_2c9AIHXYpFVQ';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/dark-v11', // style URL
            center: [long, lat], // starting position [lng, lat]
            zoom: 15, // starting zoom


        });

        const marker = new mapboxgl.Marker()
            .setLngLat([long, lat])
            .addTo(map);


    }
    getProfile();



    function CompanyUpdate() {
        var companyname = $("input[name=companyname]").val();
        var location = $("input[name=location]").val();
        var Jammasuk = $("input[name=Jammasuk]").val();
        var Jamkeluar = $("input[name=Jamkeluar]").val();
        var regex = new RegExp('@(.*),(.*),');
        var lat_long_match = location.match(regex);
        var lat = lat_long_match[1];
        var long = lat_long_match[2];

        $.ajax({
            type: 'POST',
            url: "{{ route('updateCompany') }}",
            data: {
                companys: companyname,
                local: location,
                jmMasuk: Jammasuk,
                lattitude: lat,
                longtitude: long,
                jmKeluar: Jamkeluar,
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                   getProfile();
                Swal.fire({
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });

            },
            error(response, textStatus, errorThrown) {

                Swal.fire({
                    icon: 'error',
                    title: 'Not been saved',
                    showConfirmButton: false,
                    timer: 1500
                });

            }

        });
    }

</script>
@endsection
