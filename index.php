<!DOCTYPE html>
<html lang="en">
<head>

    <title>HNG Board| Dashboard</title>

    <link rel="stylesheet" href="leaderboard.css">

 </head>

 <body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="qF03iHYM"></script>

<div class="container-wrap">
	<section id="leaderboard">
		<nav class="ladder-nav">
			<div class="ladder-title">
			<h1>HNG LEADERBOARD</h1>
			</div>
			<div class="ladder-search"> Share:
			<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share on Social Media</a></div>
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</nav>
		<table id="rankings" class="leaderboard-results" width="100%">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Username</th>
					<th>Email</th>
					<th>Track</th>
					<th>Total Stages</th>
         			<th>Current Stage</th>
					<th onclick="sortTable(0)">Points</th>

				</tr>
			</thead>

			<tbody>
			<?php
					$jsonData=file_get_contents("leaderboard.json");
					$json=json_decode($jsonData,true);
					foreach($json['intern'] as $row)
					{
						echo '<tr>';
						echo '<td>' .$row["rank"].'</td>';
						echo '<td>' .$row["name"].'</td>';
						echo '<td>' .$row["email"].'</td>';
						echo '<td>' .$row["track"].'</td>';
						echo '<td>' .$row["total stages"].'</td>';
						echo '<td>' .$row["current stage"].'</td>';
						echo '<td>' .$row["points"].'</td>';
						echo '</tr>';
					}
				   ?>
			</tbody>
		</table>
	</section>


    <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("rankings");
  switching = true;
  
  dir = "asc"; 
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
      
      shouldSwitch = false;
      
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
         
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>


  </body>
</html>