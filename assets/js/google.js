

var bsurl = 'index.php';

function  activePlaceSeach() {

    var options = {
        // types: ['(cities)'],
        componentRestrictions: {country: "in"}
    };        

    

    var inp = document.getElementById('FrmCity');
    var inp1 = document.getElementById('toCity');
    var autocomplete = new google.maps.places.Autocomplete(inp,options);
    var autocomplete1 = new google.maps.places.Autocomplete(inp1,options);

    console.log( autocomplete );

    var frmplace = autocomplete.getPlace();
    var toplace = autocomplete1.getPlace();

    
    document.getElementById('fromcitylat').value = frmplace.geometry.location.lat();
    document.getElementById('fromcitylong').value = frmplace.geometry.location.lng();
    // round trip

    var inp2 = document.getElementById('RpPickLoc');
    var inp3 = document.getElementById('RpDropLoc');
    var autocomplete2 = new google.maps.places.Autocomplete(inp2,options);
    var autocomplete3 = new google.maps.places.Autocomplete(inp3,options);

    
}



 function getLocation() {

    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(savePosition, positionError, {timeout:10000});
    }
    else 
    {
        //Geolocation is not supported by this browser
    }
}

 // handle the error here
function positionError(error) {
        
    var errorCode = error.code;
    var message = error.message;
    alert(message);
}

function savePosition(position) {
            
    var lat = position.coords.latitude;
    var lag = position.coords.longitude;

    $.ajax({
            url: bsurl,
            type: "POST",

            data: {
                    lat : lat,
                    lag : lag
            },

            success: function (data) {

            if (data)
            {
                // console.log(data);
                $('#FrmCity').val(data);
                $('#RpPickLoc').val(data);
            }

        },

        error: function (data)
        {
            // alert('Error');
            // alert(data);
            console.log("error");
        }
    });
}











