<?php
include 'connection.php'; // Ensure database connection is included

$query = "SELECT question_id, question_choice FROM question";
$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questionID = $row['question_id'];
        $choices = $row['question_choice'];

        // Check if choices are in valid JSON format
        $decodedChoices = json_decode($choices, true);
        
        if ($decodedChoices === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "Invalid JSON format for Question ID: $questionID\n";
            continue;
        }

        // Ensure it's an array and not empty
        if (!is_array($decodedChoices) || empty($decodedChoices)) {
            echo "Empty or invalid choice data for Question ID: $questionID\n";
            continue;
        }

        // Check if there are more than 5 choices
        if (count($decodedChoices) > 5) {
            echo "Too many choices (>5) for Question ID: $questionID\n";
        }
    }
} else {
    echo "Error fetching data: " . mysqli_error($connection);
}

mysqli_close($connection);
?>

