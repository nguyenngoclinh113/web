<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Phone</label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Address</label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_order" class="col-md-3 control-label">Date order</label>
                        <div class="col-md-6">
                            <input type="text" id="date_order" name="date_order" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total" class="col-md-3 control-label">Total</label>
                        <div class="col-md-6">
                            <input type="text" id="total" name="total" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-md-3 control-label">Note</label>
                        <div class="col-md-6">
                            <input type="text" id="note" name="note" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="col-md-3 control-label">Status</label>
                        <div class="col-md-6">
                            <select id="status" name="status">
                                <!-- <option>Processing</option> -->
                                <option value="0">Đang xử lí</option>
                                <option value="2">Đang giao hàng</option>
                                <option value="1">Thành công</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="col-md-3 control-label">Payment</label>
                        <div class="col-md-6">
                            <select id="payment" name="payment">
                                <!-- <option>Processing</option> -->
                                <option value="COD">COD</option>
                                <option value="ATM">ATM</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Address ship</label>
                        <div class="col-md-6">
                            <input type="text" id="address_ship" name="address_ship" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                            <button type="button" class="btn btn-primary btn-check-map">Check Address</button>
                        </div>
                    </div>

                    <div id="map-canvas" style="width:100%;height:500px;margin-bottom:50px"></div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArNrTAvZ8Ghgdqae9xXHsCm507YKX8_3w"></script>
<style>
    #map-canvas{
        display: none;
    }
</style>
<script>
$(".btn-check-map").on("click",function(){
    $("#map-canvas").show();
    initMap($("#address_ship").val());
});
function initMap(location) {
    var pointA = "110 Đường Phạm Như Xương, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng",
        pointB = location,
    // var pointA = new google.maps.LatLng(51.7519, -1.2578),
    //     pointB = new google.maps.LatLng(50.8429, -0.1313),
        myOptions = {
            zoom: 7,
            center: pointA
        },
        map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
        }),
        markerA = new google.maps.Marker({
            position: pointA,
            title: "point A",
            label: "A",
            map: map
        }),
        markerB = new google.maps.Marker({
            position: pointB,
            title: "point B",
            label: "B",
            map: map
        });

    // get route from A to B
    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

}



function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidTolls: true,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.DRIVING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}

// initMap();
</script>