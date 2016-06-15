<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script data-require="bootstrap.js@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link data-require="bootstrap-css@*" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
    <script data-require="angularjs@1.5.5" data-semver="1.5.5" src="https://code.angularjs.org/1.5.5/angular.js"></script>
    <style>
        body{
            padding: 20px 50px;
        }
        h1{
            color: #336;
        }
        p{
            margin: 20px 0;
        }
        label, .form-control {
            display: inline-block;
            color: #669;
            width: 45%;
        }
        .container {
            max-width: 500px;
        }
        sup{
            font-size: 60%;
            color: #f33;
        }
        hr{
            margin: 30px 0;
        }

    </style>
</head>

<body>
<div class="container form-inline">
    <h1>NLC Test Form</h1>
    <hr>
    <p>
        <label>FirstName <sup>(Required)</sup></label>
        <input id="FirstName" type="text" class="form-control" placeholder="e.g. John or Jane" required>
    </p>
    <p>
        <label>LastName <sup>(Required)</sup></label>
        <input id="LastName" type="text" class="form-control" placeholder="e.g. Smith" required>
    </p>
    <p>
        <label>MiddleInitial</label>
        <input id="MiddleInitial" type="text" class="form-control" maxlength="1">
    </p>
    <p>
        <label>Phone</label>
        <input id="Phone" type="text" class="form-control" placeholder="e.g. (954) 255-2622">
    </p>
    <p>
        <label>Fax</label>
        <input id="Fax" type="text" class="form-control" placeholder="e.g. (954) 255-2622">
    </p>
    <!--
    <p>
        <label>Date</label>
        <input id="Date" type="text" class="form-control">
    </p>
    -->
    <p>
        <label>Email</label>
        <input id="Email" type="text" class="form-control" placeholder="e.g. name@site.com">
    </p>
    <p>
        <label>WorkPhone</label>
        <input id="WorkPhone" type="text" class="form-control" placeholder="e.g. (954) 255-2622">
    </p>
    <p>
        <label>CellPhone</label>
        <input id="CellPhone" type="text" class="form-control" placeholder="e.g. (954) 255-2622">
    </p>
    <p>
        <label>Address1</label>
        <input id="Address1" type="text" class="form-control">
    </p>
    <p>
        <label>Address2</label>
        <input id="Address2" type="text" class="form-control">
    </p>
    <p>
        <label>City</label>
        <input id="City" type="text" class="form-control">
    </p>
    <p>
        <label>State</label>
        <input id="State" type="text" class="form-control" maxlength="2" placeholder="e.g. NH">
    </p>
    <p>
        <label>Zip</label>
        <input id="Zip" type="text" class="form-control" maxlength="5">
    </p>
    <p>
        <label>UserDefined1</label>
        <input id="UserDefined1" type="text" class="form-control">
    </p>
    <p>
        <label>EstimatedMonthlyPayment</label>
        <input id="EstimatedMonthlyPayment" type="text" class="form-control">
    </p>
    <hr>
    <p>
        <input id="Submit" type="submit" class="btn btn-primary">
    </p>
    <p id="output"></p>
</div>
<script>
    $('#Submit').click(function(){
        $.ajax({
            method: "POST",
            url: 'api/addleaddataobject.json',
            data    : {
                "FirstName"     : $("#FirstName").val(),
                "LastName"      : $("#LastName").val(),
                "MiddleInitial" : $("#MiddleInitial").val(),
                "Phone"         : $("#Phone").val(),
                "Fax"           : $("#Fax").val(),
                "Date"          : $("#Date").val(),
                "Email"         : $("#Email").val(),
                "WorkPhone"     : $("#WorkPhone").val(),
                "CellPhone"     : $("#CellPhone").val(),
                "Street"        : $("#Street").val(),
                "City"          : $("#City").val(),
                "State"         : $("#State").val(),
                "Zip"           : $("#Zip").val(),
                "UserDefined1"  : $("#UserDefined1").val()
            }
        }).done(function(result){
            //alert(result);
            var obj = $.parseJSON(result);
            if(obj.status){
                $('input[type=text]').val('');
                $('#output').html('<p style="color:#090;">Success: RecordID is ' + obj.record + '</p>');
            }
            else{
                $('#output').html('<p style="color:#900;">Error: ' + obj.error + '</p>');
            }
        });
    });
</script>
</body>

</html>
