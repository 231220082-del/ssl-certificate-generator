<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

$dn = array(
    "countryName" => $_POST['country'],
    "stateOrProvinceName" => $_POST['state'],
    "localityName" => $_POST['city'],
    "organizationName" => $_POST['organization'],
    "commonName" => $_POST['commonname']
);

// Konfigurasi RSA
$config = array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA
);

// Membuat Private Key
$privateKey = openssl_pkey_new($config);

// Membuat CSR
$csr = openssl_csr_new($dn, $privateKey, $config);

// Sign CSR menjadi Certificate berlaku 365 hari
$x509 = openssl_csr_sign($csr, null, $privateKey, 365, $config);

// Export Private Key
openssl_pkey_export($privateKey, $privateKeyOut);

// Export Certificate
openssl_x509_export($x509, $certificateOut);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>SSL Certificate</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:900px;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

textarea{

    width:100%;
    height:250px;
    margin-bottom:20px;
    font-family:monospace;

}

</style>

</head>

<body>

<div class="container">

<h2>Private Key</h2>

<textarea readonly><?php echo $privateKeyOut; ?></textarea>

<h2>Certificate (.CRT)</h2>

<textarea readonly><?php echo $certificateOut; ?></textarea>

</div>

</body>

</html>