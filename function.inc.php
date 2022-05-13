<?php
function emptyInputSignup($name, $email, $username, $password, $confirmPassword)
{
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9\s]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function passwordMatch($password, $confirmPassword)
{
    $result;
    if ($password != $confirmPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./registration.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $password)
{
    $sql = "INSERT INTO users (username, email, usersUid, password) VALUES (?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ./registration.php?error=stmtfailed");
        exit();
    }
    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hasedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ./registration.php?error=none");
}
function emptyInputLogin($username, $password)
{
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $password)
{
    $uidExists = uidExists($conn, $username, $username);
    if (uidExists === false) {
        header("location: ./login.php?error=wronglogin");
        exit();
    }
    $passwordHashed = $uidExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);
    if ($checkPassword === false) {
        header("location: ./login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ./index.php");
        exit();
    }
}