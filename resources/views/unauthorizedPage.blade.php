<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    .bg {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 600px;
    }

    .massege {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: darkslategray;
        padding: 40px;
        border-radius: 10px;

    }
    </style>
</head>

<body>
    <div class="bg">
        <div class="massege">
            <h4>You Are Not authorized To Open This Page</h4>
            <a href="{{ route('index') }}" class="btn fs-5 text-danger mt-3">Return Home</a>

        </div>


    </div>



    @include('layout.js')

</body>

</html>