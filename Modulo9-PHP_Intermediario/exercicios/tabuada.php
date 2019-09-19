<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <table width="400">
     <?php
     for ($i=1; $i < 11; $i++) { 
          
          echo '<tr>';

          for ($y=1; $y < 11; $y++) { 
               
               echo '<td>'.$i*$y.'</td>';
          }
          echo '</tr>';
     }
     ?>   
     </table>
</body>
</html>