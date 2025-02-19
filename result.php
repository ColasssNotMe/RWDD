<?php
include 'session.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/result.css">
    <title>Result</title>
</head>

<body>
    <?php require_once 'components/header.php'; ?>

    <div class="content">
        <div class="result-section">
            <h1>Result</h1>
            <p><strong>Total:</strong> </p>
            <p><strong>Email:</strong> </p>
            <div class="button-div">
                <button class="secondary-button">
                    Save as collection
                </button>
                <button class="primary-button" id="return-home">
                    <a href=<?php echo $index ?> id="return-button">Return to home</a>
                </button>
            </div>
        </div>

    </div>

    <?php require_once 'components/footer.php'; ?>
</body>

</html>