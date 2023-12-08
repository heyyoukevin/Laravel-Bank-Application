<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Banking Dashboard</title>
    <style>    
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;            
        }

        main {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;           
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        
        nav {
            background-color: #ddd;
            padding: 1em;
            text-align: center;
        }

        nav a {
            margin: 0 1em;
            text-decoration: none;
            color: #333;
        }

        section {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
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

        h2 {
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

        .user-info {
            background-color: #C0C0C0;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 60px;
            margin: 20px auto;
            max-width: 400px;
        }

        .user-info p {
            margin: 10px 0;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

    <header>
        <h1>ABC BANK</h1>
    </header>

    <nav>
        <a href="/userhome">Home</a>
        <a href="/userdeposit">Deposit</a>
        <a href="/userwithdraw">Withdraw</a>
        <a href="/usertransfer">Transfer</a>
        <a href="/userstatement">Statement</a>
        <a href="/logout">Logout</a>
    </nav>




    <div class="container">
    @yield("page-content")
    </div>



    
    <footer>
        &copy; 2023 ABC Bank
    </footer>

</body>
</html>
