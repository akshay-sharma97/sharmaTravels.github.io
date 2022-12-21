<?php
    include "header.php";
    $pageName = "Home";
?>


    <section class="frm-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="frmbox">

                        <div class="row mb-4">
                            <div class="col-lg-12 text-center">
                                <h4>GET TAXI <span style="color:#fb5718;"> <b>ONLINE</b> </span></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <ul class="nav nav-tabs">
                                    <li style="width:50%;" class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home"><img class="img-fluid crimg" src="https://www.s3cabsnholidays.com/assets/public/img/oneway.png" alt=""> <span class="frmheads">One Way</span></a>
                                    </li>
                                    <li style="width:50%;" class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile"><img class="img-fluid crimg" src="https://www.s3cabsnholidays.com/assets/public/img/roundway.png" alt=""> <span class="frmheads">Round Way</span></a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content mt-3">
                                    <div class="tab-pane fade active show" id="home">
                                        <input type="hidden" id="bsurl" value="index.php">
                                        <form action="bookcab.php" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Pick Up</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="typeway" value="one">
                                                            <input type="hidden" name="fromcitylat" id="fromcitylat">
                                                            <input type="hidden" name="fromcitylong" id="fromcitylong">
                                                            <input type="text" class="form-control" name="fmcity" id="frmCity" placeholder="From Location.." autocomplete="off" onchange="getfromlatlog();" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-map-marker"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Destination</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="tocitylat" id="tocitylat">
                                                            <input type="hidden" name="tocitylong" id="tocitylong">
                                                            <input type="text" class="form-control" name="tocity" id="toCity" placeholder="To.." autocomplete="off" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Mobile</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="tel" class="form-control" name="mob" placeholder="Mobile Number" minlength="10" maxlength="10" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Pickup Date</label>
                                                    <input type="date" class="form-control" name="pickdate" id="dtPick" min="2022-12-16" value="2022-12-16" placeholder="Date" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Pickup Time</label>
                                                    <input type="hidden" id="crTm" value="14:00">
                                                    <select class="form-control" name="picktime" id="inputTime" required>
                                                        <option value="none">Select Time</option>
                                                    </select>
                                                    <!-- <input type="time" class="form-control" name="picktime" placeholder="Time"> -->
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <div class="bs-travels-data"></div>
                                                <button type="submit" name="showtaxi" class="btn btnshp">GET TAXI</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <form action="bookcab.php" method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Pick Up</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="typeway" value="round">
                                                            <input type="hidden" name="fromcitylatrd" id="fromcitylatrd">
                                                            <input type="hidden" name="fromcitylongrd" id="fromcitylongrd">
                                                            <input type="text" class="form-control" name="fmcity" id="RpPickLoc" placeholder="From Address.." required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Destination</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="tocitylatrd" id="tocitylatrd">
                                                            <input type="hidden" name="tocitylongrd" id="tocitylongrd">
                                                            <input type="text" class="form-control" name="tocity" id="RpDropLoc" placeholder="To.." required>
                                                            <!-- <select name="" class="form-control" required>
                                                                    <option value="">Select Pick Up City</option>
                                                                    <option value="1">Ajmer</option>
                                                                    <option value="2">Bhilwara</option>
                                                                    <option value="3">Jaipur</option>
                                                                </select> -->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Mobile</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <input type="tel" class="form-control" name="mob" placeholder="Mobile Number" minlength="10" maxlength="10" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date</label>
                                                    <input type="hidden" id="crDt" value="2022-12-16">
                                                    <input type="date" class="form-control" id="dtPikr" name="pickdate" placeholder="Date" autocomplete="off" min="2022-12-16" value="2022-12-16" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Time</label>
                                                    <!-- <input type="time" class="form-control" name="picktime" placeholder="Time" required> -->
                                                    <select class="form-control" name="picktime" id="inputRdTime">
                                                        <option value="none">Select Time</option>
                                                    </select>
                                                      <span class="error-msg" id="err-msg5"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Retrun Date</label>
                                                    <input type="date" class="form-control" name="rtndate" id="rtrnDtPikr" placeholder="Date" autocomplete="off" min="2022-12-16" value="2022-12-16" required>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" name="showtaxird" class="btn btnshp">GET TAXI</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                      
        </div>
    </section>

    <!-- ========================================================================= -->

    

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="min-hd">Welcome to Sharma Travels</h1>
                    <h2 class="man-hd">Our Services</h2>
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-lg-6 text-center ourserve">
                    <img class="img-fluid" src="assets/images/taxi_icon.png" alt="">
                    <h4 class="mt-3">Outstations Cabs</h4>
                    <p>We will bring you quickly and drop you comfortably to anywhere in India</p>
                </div>

                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="assets/images/travel_icon.png" alt="">
                    <h4 class="mt-3">Tour Packages</h4>
                    <p>We will provide you comfortable hotel and best tours packages also.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->

    <section class="section2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="tel://+917788994488"><h4 style="color: #fff;"><i class="fas fa-headset"></i> +91-77889 94488</h4></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================= -->

    <section id="tariffs" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="min-hd">Explore</h4>
                    <h2 class="man-hd">Our Tariffs</h2>
                </div>
            </div>

            <div class="row mt-5">
            <?php
                $get_cabs = mysqli_query($con,"SELECT * FROM cabs");

                if( mysqli_num_rows($get_cabs) > 0 ){
                    while( $cab_info = mysqli_fetch_array( $get_cabs ) ){
                        $cab_id = $cab_info['cab_id'];
                        $cab_name = $cab_info['cab_name'];
                        $cab_image = $cab_info['cab_image'];
                        $cab_feature = $cab_info['cab_feature'];
                        $cab_price_perkm = $cab_info['cab_price_perkm'];
                        $discount_rate = $cab_info['discount_rate'];

                        echo <<< data
                            <div class="col-lg-4 text-center">
                                <div class="tarffi-box">
                                    <img class="img-fluid" src="assets/images/$cab_image" alt="$cab_name">
                                    <h4 class="mt-3">$cab_name</h4>
                                    <p> $cab_name for a drive around the city at your service</p>
                                    <p> $cab_feature </p>
                                    <h4 class="fntclr mt-4"><i class="fas fa-rupee-sign"></i> $cab_price_perkm/KM</h4>
                                </div>
                            </div>
                        data;
                        


                    }
                }else{
                    echo <<< data
                        <div class="col-12">
                            <div class="p-5 text-center" style="margin-top: 50px; margin-bottom: 50px;">
                                <h2> Cabs not available!! </h2>
                            </div>
                        </div>
                    data;
                }
                
            ?> 
            </div>


        </div>
    </section> 

    <!-- ========================================================================= -->

    

    <?php
        include "footer.php";
    ?>





    <script>
        $( window ).on( "load", function() {
            var onewayTimes = document.getElementById("inputTime");
            var rdwayTimes = document.getElementById("inputRdTime");
            
            let rdwayinnerHTMLstr = "<option value='none'>Select Time</option>";
            let onwayinnerHTMLstr = "<option value='none'>Select Time</option>";

            let h = 0;
            let m = 0;
            let str = "AM";
            let hh = "00";
            let mm = "00";
                
            while( true ){
                onwayinnerHTMLstr += "<option value='"+ hh + ":" + mm + " " + str +"'>" + hh + ":" + mm + " " + str + "</option>";
                rdwayinnerHTMLstr += "<option value='"+ hh + ":" + mm + " " + str +"'>" + hh + ":" + mm + " " + str + "</option>";
                m += 15;

                mm = "" +m;
                if( m == 60 ){
                    m = 0;
                    mm = "0" + 0;
                    h++;
                
                }
                if( h >= 0 && h < 10 ){
                    hh = "0"+h;
                }else{
                    hh = ""+h;
                }
                
                if( h == 12 ){
                    str = "PM";
                }
                
                if( h == 24 ){
                    break;
                }
            }
            onewayTimes.innerHTML = onwayinnerHTMLstr;
            rdwayTimes.innerHTML = rdwayinnerHTMLstr;
        });
        
    </script>
    <script type="text/javascript">


        $(document).ready(function(){
           
            var autocomplete_to, autocomplete_from;
            var to = 'toCity', from = 'frmCity';
    
           //start for to google autocomplete with lat and long
            autocomplete_to = new google.maps.places.Autocomplete((document.getElementById(to)),{
                types:['geocode'],
            })
            google.maps.event.addListener(autocomplete_to,'place_changed',function(){
    
               var place = autocomplete_to.getPlace();
               jQuery("#tocitylat").val(place.geometry.location.lat());
               jQuery("#tocitylong").val(place.geometry.location.lng());
    
            })
           //end for to google autocomplete with lat and long
    
           //start for from google autocomplete with lat and long
            autocomplete_from = new google.maps.places.Autocomplete((document.getElementById(from)),{
                types:['geocode'],
            })
            google.maps.event.addListener(autocomplete_from,'place_changed',function(){
    
               var place = autocomplete_from.getPlace();
               jQuery("#fromcitylat").val(place.geometry.location.lat());
               jQuery("#fromcitylong").val(place.geometry.location.lng());
    
            })
            //end for from google autocomplete with lat and long
    
    
    
            var rd_autocomplete_to, rd_autocomplete_from;
            var rd_to = 'RpDropLoc', rd_from = 'RpPickLoc';
            
           //start for to google autocomplete with lat and long
            rd_autocomplete_to = new google.maps.places.Autocomplete((document.getElementById(rd_to)),{
                types:['geocode'],
            })
            google.maps.event.addListener(rd_autocomplete_to,'place_changed',function(){
    
               var place = rd_autocomplete_to.getPlace();
               jQuery("#tocitylatrd").val(place.geometry.location.lat());
               jQuery("#tocitylongrd").val(place.geometry.location.lng());
    
            })
           //end for to google autocomplete with lat and long
    
           //start for from google autocomplete with lat and long
           rd_autocomplete_from = new google.maps.places.Autocomplete((document.getElementById(rd_from)),{
                types:['geocode'],
            })
            google.maps.event.addListener(rd_autocomplete_from,'place_changed',function(){
    
               var place = rd_autocomplete_from.getPlace();
               jQuery("#fromcitylatrd").val(place.geometry.location.lat());
               jQuery("#fromcitylongrd").val(place.geometry.location.lng());
    
            })
            //end for from google autocomplete with lat and long
    
        });
    </script>