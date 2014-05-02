<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$type = $_GET["type"];
$password = $_GET["token"];
$cleartext = $_GET["text"];        

switch ($type) {
    case "encrypt":
        $crypted = encrypt($cleartext, $password);
        echo "Encrypted: " . $crypted . "</br>";
        break;
    case "decrypt":
        $newClear = decrypt($cleartext, $password);
        echo "Decrypted: " . $newClear . "</br>";
        break;
    default:
        echo "Type not defined correctly.";
        break;
}
    
function encrypt($sValue, $sSecretKey)
{
    return rtrim(
        base64_encode(
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_256,
                $sSecretKey, $sValue, 
                MCRYPT_MODE_ECB, 
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256, 
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND)
                )
            ), "\0"
        );
}

function decrypt($sValue, $sSecretKey)
{
    return rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_256, 
            $sSecretKey, 
            base64_decode($sValue), 
            MCRYPT_MODE_ECB,
            mcrypt_create_iv(
                mcrypt_get_iv_size(
                    MCRYPT_RIJNDAEL_256,
                    MCRYPT_MODE_ECB
                ), 
                MCRYPT_RAND
            )
        ), "\0"
    );
}

?>