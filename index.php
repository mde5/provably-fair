
<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <title> Provably Fair Odds and Evens </title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="stylesheet" href="css/style.css">
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"> </script>
<script>

 $(window).on('load', function() {
    var get_clseed = 1;
    $.post('ajax.php', {
        seed: get_clseed
    }, function(data) {
        $('#client_seed').html(data);
    })
    var get_svseed = 1;
    $.post('ajax.php', {
        seedS: get_svseed
    }, function(data) {
        $('#server_seed').html(data);
    }) 
}); 

$(document).ready(function() {
    $('.btn-success').click(function(event) {
        event.preventDefault();
        var wager = $(this).val();
        var cl_seed = $('#cl_seed').val();
        var sv_seed = $('#sv_seed').val();
        var sv_seedH = $('#sv_seedhash').val();
        $.post('ajax.php', {
            wager: wager,
            cl_seed: cl_seed,
            sv_seed: sv_seed,
            sv_seedH: sv_seedH
        }, function(data) {
            $('#result').html(data);
        })
        $('#btn2').click();
    })

     $('#btn').click(function() {
        var get_clseed = 1;
        $.post('ajax.php', {
            seed: get_clseed
        }, function(data){
            $('#client_seed').html(data);
        })
    })

    $('#btn2').click(function() {
        var get_svseed = 1;
        $.post('ajax.php', {
        seedS: get_svseed
        }, function(data) {
            $('#server_seed').html(data);
        })
    })
});

</script>
</head>

<body>
<noscript>Please enable Javascript and refresh the page.</noscript>
    <form method="post" action="ajax.php">
    <input type="submit" class="btn btn-success" value="Odds">
    <input type="submit" class="btn btn-success" value="Evens">
     <p id="client_seed">Client Seed: </p>
     <p id="server_seed">Server Seed: </p>
    <input id="btn" class="btn btn-primary" type="button" value="Random Client Seed"> 
    <input id="btn2" class="btn btn-primary" type="button" value="Random Server Seed"> 
    </form>
<div id="result"> 
</div>

</body>

</html>