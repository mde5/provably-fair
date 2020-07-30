# Description

A Provably Fair game of chance written in PHP using AJAX and JQuery.

## How it works

The player and the House each choose a random string or "seed". These two seeds are combined using an algorithm known as HMAC-SHA256. The resulting outcome is converted to a decimal number, and the player wagers whether it will be an odd or even number. Since HMAC-SHA256 will always produce the same result given the same inputs -- and the player is given all the inputs -- it is easy for the player to verify that the outcome isn't rigged.

At the start of the game, the player is shown the *hash* of the Server Seed. 
![](https://github.com/mde5/provably-fair/blob/master/assets/serverseedhash.png)

This signals to the player that the server seed is predetermined and won't be changed later. The House cannot *yet* show the unhashed Server Seed, otherwise the player could calculate the outcome in advance even before making a wager! This method makes it fair for both parties.

Once the game ends, the Server Seed is revealed and the player can hash it themselves to verify that the two hashes match.
![](https://github.com/mde5/provably-fair/blob/master/assets/serverseed.png)

The player is encouraged to edit their own seed (to ensure the server doesn't know this information in advance), and may at any time ask the server to choose new random seeds. 
![](https://github.com/mde5/provably-fair/blob/master/assets/clientseed.png)

## Verifying the outcome

- Use a tool like [this](https://xorbin.com/tools/sha256-hash-calculator) to hash the Server Seed, check that the result matches the Server Seed Hash you saw before making a wager.

![](https://github.com/mde5/provably-fair/blob/master/assets/sha256.png)

- Use a tool like [this](https://www.freeformatter.com/hmac-generator.html), with the Server Seed as the message, 
the Client Seed as the secret key, and the algorithm set to SHA256. The result should match the HMAC hash listed for that game. 
The last digit of this number determines whenever the outcome is odd or even.

![](https://github.com/mde5/provably-fair/blob/master/assets/hmac-sha256.png)

- *Note:* These are hexadecimal numbers so remember that "a", "c", "e" are even, "b", "d", "f" are odd -- 
or you can use a [hex to decimal convertor](https://www.binaryhexconverter.com/hex-to-decimal-converter).

