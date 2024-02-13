<?php

// Simulated database storage for vote counts
$votes = [
     1 => 0, // Initialize vote count for item 1
     2 => 0  // Initialize vote count for item 2
];

// Get post data
$id = $_POST['id']; // Item ID
$action = $_POST['action']; // Action: upvote or downvote

// Update vote count based on action
if ($action === "upvote") {
     $votes[$id]++;
} elseif ($action === "downvote") {
     $votes[$id]--;
}

// Simulate database update
// In a real-world scenario, you would update your database with the new vote count

// Return updated vote count
echo $votes[$id];
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upvote Downvote System</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <style>
          .vote-container {
               display: inline-block;
               margin-right: 20px;
          }
     </style>
</head>

<body>

     <div class="vote-container">
          <button class="upvote-btn" data-id="1">Upvote</button>
          <span class="vote-count">0</span>
          <button class="downvote-btn" data-id="1">Downvote</button>
     </div>

     <div class="vote-container">
          <button class="upvote-btn" data-id="2">Upvote</button>
          <span class="vote-count">0</span>
          <button class="downvote-btn" data-id="2">Downvote</button>
     </div>

     <script>
          $(document).ready(function () {
               $(".upvote-btn").click(function () {
                    var id = $(this).data("id");
                    updateVote(id, "upvote");
               });

               $(".downvote-btn").click(function () {
                    var id = $(this).data("id");
                    updateVote(id, "downvote");
               });

               function updateVote(id, action) {
                    $.ajax({
                         url: "vote.php",
                         method: "POST",
                         data: { id: id, action: action },
                         success: function (response) {
                              // Update vote count
                              $(".vote-container[data-id='" + id + "'] .vote-count").text(response);
                         }
                    });
               }
          });
     </script>

</body>

</html>