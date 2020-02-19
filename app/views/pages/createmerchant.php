<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/admin.php'  ?>
<?php
header(URLROOT . '/pages/createmerchant');
?>

<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;
        font-size: 12px
    }

    .pinput {
        padding: 4px !important;
        width: 100%;
        border: 1px solid green;
    }
</style>

<!-- Commhr content goes here -->

<body onload='initMap()'>
    <div class="content-wrapper">
        <div class="row" style='padding-left:20px'>
            <div class='col-md-6'>
                <h3 style='color:orange'>REGISTRATION AND DUE DILIGENCE</h3>
            </div>

            <div class='col-md-4'>
                <div class="formarea"></div>
                <input type='text' class="form-control" id='address' />
            </div>


            <div class='col-md-1'>
                <span class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</span>
            </div>
        </div>
        <hr style='background:#fff' />

        <div class='row' style='padding:5px'>

            <div class='col-md-6'>
                <?php
                if (isset($_SESSION["error"])) {
                    $data['error'] = $_SESSION["error"];
                    echo "<div class='alert alert-danger alert-dismissible'> <strong>Error!</strong> $error<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
                }
                ?>
                <?php
                $imgpath = URLROOT . 'img/done.png';
                $createmerchant = URLROOT . 'pages/createmerchant';
                if (isset($_SESSION["success"])) {
                    $data['success'] = $_SESSION["success"];
                    $success = $data['success'];;
                    echo "<div class='alert alert-success alert-dismissible'><strong>Success!</strong> $success<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
                    $urlpath = URLROOT . 'pages/reviewmerchant/' . $data['location_id'] . '/' . $data['business_id'];
                    echo "<center><img  width='300px' src='$imgpath' alt='Done'></center>";
                    echo "<center><a href='$urlpath'><span class='btn btn-primary btn-sm form-control'>Check Out Info</span></a><center>";
                    echo "<center><span onclick='checkout()' class='btn btn-primary btn-sm form-control'>Register Another Business</span><center>";
                }
                ?>
                <div id="tabs" <?php
                                if (isset($_SESSION["success"])) {
                                    echo "style='display:none'";
                                    echo "<script>window.localStorage.clear();</script>";
                                }
                                ?>>


                    <ul style="background:#fff">
                        <li><a href="#tabs-1">Basic </a></li>
                        <li id='addresses'><a href="#tabs-2">Location</a></li>
                        <li><a href="#tabs-3">Attributes</a></li>
                        <li id='affiliates'><a href="#tabs-4">Affiliates</a></li>
                        <li id='managers'><a href="#tabs-5">Managers</a></li>
                    </ul>
                    <form action="" method="post">

                        <div id="tabs-1">
                            <table width="100%" class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                                <tr>
                                    <td width='320'>
                                        <input type='text' class="form-control" id='searchtxt' placeholder='Search by Business Reg No, TIN No' /></td>
                                    <td><span class="btn btn-primary pull-left " id='searchbtn'> <i class='fa fa-search'></i> </span></td>
                                </tr>

                                <tr>
                                    <td colspan='2'>
                                        <span style='color:#000' id='resnotification'></span>
                                        <span style='color:red' id='messageinfo'></span>
                                    </td>
                                </tr>
                            </table>



                            <table width="100%" class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                                <tr>
                                    <td><span class='alabel'>Type of Account</span></td>
                                    <td class="afteritem">
                                        <select name="accounttype" class="form-control" id='accountype'>
                                            <option value="1">Merchant</option>
                                            <option value="2">Super Agent</option>
                                            <option value="3">Fixed Agent</option>
                                            <option value="4">Mobile Agent</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class='alabel'>Business Name</span></td>
                                    <td class="afteritem"><input type="text" name="businessname" class="tx_businness" id="businessname" style="width:100%" /></td>
                                </tr>

                                <tr>

                                    <td><span class='alabel'>TIN #:</span></td>
                                    <td class="afteritem">
                                        <input type="text" class="tx_businness" name="tin" id="tin" style="width:100%" />
                                    </td>
                                </tr>
                                <tr>



                                    <td><span class='alabel'>Nature of Business</span></td>
                                    <td class="afteritem"> <input type="text" class="tx_businness" name="natureofbusiness" id="natureofbusiness" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Telephone</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="telephone" class="tx_businness" id="telephone" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Mobile No:</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="atelephone" class="tx_businness" id="atelephone" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Email Address:</span></td>
                                    <td class="afteritem">

                                        <input type="text" name="businessemail" class="tx_businness" id="businessemail" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Website</span></td>
                                    <td class="afteritem">

                                        <input type="text" name="website" class="tx_businness" id="website" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><span class='alabel'>&nbsp</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="afteritem">
                                        <span class="btn btn-primary btn-sm btn-block pull-left" id='firstbtn'>Next</span>
                                    </td>
                                </tr>

                            </table>



                        </div>
                        <div id="tabs-2">

                            <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                                <tr>
                                    <td><span class='alabel'>Latitude</span></td>
                                    <td class="afteritem"><input type="text" name="latitude" id="latitude" style="width:100%" /></td>
                                </tr>

                                <tr>

                                <tr>
                                    <td><span class='alabel'>Longitude</span></td>
                                    <td class="afteritem"><input type="text" name="longitude" id="longitude" style="width:100%" /></td>
                                </tr>

                                <tr>

                                <tr>
                                    <td><span class='alabel'>Popular Name</span></td>
                                    <td class="afteritem"><input type="text" name="popularname" id="popularname" style="width:100%" /></td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>House/Building No:</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="buildingno" id="buildingno" style="width:100%" />
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class='alabel'>Unit No:</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="unitno" id="unitno" style="width:100%" />
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class='alabel'>Street Address</span></td>
                                    <td class="afteritem">
                                        <input type="text" id="street" name="street" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>City</span></td>
                                    <td class="afteritem">
                                        <input name="city" type="text" id="city" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Assembly</span></td>
                                    <td class="afteritem">

                                        <input name="assembly" type="text" id="assembly" style="width:100%" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Region</span></td>
                                    <td class="afteritem">

                                        <input name="region" type="text" id="region" style="width:100%" />
                                    </td>
                                </tr>
                            </table>
                            <div id='adarea'></div>
                            <table>
                                <tr>
                                    <td></td>
                                    <td class="afteritem">
                                        <span class="btn btn-primary btn-sm btn-block pull-left" id='secondbtn'>Next</span>
                                    </td>
                                </tr>

                            </table>

                        </div>

                        <div id='tabs-3'>
                            <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                                <br />
                                <tr>

                                <tr>
                                    <td><span class='alabel'>Business Type</span></td>
                                    <td class="afteritem">
                                        <select class="form-control" name="businesstype" id='businesstype'>
                                            <option value=''>Select</option>
                                            <option value="Individual / Sole Proprietor">Individual / Sole Proprietor</option>
                                            <option value="Partnership">Partnership</option>
                                            <optio value="Corporation">Corporation</option>
                                                <option value="Non-profit organization">Non-profit organization</option>
                                                <option value="Government Entity">Government Entity</option>
                                        </select>

                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Business Category</span></td>
                                    <td class="afteritem">
                                        <select class="form-control" name="businesscategory" id='businesscategory'>
                                            <option vlaue=''>Select</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Banking"> Banking</option>
                                            <option value="Ecommerce">Ecommerce</option>
                                            <option value="ICT Infrastructure">ICT Infrastructure</option>


                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Estimated Annual Revenue</span></td>
                                    <td class="afteritem">
                                        <select name="revenue" class="form-control" id='revenue'>
                                            <option selected disabled value=''>Select</option>
                                            <option value="GHC 10,000 - GHC 100,000">GHC 10,000 - GHC 100,000</option>
                                            <option value="GHC 100, 000 - GHC 200,000">GHC 100, 000 - GHC 200,000</option>
                                            <option value="GHC 200,000 - GHC 300,000">GHC 200,000 - GHC 300,000</option>
                                            <option value="GHC 300,000 - GHC 400,000">GHC 300,000 - GHC 400,000</option>
                                            <option value="GHC 400,000 - GHC 500,000">GHC 400,000 - GHC 500,000</option>
                                            <option value="GHC 500,000 and above">GHC 500,000 and above</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Number of employees</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="numberofemployees" id='numberofemployees' value="" class='form-control' />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Number of branches</span></td>
                                    <td class="afteritem">
                                        <input type="text" name="numberofbranches" id='numberofbranches' value="" class='form-control' />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='alabel'>Average Annual Account Balance</span></td>
                                    <td class="afteritem">

                                        <input type="text" name="averagerevenue" id='averagerevenue' value="" class='form-control' />
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class='btn btn-primary btn-sm' id='next3'>
                                            Next</span></td>
                                </tr>

                            </table>

                        </div>

                        <div id='tabs-4'>

                            <div id='afarea'></div>
                            <table>
                                <tr>
                                    <td><span class='btn btn-primary btn-sm' id='next4'>
                                            Next</span></td>
                                </tr>
                            </table>

                        </div>

                        <div id='tabs-5'>
                            <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                                <tr>

                                <tr>
                                    <td><span class='alabel'>Name</span></td>
                                    <td class="afteritem"><input type="text" id="accountsname" style="width:100%" /></td>
                                </tr>

                                <tr>

                                <tr>
                                    <td><span class='alabel'>Telephone</span></td>
                                    <td class="afteritem"><input type="text" id="accountstelephone" style="width:100%" /></td>
                                </tr>

                                <tr>

                                <tr>
                                    <td><span class='alabel'>Department</span></td>
                                    <td class="afteritem"><input type="text" id="department" style="width:100%" /></td>
                                </tr>


                                <tr>

                                <tr>
                                    <td><span class='alabel'>Email Address</span></td>
                                    <td class="afteritem"><input type="text" id="accountsemail" style="width:100%" /></td>
                                </tr>

                                <tr>
                                    <td style="float: left"><button href="<?php echo URLROOT . "pages/review" ?>" class='btn btn-success btn-sm' id='previewinfo'><i class='fa fa-save'></i>
                                            Submit Data</button></td>

                                    <!-- <td style="float: right"><button class='btn btn-success btn-sm' id='submitinfo'><i class='fa fa-save'></i>
                                            Save Data</button></td> -->
                                </tr>


                            </table>

                        </div>

                    </form>
                </div>


            </div>

            <div class='col-md-6'>
                <div id="map" style="padding-left: 10px; height: 390px"></div>
                <div id="pano" style="padding: 10px; height: 200px; margin-top:10px"> </div>


            </div>

        </div>

    </div>

    </div>
</body>


<?php
unset($_SESSION["error"]);
unset($_SESSION["success"]);

?>




<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>

<script type='text/javascript'>
    function checkout() {
        window.localStorage.clear();
        window.location.href = "<?php echo $createmerchant; ?>";


    }
    //Business Info
    // $("#accountype").text(window.localStorage.getItem('accountype'));
    $accounttype = window.localStorage.getItem('accountype');
    // $('#accountype option[value=$accounttype]').attr("selected", "selected");
    $('accountype').val($accounttype);

    $("#businessname").val(window.localStorage.getItem('businessname'));
    $("#tin").val(window.localStorage.getItem('tin'));
    $("#natureofbusiness").val(window.localStorage.getItem('natureofbusiness'));
    $("#telephone").val(window.localStorage.getItem('telephone'));
    $("#atelephone").val(window.localStorage.getItem('atelephone'));
    $("#businessemail").val(window.localStorage.getItem('businessemail'));
    $("#website").val(window.localStorage.getItem('website'));

    //Location Info
    $("#latitude").val(window.localStorage.getItem('latitude'));
    $("#longitude").val(window.localStorage.getItem('longitude'));
    $("#popularname").val(window.localStorage.getItem('popularname'));
    $("#buildingno").val(window.localStorage.getItem('buildingno'));
    $("#unitno").val(window.localStorage.getItem('unitno'));
    $("#street").val(window.localStorage.getItem('street'));
    $("#city").val(window.localStorage.getItem('city'));
    $("#region").val(window.localStorage.getItem('region'));
    $("#assembly").val(window.localStorage.getItem('assembly'));

    //Business Info
    $("#businesstype").val(window.localStorage.getItem('businesstype'));
    $("#businesscategory").val(window.localStorage.getItem('businesscategory'));
    $("#revenue").val(window.localStorage.getItem('revenue'));
    $("#numberofemployees").val(window.localStorage.getItem('numberofemployees'));
    $("#numberofbranches").val(window.localStorage.getItem('numberofbranches'));
    $("#averagerevenue").val(window.localStorage.getItem('averagerevenue'));


    $('#tabs').tabs();

    $('#firstbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 1);
    })

    $('#secondbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 2);
    })

    // $('#addresses').click(function() {

    //     var biztin = $('#tin').val();

    //     $.ajax({
    //         type: "POST",
    //         url: "rgdadress.php",
    //         data: {
    //             biztin: biztin
    //         },
    //         dataType: "html",
    //         beforeSend: function() {
    //             $.blockUI();
    //         },
    //         success: function(text) {
    //             $('#adarea').html(text);
    //         },
    //         complete: function() {
    //             $.unblockUI();
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + " " + thrownError);
    //         }
    //     });
    // })

    $('#previewinfo').click(function(e) {
        e.preventDefault();
        window.localStorage.clear();
        console.log("Got here");
        //Business Stuff
        window.localStorage.setItem('accountype', $('#accountype').val());
        window.localStorage.setItem('businessname', $('#businessname').val());
        window.localStorage.setItem('tin', $('#tin').val());
        window.localStorage.setItem('natureofbusiness', $('#natureofbusiness').val());
        window.localStorage.setItem('telephone', $('#telephone').val());
        window.localStorage.setItem('atelephone', $('#atelephone').val());
        window.localStorage.setItem('businessemail', $('#businessemail').val());
        window.localStorage.setItem('website', $('#website').val());

        //Location Info
        window.localStorage.setItem('latitude', $('#latitude').val());
        window.localStorage.setItem('longitude', $('#longitude').val());
        window.localStorage.setItem('popularname', $('#popularname').val());
        window.localStorage.setItem('buildingno', $('#buildingno').val());
        window.localStorage.setItem('unitno', $('#unitno').val());
        window.localStorage.setItem('street', $('#street').val());
        window.localStorage.setItem('city', $('#city').val());
        window.localStorage.setItem('region', $('#region').val());
        window.localStorage.setItem('assembly', $('#assembly').val());


        //Business Info
        window.localStorage.setItem('businesstype', $('#businesstype').val());
        window.localStorage.setItem('businesscategory', $('#businesscategory').val());
        window.localStorage.setItem('revenue', $('#revenue').val());
        window.localStorage.setItem('numberofemployees', $('#numberofemployees').val());
        window.localStorage.setItem('numberofbranches', $('#numberofbranches').val());
        window.localStorage.setItem('averagerevenue', $('#averagerevenue').val());
        // window.location.replace('<?php echo URLROOT . 'pages/review' ?>');
        window.location.href = "<?php echo URLROOT . 'pages/review' ?>";


    })


    $('#searchbtn').click(function() {

        var searchtxt = $('#searchtxt').val();
        alert(searchtxt);

        $.ajax({
            type: "POST",
            url: "" + searchtxt,
            data: {
                searchtxt: searchtxt
            },
            dataType: "xml",
            beforeSend: function() {
                $.blockUI();
            },
            success: function(xml) {
                // $(xml).find('records').each(function() {
                //     $('#fname').val($(this).find('fname').text());
                //     $('#sname').val($(this).find('sname').text());
                //     $('#dob').val($(this).find('dob').text());
                //     $('#pin').val($(this).find('pin').text());
                // });
                console.log(xml);
            },

            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + " " + thrownError);
                console.log(xhr);
            }
        });
    })

    // $('#affiliates').click(function() {

    //     //alert('prince');
    //     var biztin = $('#tin').val();


    //     $.ajax({
    //         type: "POST",
    //         url: "rgdservice.php",
    //         data: {
    //             biztin: biztin
    //         },
    //         dataType: "html",
    //         beforeSend: function() {
    //             $.blockUI();
    //         },
    //         success: function(text) {
    //             $('#afarea').html(text);
    //         },
    //         complete: function() {
    //             $.unblockUI();
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + " " + thrownError);
    //         }
    //     });

    // })


    // $('#searchbtn').click(function() {

    //     var biztin = $('#searchtxt').val();

    //     $('#messageinfo').html('');
    //     $('#resnotification').html('');


    //     $.ajax({
    //         type: "POST",
    //         url: "rgdbio.php",
    //         data: {
    //             biztin: biztin
    //         },
    //         dataType: "xml",
    //         beforeSend: function() {
    //             $.blockUI();
    //         },
    //         success: function(xml) {
    //             $(xml).find('records').each(function() {
    //                 $('#businessname').val($(this).find('businessname').text());
    //                 $('#telephone').val($(this).find('telephone').text());
    //                 $('#tin').val($(this).find('tin').text());
    //                 $('#natureofbusiness ').val($(this).find('natureofbusiness').text());
    //                 $('#messageinfo').append($(this).find('messageinfo').text());
    //                 $('#resnotification').append($(this).find('resnotification').text());





    //             });

    //         },

    //         complete: function() {
    //             $.unblockUI();
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + " " + thrownError);
    //         }
    //     });
    // })

    // $('#submitinfo').click(function() {


    //     var telephone = $('#telephone').val();
    //     var atelephone = $('#atelephone').val();
    //     var tin = $('#tin').val();
    //     var businessname = $('#businessname').val();
    //     var businessemail = $('#businessemail').val();
    //     var natureofbusiness = $('#natureofbusiness').val();
    //     var website = $('#website').val();
    //     var accountype = $('#accountype').val();

    //     var city = $('#city').val();
    //     var street = $('#street').val();
    //     var latitude = $('#latitude').val();
    //     var longitude = $('#longitude').val();
    //     var buildingno = $('#buildingno').val();
    //     var assembly = $('#assembly').val();
    //     var region = $('#region').val();
    //     var unitno = $('#unitno').val();
    //     var popularname = $('#popularname').val();

    //     // var firstname    = $('#fname').val();
    //     // var lastname     = $('#sname').val();
    //     // var ptelephone    = $('#ptelephone').val();
    //     // var dob          = $('#dob').val();
    //     // var email        = $('#email').val();
    //     // var idtype       = $('#idtype').val();
    //     // var pin          = $('#pin').val();
    //     // var nationality   = $('#nationality').val();

    //     var businesstype = $('#businesstype').val();
    //     var businesscategory = $('#businesscategory').val();
    //     var revenue = $('#revenue').val();
    //     var numberofemployees = $('#numberofemployees').val();
    //     var numberofbranches = $('#numberofbranches').val();
    //     var averagerevenue = $('#averagerevenue').val();

    //     var accountsname = $('#accountsname').val();
    //     var accountstelephone = $('#accountstelephone').val();
    //     var accountsemail = $('#accountsemail').val();


    //     $.ajax({
    //         type: "POST",
    //         url: "../ajaxscripts/savemerchant.php",
    //         data: {
    //             city: city,
    //             street: street,
    //             latitude: latitude,
    //             longitude: longitude,
    //             buildingno: buildingno,
    //             assembly: assembly,
    //             region: region,
    //             unitno: unitno,
    //             popularname: popularname,
    //             natureofbusiness: natureofbusiness,
    //             businessname: businessname,
    //             tin: tin,
    //             businessemail: businessemail,
    //             telephone: telephone,
    //             website: website,
    //             businesstype: businesstype,
    //             businesscategory: businesscategory,
    //             revenue: revenue,
    //             numberofemployees: numberofemployees,
    //             numberofbranches: numberofbranches,
    //             averagerevenue: averagerevenue,
    //             accountype: accountype,
    //             accountsname: accountsname,
    //             accountstelephone: accountstelephone,
    //             accountsemail: accountsemail

    //         },
    //         dataType: "html",
    //         beforeSend: function() {
    //             $.blockUI();
    //         },
    //         success: function(s) {
    //             alert(s)
    //             if (s == 'success') {
    //                 ;
    //                 alert('Registration Completely Done !!');
    //                 window.location = '';
    //             }
    //         },
    //         complete: function() {
    //             $.unblockUI();
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + " " + thrownError);
    //         }
    //     });







    // })


    var map, infoWindow;
    var countryRestrict = {
        'country': 'gh'
    };


    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 5.6027928,
                lng: -0.218137
            },
            zoom: 17,
            mapTypeId: 'hybrid'
        });

        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
                position: {
                    lat: 5.6027928,
                    lng: -0.218137
                },
                pov: {
                    heading: 34,
                    pitch: 10
                }
            });
        map.setStreetView(panorama);

        infoWindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder();

        document.getElementById('searchmap').addEventListener('click', function() {
            geocodeAddress(geocoder, map);

        });

        var marker = new google.maps.Marker({
            position: {
                lat: 5.6027928,
                lng: -0.218137
            },
            map: map
        });

        map.addListener('click', function(e) {
            placeMarker(e.latLng, map);
        });

        function placeMarker(location) {
            if (marker) {
                //if marker already was created change positon
                marker.setPosition(location);
            } else {
                //create a marker
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
            }
        }


        //////////////////////////////////////////////////////////////////////////////////

        google.maps.event.addListener(map, 'click', function(event) {
            var lat = event.latLng.lat();
            var lon = event.latLng.lng();



            var goecoder = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lon + "&sensor=false";
            $("#tabs").tabs("option", "active", 1);
            $.ajax({


                type: "POST",
                url: "../ajaxscripts/mapstatus.php",
                data: {
                    lat: lat,
                    lon: lon,
                    goecoder: goecoder
                },
                dataType: "xml",
                success: function(xml) {


                    $(xml).find('records').each(function() {
                        $('#city').val($(this).find('city').text());
                        $('#street').val($(this).find('street').text());
                        $('#assembly').val($(this).find('assembly').text());
                        $('#region').val($(this).find('region').text());
                        $('#country').val($(this).find('country').text());
                        $('#latitude').val($(this).find('latitude').text());
                        $('#longitude').val($(this).find('longitude').text());

                    });

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                }
            });

        });

        var autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('address')), {
                types: ['geocode'],
                componentRestrictions: countryRestrict
            })

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                // map.setStreetView(panorama);


            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }



    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>