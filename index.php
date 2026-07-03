<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SSL Certificate Generator</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f2f2f2;
        }

        .container{
            width:500px;
            margin:40px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:12px;
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0b5ed7;
        }

    </style>

</head>

<body>

<div class="container">

<h2>SSL Certificate Generator</h2>

<form action="generate.php" method="POST">

<label>Country</label>

<input
type="text"
name="country"
value="ID"
required>

<label>State / Province</label>

<input
type="text"
name="state"
required>

<label>Locality / City</label>

<input
type="text"
name="city"
required>

<label>Organization Name</label>

<input
type="text"
name="organization"
required>

<label>Common Name</label>

<input
type="text"
name="commonname"
placeholder="www.namadomain.com"
required>

<button type="submit">
Generate Certificate
</button>

</form>

</div>

</body>
</html>