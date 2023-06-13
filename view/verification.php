<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Verification Code</title>
</head>
<style>
body {background: #020238eb;
    font-family: "brandon-grotesque", "Brandon Grotesque", "Source Sans Pro", "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;

}
h1   {color: #FEA116;
       margin: 0;
       margin-bottom: 1em;
font-size: 30px;
text-align: center; 
}

.white-box { width: 500px; height: 100px; margin-top: 150px; margin-left: auto; margin-right: auto;   
  
background: whitesmoke;
padding:100px;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.15);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.15);
box-shadow: 0 1px 2px rgba(0,0,0,0.15);
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
}


body form input[type="submit"] {
    display: block;
    align-self: flex-end;
    appearance: none;
    
    margin-left: 180px;
    margin-top: 40px;
    border: 0;
    border-radius: 0;
    font-family: "brandon-grotesque", "Brandon Grotesque", "Source Sans Pro", "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
    font-size: 20px;
    font-weight: 700;
    
    background: #FEA116;
    color: white;
    cursor: pointer;
}












</style>

<body>
    
        <div class="white-box">
        
    <h1> OTP Verification </h1>
    <form action="../index.php" method="post">
        <label for="code">Enter 6 digit code sent to your e-mail:</label>
        <input type="text" name="code" id="code"/>
        <input type="hidden" name="action" value="code_submit"/>
        <input type="submit" value="Submit">
    </form>
    
    <div>
</body>

</html>
