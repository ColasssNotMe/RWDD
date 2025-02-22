<?php
$server = "localhost";
$user     = 'root';
$password = '';
$database = 'quizzation'; // insert database name
// $_SESSION['listOfQuestion'] = array();
// $_SESSION['subject'] = 'math';
// $_SESSION['form'] = '1';



// TODO: change "table" in the query to db table name
//use a _GET to know when the button is pressed and then generate things -> replace the $var and then it should update on the question-page?

// create connection
$connection = mysqli_connect($server, $user, $password, $database);
switch ($connection) {
    case false:
        break;
}



if (isset($_GET['subject'])) {
    $_SESSION['subject'] = $_GET['subject'];
    $_SESSION['questionList'] = getQuestion($connection);
    $_SESSION['currentQuestionNum'] = 1;
    $_SESSION['userAns'] = array();
    $_SESSION['userAnsData'] = array();
}

// get random request question
function getQuestion($connection)
{
    $query  = "SELECT * from question where question_form = '{$_SESSION['form']}' AND question_subject = '{$_SESSION['subject']}' ORDER BY RAND() LIMIT 10";
    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $listOfQuestion = array();
    $i = 0;
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['question_choice'] = json_decode($row['question_choice'], true);
            $listOfQuestion[$i] = $row;
            $i++;
        }
        // var_dump($listOfQuestion);
        $_SESSION['listOfQuestion'] = $listOfQuestion;
        $_SESSION['currentQuestion'] = $listOfQuestion[0];
        // var_dump($_SESSION['currentQuestion']);
        // var_dump($_SESSION['listOfQuestion']);
    } else {
        echo 'No question returned';
    }
}


// used for validate the login user + store the logged in user credential
function validateStudentCredential($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);
    $query  = "SELECT * FROM user WHERE user_email='$email' AND user_role='student'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $row['user_password'])) {
            $_SESSION['currentLoginUser'] = $row;
            return "Login successful";
        } else {
            return "Incorrect password";
        }
    } else {
        return "User not found";
    }
}

function validateTeacherCredential($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);
    $query  = "SELECT * FROM user WHERE user_email='$email' AND user_role='teacher'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $row['user_password'])) {
            $_SESSION['currentLoginUser'] = $row;
            return "Login successful";
        } else {
            return "Incorrect password";
        }
    } else {
        return "User not found";
    }
}

function addRecord($connection, $score, $timeTaken, $userID, $questionID)
{
    $date = date("Y-m-d");
    $query = "INSERT INTO record (score,time_taken,user_id,question_id,date_taken) VALUES ($score,$timeTaken,$userID,'$questionID',$date)";
    if (!mysqli_query($connection, $query)) {
        echo "<script>alert('Error when storing record')</script>";
    }
}

function deleteRecord($connection, $recordID)
{
    $query = "DELETE FROM record WHERE record_id = $recordID";
    if (!mysqli_query($connection, $query)) {
        echo "<script>alert('Error when deleting record')</script>";
    } else {
        header("Location: result.php");
    }
}

function addUser($connection, $username, $password, $rePassword, $email, $role)
{
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = isset($password) ? $password : '';
    $rePassword = isset($rePassword) ? $rePassword : '';

    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        return "Only letters and spaces are allowed.";
    } elseif ($password !== $rePassword) {
        return "Passwords do not match. Please try again.";
    } else {
        $query = "SELECT * FROM user WHERE user_email = '$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            return "Email is already taken. Please use a different one.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (user_name,user_password,user_email, user_role) VALUES ('$username','$hashedPassword','$email','$role')";
            if (!mysqli_query($connection, $query)) {
                return "Error when registering user";
            } else {
                return "Account registered successful. Login now to get full access of website.";
            }
        }
    }
}



function deleteUser($connection, $userID)
{
    $query = "DELETE FROM user WHERE user_id = $userID";
    if (!mysqli_query($connection, $query)) {
        echo "Error adding user";
    } else {
        header("Location: index.php");
    }
}


function addQuestion($connection, $form, $subject, $picture, $question, $choice, $answer)
{
    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO question 
        (question_form, question_subject, question_picture, question_title, question_choice, question_answer) 
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);
    if ($stmt) {
        // Bind parameters (s = string, i = integer, NULL is handled as string)
        mysqli_stmt_bind_param($stmt, "isssss", $form, $subject, $picture, $question, $choice, $answer);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Question added successfully!'); window.location.href='viewQuestions.php';</script>";
            header("Location: index.php");
        } else {
            echo "Error executing query: " . mysqli_stmt_error($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($connection);
    }
}


function deleteQuestion($connection, $questionID)
{
    $query = "DELETE FROM question where question_id =$questionID";
    if (!mysqli_query($connection, $query)) {
        echo "Error deleting question";
    } else {
        header("Location:index.php");
    }
}

function uploadPicture($file, $currentProfilePath, $uploadFileLocation, $failBackTo)
{
    // Check if a file is selected
    if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return $currentProfilePath;
    }

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Upload error! Please try again.'); window.location.href='$failBackTo';</script>";
        exit();
    }

    // File details
    $fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<script>alert('Invalid file type! Allowed: JPG, PNG, GIF.'); window.location.href='$failBackTo';</script>";
        exit();
    }

    // Generate unique file name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $newPath = $uploadFileLocation . $newFileName;

    // Move uploaded file to destination
    if (move_uploaded_file($fileTmpPath, $newPath)) {
        // Delete old profile picture if exists
        // if (!empty($currentProfilePath) && file_exists($currentProfilePath)) {
        //     unlink($currentProfilePath);
        // }
        return $newPath;
    } else {
        echo "<script>alert('File upload failed! Please try again.'); window.location.href='$failBackTo';</script>";
        exit();
    }
}

function changeUserPassword($connection, $userId, $currentPassword, $newPassword, $rePassword)
{
    // Fetch current password from database
    $query = "SELECT user_password FROM user WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    // Check if the query was successful
    if (!$result) {
        echo "<script>alert('Database error. Please try again later.'); window.location.href='editAccount.php';</script>";
        exit();
    }

    $userData = mysqli_fetch_assoc($result);
    // Validate if user exists
    if (!$userData) {
        echo "<script>alert('User not found. Please log in again.'); window.location.href='login.php';</script>";
        exit();
    }

    if (!password_verify($currentPassword, $userData['user_password'])) {
        echo "<script>alert('Current password is incorrect.'); window.location.href='editAccount.php';</script>";
        exit();
    }

    if ($newPassword !== $rePassword) {
        echo "<script>alert('New passwords do not match.'); window.location.href='editAccount.php';</script>";
        exit();
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    if (!mysqli_query($connection, "UPDATE user SET user_password = '$hashedPassword' WHERE user_id = '$userId'")) {
        echo "<script>alert('Error updating password.'); window.location.href='editAccount.php';</script>";
        exit();
    }

    echo "<script>alert('Password updated successfully!'); window.location.href='account.php';</script>";
    exit();
}
