<?php
include 'session.php';
include 'connection.php';


$subject = $_SESSION['subject'];
$form = $_SESSION['form'];
$query = "SELECT * FROM question WHERE question_subject = '$subject' AND question_form = '$form'";
$result = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Question</title>
    <link rel="stylesheet" href="./style/edit-question.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="theme.js"></script>
</head>

<body>
    <?php include_once 'components/header.php' ?>
    <p class="breadcrumb">Form > Subject > Question</p>
    <div class="content">
        <h1 class="title">
            <span id="important-text">Select Question</span>
        </h1>
        <hr>
        <button class="add-question primary-button" onclick="window.location.href='addQuestion.php'">Add New Question</button>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Question</th>
                        <th>Choices</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $temp_choice = json_decode($row['question_choice'], true);
                    ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php
                                    echo htmlspecialchars($row['question_title']);
                                    ?></td>

                                <td><?php
                                    foreach ($temp_choice as $temp) {
                                        echo htmlspecialchars($temp);
                                        echo "<br>";
                                    } ?>
                                </td>

                                <td><?php echo htmlspecialchars($row['question_answer']); ?></td>
                                <td>
                                    <?php
                                    $question_id = $row['question_id'];
                                    echo "<button class='secondary-button edit-button'><a  href='edit-question.php?id=$question_id'>Edit</a></button>"; ?>
                                </td>
                            </tr>
                        <?php
                            $count++;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">No results found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once 'components/footer.php' ?>

    <script src="./script.js"></script>
</body>

</html>