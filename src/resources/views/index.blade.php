<html lang="en">
<head>
    <title>ConvertForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container pt-5">
    <form id="convertFrom" class="row g-3">
        <div class="col-md-4">
            <label for="from" class="form-label">From</label>
            <select id=from class="form-select">
                <option value="HUF">HUF</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="to" class="form-label">To</label>
            <select id="to" class="form-select">
                <option value="HUF">HUF</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="fromValue" class="form-label">Value</label>
            <input type="number" required class="form-control" id="fromValue">
        </div>
        <div class="col-12">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Result</label>
            <input type="text" disabled class="form-control" id="result">
        </div>
    </form>
</div>

<div class="container pt-5">
    <form id="ratesForm" class="row g-3">
        <div class="col-md-4">
            <label for="fromValue" class="form-label">From</label>
            <select id="fromValue" class="form-select">
                <option value="HUF">HUF</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>
        </div>
        <div class="col-md-4" id="rateResult">
        </div>
        <div class="col-12">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<div class="container pt-5">
    <form id="currenciesForm" class="row g-3">
        <div class="col-12">
            <button type="submit" id="submit" class="btn btn-primary">Currencies</button>
        </div>
    </form>
    <div class="col-md-4" id="currenciesResult">
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">

    $('#convertFrom').on('submit',function(e){
        e.preventDefault();

        let from = $('#convertFrom #from').val();
        let to = $('#convertFrom #to').val();
        let fromValue = $('#convertFrom #fromValue').val();

        $.ajax({
            url: "/convert",
            type:"POST",
            data:{
                from:from,
                to:to,
                fromValue:fromValue,
            },
            success:function(response){
                $('#result').val(response.data.result);
            }
        });
    });

    $('#ratesForm').on('submit',function(e){
        e.preventDefault();

        let fromValue = $('#ratesForm #fromValue').val();

        $.ajax({
            url: "/rates/"+fromValue,
            type:"GET",
            success:function(response){
                console.log(response);
                let result = '<ul>';
                response.data.rates.forEach(function(item) {
                     result += '<li>'+item.currency+' : '+item.rate+'</li>';
                });
                let rateResultElement = $('#rateResult');
                result += '</ul>';

                rateResultElement.html('');
                rateResultElement.append(result);
            },
        });
    });

    $('#currenciesForm').on('submit',function(e){
        e.preventDefault();

        $.ajax({
            url: "/currencies",
            type:"GET",
            success:function(response){
                console.log(response);
                let result = '<ul>';
                response.data.forEach(function(item) {
                    result += '<li>'+item.name+'</li>';
                });
                let currenciesResultElement = $('#currenciesResult');
                result += '</ul>';

                currenciesResultElement.html('');
                currenciesResultElement.append(result);
            },
        });
    });


</script>
</body>
</html>
