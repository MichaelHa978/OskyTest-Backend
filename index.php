<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Developer Test</title>
  </head>
  <body>
    <?php
        $fileContents = file_get_contents('data.json'); // Get content from json file

        // Add content to array
        $newsItemsArray = json_decode($fileContents,true);
      
        // Sort array
        array_multisort($newsItemsArray);

        // Display data
        echo "<ol>";
        foreach ($newsItemsArray as $newsItem) { // Loop through newsItemArray
            echo "<li><div>";
            echo "<h2>".$newsItem['title']."</h2>"; // Display title from newsItemArray

            $time = strtotime($newsItem['pubDate']); // Convert pubDate string to date format
            $timeFormatPt1 = date('l, dS',$time); // Format 
            $timeFormatPt2 = date('F Y h:ia',$time); 

            echo "<p>".$timeFormatPt1." of ".$timeFormatPt2."</p>";
            echo "<p>".$newsItem['description']."</p>";

            // Display read more link
            if (is_array($newsItem['link'])){
                if (!str_contains($newsItem['link']['0'], "urn")){ //if the first element did not contain "urn" string, display Read More.
                    echo "<p><a href=\"".$newsItem['link']['0']."\">Read More</a><p>";
                }
            }
            else {
                echo "<p><a href=\"".$newsItem['link']."\">Read More</a><p>";
            }
            echo "</div></li>";
          }
          echo "</ol>";
    ?>
    
  </body>
</html>

