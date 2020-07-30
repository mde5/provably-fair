<?php
 
    $client_seed = bin2hex(random_bytes(32));
    $server_seed = bin2hex(random_bytes(32));

  if(isset($_POST['seed'])) {
    echo "Client Seed <br><input id='cl_seed' type='text' name='cl_seed' size='69' maxlength='64' value='".$client_seed."'>";
} 

 if(isset($_POST['seedS'])) {
    echo "<input id='sv_seed' type='hidden' name='sv_seed' size='69' maxlength='64' readonly value='".$server_seed."'>";
    $server_seedHash  = hash('sha256', $server_seed);
    echo "Server Seed Hash <br><input id='sv_seedhash' type='text' name='sv_seedhash' size='69' maxlength='64' readonly value='".$server_seedHash."'>";
    }

 if (isset($_POST['wager'])) {
    $wager = $_POST['wager'];
    $client_seed = $_POST['cl_seed'];
    $server_seed = $_POST['sv_seed'];
    $server_seedHash = $_POST['sv_seedH'];
    $hmac = hash_hmac('sha256', $server_seed, $client_seed);
    $outcome = ((hexdec(substr($hmac, 63)) % 2) == 0) ? 'Evens' : 'Odds';
    $result = ($wager == $outcome) ? "<span style='color:green'>You win!</span>" : "<span style='color:red'>You lose!</span>";
    echo "<div id='outcome'>" . $result ."</div>";
    echo "<div id='info'><b> Client Seed</b><br>". 
     $client_seed . "<br><b> Server Seed</b> <br> ". $server_seed . "<br><b> Server Seed Hash</b> <br>"
     . $server_seedHash . "<br><b> HMAC Hash </b><br>" . $hmac . "</div>";

}

?>