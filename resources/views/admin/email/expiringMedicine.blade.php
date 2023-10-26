<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            Expiring Medicine
        </div>
        <div class="card-body">
            <h5 class="card-title">Expiring Medicine Mail</h5>
            <p class="card-text" style="text-align: center;">Medicine Name: {{ $medicineDetails->medicine_name }}</p>
            <p class="card-text" style="text-align: center;">Medicine Quantity: {{ $medicineDetails->quantity }}</p>
            <p class="card-text" style="text-align: center;">Medicine Expire Date: {{ date('d F Y', strtotime($medicineDetails->expiry_date)) }}</p>

            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <a href="{{ Config('app.url') }}/dashboard" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true" style="color: white;">Click to check Expiring Medicines</a>

        </div>
        <div class="card-footer text-muted">
            Medicine Expire Date: {{ $medicineDetails->expiry_date }}
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>