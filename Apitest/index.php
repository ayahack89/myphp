<?php 
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Wikipedia Search</title>
</head>
<body>
     <form action="index.php" method="get">
          <input type="text" name="search">
          <input type="submit" value="Search">
     </form>

     <?php 
     if(isset($_GET['search'])){
          $searchTerm = urlencode($_GET['search']);
          $api_url = "https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&exintro=1&redirects=true&titles=$searchTerm";

          if($data = json_decode(@file_get_contents($api_url))){
               $pages = $data->query->pages;
               foreach($pages as $key => $val){
                    $pageId = $key;
                    break; // Exit loop after the first iteration
               }
               if(isset($pageId)){
                    $content = $pages->$pageId->extract;
                    echo "<div style='font-family:arial;'>$content</div>";
               } else {
                    echo "No result found.";
               }
          } else {
               echo "Failed to retrieve data from Wikipedia.";
          }
     }
     ?>
</body>
</html>
