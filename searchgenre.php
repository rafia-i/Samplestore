<?php
require_once('DBconnect.php');
if(isset($_POST['search_term'])) {
    $u=$_POST['search_term'];
    $sql="SELECT t.name, t.ytlink from tracks t join genre g on g.genreid=t.genreid where g.name='$u'";
    $result =mysqli_query($conn,$sql);
    
    
    //
    if (mysqli_num_rows($result) != 0) {
        echo "Results found related to $u:<br>";
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