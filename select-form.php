<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Form</title>
    <link rel="stylesheet" href="./style/selection.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <script src="theme.js"></script>
</head>

<body>
    <div>
        <?php include_once 'components/header.php' ?>
        <div class="content">
            <div id="button-div">
                <!-- <a href="" class="confirmation-button"> -->
                    <button onclick="sendFormGetReq()" class="confirmation-button">Next</button>
                <!-- </a> -->
            </div>

            <div class="selection">
                <button class="form-button" onclick="addForm(event,1)">Form 1</button>
                <button class="form-button" onclick="addForm(event,2)">Form 2</button>
                <button class="form-button" onclick="addForm(event,3)">Form 3</button>
                <button class="form-button" onclick="addForm(event,4)">Form 4</button>
                <button class="form-button" onclick="addForm(event,5)">Form 5</button>
                <button class="form-button" onclick="addForm(event,0)">All Form</button>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>

</html>