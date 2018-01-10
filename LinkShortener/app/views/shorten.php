<?php 

if(isset($_GET['user']))
    echo "Welcome " . $_GET['user'] . "! <br><br><br>"; 

   
    
if(isset($_GET['id'])){ //get id attribute from address bar, redirect to page
    
    session_start();
    
    $id= $_GET['id'];
    
    $url = $_SESSION[$id];
    
    header("Location: " . $url);
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Link Shortener</title>

<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

</head>
<body>

<h1>Link Shortener Application</h1><br>

<form action="shorten.php" method="post">

<input type="text" name="url" size="50" placeholder="Type the full URL here">
<input type="submit" value="Shorten"><br><br>

</form>

<p> Examples: http://www.google.com, https://www.courts.com.sg, http://ask.com </p><br>

<?php

require_once '../dao/UserDatabase.php';


if (isset($_POST['url'])){
    
    $url = UserDatabase::validateInput($_POST['url']);
    
    if (empty($url)){
        
        echo "URL is empty.";      
        
    }
    
    else{
        
        echo "URL Entered: ". $url . "<br><br>";  
      
        $id = substr(md5($url),1,5); //generate shortened url id by encrypting url and taking the first 5 characters. 
        
        echo "Code: " .$id. "<br><br>"; 
        
        session_start();
        
        $_SESSION[$id] = $url; //map each id key to a url value, use session as php is stateless, we should use database instead
        
        //print_r($_SESSION);
        
        $real_url = "http://localhost:4555/url?id=".$id;
        
        echo "Your new URL is: <a href=$real_url> $real_url </a><br><br><br>";
        
    } 
}

?>

<form action="../controllers/LogoutController.php">

<input type="submit" name="logout" value= "Logout"><br><br>

</form>


<?php 
if(!empty($_SESSION)){
?>

<table>
  <tr>
    <th>URL Entered</th>
    <th>URL Generated</th>
  </tr>
  
<?php 

if(isset($_SESSION)){
    foreach($_SESSION as $key => $value) {
        echo "<tr><td>$value</td><td>http://localhost:4555/url?id=$key</td></tr>";
    }
}

?>

</table>

<?php 
}
?>

</body>
</html>

