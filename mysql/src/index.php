<?php
$filepath = realpath(dirname(__FILE__));

require ($filepath . '/../vendor/autoload.php');

use App\classes\User;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$user = new User(); 

?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
      .body {
        margin: 0 auto;
        width: 50%;
      }
    </style>
  </head>
  <body>
    <div class="body">
      <h1>User Test Exam Result</h1>
      <table class="table table-primary">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Average Correct Answer</th>
                    <th>Recent Taken Test Time</th>
                </tr>
            </thead>
            <tbody>
      <?php 
        $result = $user->getUsers();
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . ($row['avg_correct'] ? intval($row['avg_correct']) : 'N/A') . "</td>";
                echo "<td>" . ($row['most_recent_test_time'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }
      ?>
      </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>