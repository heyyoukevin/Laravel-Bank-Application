<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC BANK - Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h1>ABC BANK</h1>

    <form action="/register" method="post" onSubmit="return check()">
    {{ csrf_field() }}
    <p>Create New Account</p>
	
	<label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Enter name" required>

        <label for="email">Email address</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter email" required>

        <label for="password">Password</label>
        <input type="password" id="pass" name="pass" value="{{old('pass')}}" placeholder="Password" required>

        <label>
            <input type="checkbox" required>
            Agree the terms and policy
        </label>

        <button type="submit">Create New Account</button>
    </form>

    <p>Already have an account? <a href="/loginpage">Sign in</a></p>

<script type="text/javascript">
    var letters=/^[a-z A-Z]+$/;
    var numbers=/^[0-9]+$/;
    var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    function check()
    {
   if(!document.getElementById("name").value.match(letters))
        {
            alert('Please input alphabet characters only,enter name properly');
            return false;
        }    
    else
        {
            alert("SUCCESSFULLY REGISTERED");
            return true;
        }
    }	
</script>




</body>
</html>
