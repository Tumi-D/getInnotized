<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview Page</title>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap4-card-tables@1.2.0/dist/bootstrap4-card-tables.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap4-card-tables@1.2.0/dist/bootstrap4-card-tables.min.css">
    <link href="<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        /* .jumbotron {
            background: #002b45;
        } */
        /* .card {
            background: #002b45;
        } */
        .body {
            background: #002b45;

        }

        input {
            border: none;
        }

        input: readonly {
            color: -internal-light-dark-color(rgb(84, 84, 84), rgb(170, 170, 170));
            cursor: default;
            background-color: #ffff;
        }
    </style>
</head>

<body style="background: #002b45">
    <div class="container">
        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">Card Header</div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Row 1 Cell 1</td>
                            <td>Row 1 Cell 2</td>
                            <td>Row 1 Cell 3</td>
                        </tr>

                        <tr>
                            <td>Row 2 Cell 1</td>
                            <td>Row 2 Cell 2</td>
                            <td>Row 2 Cell 3</td>
                        </tr>

                        <tr>
                            <td>Row 3 Cell 1</td>
                            <td>Row 3 Cell 2</td>
                            <td>Row 3 Cell 3</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer">
                    Card Footer
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div> -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
        <form action="<?php echo URLROOT . "/pages/createmerchant" ?>" method="post">
            <div class="container">
                <div class="row my-4">
                    <div class="col">
                        <div class="jumbotron">
                            <center>
                                <h3> Data Preview</h3>
                            </center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md d-flex">
                                        <div class="card card-body flex-fill">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <caption>Basic Information</caption>
                                                    <thead>
                                                        <tr>
                                                            <td scope="col">Basic Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Type Of Account</th>
                                                            <td><input readonly name="accounttype" id="accountype" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Business Name</th>
                                                            <td><input readonly name="businessname" id="businessname" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">TIN#</th>
                                                            <td><input readonly id="tin" name="tin" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nature Of Business</th>
                                                            <td><input readonly id="natureofbusiness" name="natureofbusiness" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Telephone</th>
                                                            <td><input readonly id="telephone" name="telephone" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile No</th>
                                                            <td><input readonly id="atelephone" name="atelephone" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email Address</th>
                                                            <td><input readonly id="businessemail" name="businessemail" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Website</th>
                                                            <td><input readonly id="website" name="website" value=""></input></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md d-flex">
                                        <div class="card card-body flex-fill">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <caption>Location Info</caption>
                                                    <thead>
                                                        <tr>
                                                            <td scope="col">Location Info</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Latitide</th>
                                                            <td><input name="latitude" readonly id="latitude" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Longitude</th>
                                                            <td><input name="longitude" readonly id="longitude" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Popular Name</th>
                                                            <td><input readonly id="popularname" name="popularname" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">House/Building No:</th>
                                                            <td><input readonly id="buildingno" name="buildingno" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Unit No:</th>
                                                            <td><input readonly id="unitno" name="unitno" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Street Address:</th>
                                                            <td><input readonly id="street" name="street" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"> City:</th>
                                                            <td><input readonly id="city" name="city" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Assembly:</th>
                                                            <td><input readonly id="assembly" name="assembly" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Region:</th>
                                                            <td><input readonly id="region" name="region" value=""></input></td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md d-flex" style="margin-top:10px">
                                        <div class="card card-body flex-fill">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <caption>Business Attributes</caption>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Business Attributes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Business Type</th>
                                                            <td><input name="businesstype" readonly id="businesstype" value=""></input></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Business Category</th>
                                                            <td><input readonly id="businesscategory" name="businesscategory" value=""></input></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Estimated Annual Revenue</th>
                                                            <td><input name="revenue" readonly id="revenue" value=""></input></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Number of employees</th>
                                                            <td><input readonly name="numberofemployees" id="numberofemployees" value=""></input></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Number of Branches</th>
                                                            <td><input readonly name="numberofbranches" id="numberofbranches" value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"> Average Annual Account Balance</th>
                                                            <td><input readonly name="averagerevenue" id="averagerevenue" value=""></td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span style="float:left;padding-top:10px"><button id="goback" class="btn btn-primary"><i class='fa fa-arrow-left'></i>&nbsp;Back to form</button></span> <span style="float: right;padding-top:10px"><button class="btn btn-success">Proceed to Save Data&nbsp;<i class='fa fa-save'></i></button></span>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</body>
<script>
    $('#goback').click(function(e) {
        e.preventDefault();
        window.location.replace('<?php echo URLROOT . 'pages/createmerchant' ?>');
    })

    //Business Info
    $("#accountype").val(window.localStorage.getItem('accountype'));
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
</script>

</html>