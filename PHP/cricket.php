<?php
// Step 1: Create an array of Indian cricket players with detailed info
$players = [
    [
        "name" => "Virat Kohli",
        "role" => "Batsman",
        "age" => 35,
        "country" => "India"
    ],
    [
        "name" => "Rohit Sharma",
        "role" => "Batsman",
        "age" => 36,
        "country" => "India"
    ],
    [
        "name" => "Jasprit Bumrah",
        "role" => "Bowler",
        "age" => 30,
        "country" => "India"
    ],
    [
        "name" => "Ravindra Jadeja",
        "role" => "All-rounder",
        "age" => 35,
        "country" => "India"
    ],
    [
        "name" => "KL Rahul",
        "role" => "Wicketkeeper-Batsman",
        "age" => 32,
        "country" => "India"
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>

    <!-- CSS Styling -->
    <style>
        /* Style the body with font and gradient background */
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(120deg, #f5f7fa, #c3cfe2);
            color: #333;
        }

        /* Style the page heading */
        h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 28px;
            color: #0a3d62;
            text-shadow: 1px 1px 2px #aaa;
        }

        /* Style the table layout and appearance */
        table {
            border-collapse: collapse;
            width: 85%;
            margin: 30px auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Style all table header and data cells */
        th, td {
            padding: 15px;
            text-align: center;
        }

        /* Style table header */
        th {
            background-color: #273c75;  /* Dark blue */
            color: #fff;
            font-size: 16px;
        }

        /* Alternate row background color for even rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect on table rows */
        tr:hover {
            background-color: #dcdde1;
            transition: 0.3s;
        }
    </style>
</head>
<body>

<!-- Page Heading -->
<h2>Indian Cricket Players - Detailed Info</h2>

<!-- Player Info Table -->
<table>
    <tr>
        <!-- Table Headers -->
        <th>No.</th>
        <th>Name</th>
        <th>Role</th>
        <th>Age</th>
        <th>Country</th>
    </tr>

    <!-- PHP loop to display player data -->
    <?php foreach ($players as $index => $player): ?>
        <tr>
            <!-- Display player details using htmlspecialchars for safety -->
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($player["name"]) ?></td>
            <td><?= htmlspecialchars($player["role"]) ?></td>
            <td><?= htmlspecialchars($player["age"]) ?></td>
            <td><?= htmlspecialchars($player["country"]) ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
