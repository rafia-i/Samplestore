<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Songs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(2, 128, 52, 0.76);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #555;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 80%;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 10px;
            background: #f9f9f9;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
        <h1>We guess you were looking for...</h1>



<!---->
<?php
require_once('DBconnect.php');
if(isset($_POST['search_term'])) {
    $u=$_POST['search_term'];
    $sql="SELECT name,ytlink FROM tracks where name like'%$u%'";
    $result =mysqli_query($conn,$sql);
    
    
    //
    if (mysqli_num_rows($result) != 0) {
        //echo "Results found:<br>";
        echo "<ul>"; // Start a list to display the results

        // Fetch each row and display the track name with the YouTube link
        while ($row = mysqli_fetch_assoc($result)) {
            $trackName = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
            $ytLink = htmlspecialchars($row['ytlink'], ENT_QUOTES, 'UTF-8');
            echo "<li>$trackName - <a href='$ytLink' target='_blank'>Watch on YouTube</a></li>";
        }

        echo "</ul>";

    } else {
        echo "Song doesnt exist";
    }
}
?>


</div>
</body>
</html>
