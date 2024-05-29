<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\ushtrim\src\Exception.php';
require 'C:\xampp\htdocs\ushtrim\src\PHPMailer.php';
require 'C:\xampp\htdocs\ushtrim\src\SMTP.php';

if(isset($_POST["submit"])){
    // Përgatitja e të dhënave për të ruajtur në forma.txt
    $file_path = 'C:\xampp\htdocs\ushtrim\forma.txt'; // Sigurohuni që rruga është e saktë dhe e qasshme
    $data_to_save = "Name: " . $_POST["name"] . "\nEmail: " . $_POST["email"] . "\nPhone: " . $_POST["phone"] . "\nSubject: " . $_POST["subject"] . "\nMessage: " . $_POST["message"] . "\n\n";
    $handle = fopen($file_path, 'a'); // Hap fajllin në mode append
    if (!$handle) {
        echo 'Unable to open the file for writing. Check permissions.';
        exit;
    }
    fwrite($handle, $data_to_save); // Shkruan të dhënat në fajll
    fclose($handle); // Mbyll fajllin

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elton.pajaziti@student.uni-pr.edu';
    $mail->Password = 'ipchxscgbvvhqsss';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('elton.pajaziti@student.uni-pr.edu', 'From ' . $_POST["name"]);
    $mail->addAddress('elton.pajaziti@student.uni-pr.edu');
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    try {
        if (!$mail->send()) {
            throw new Exception('Failed to send email.');
        }
        echo "<script>alert('Sent Successfully'); document.location.href='index.php';</script>";

        // Logjika për përpunimin dhe ruajtjen e të dhënave në info.txt
        $info_file = 'C:\xampp\htdocs\ushtrim\info.txt';
        $handle = fopen($file_path, 'r');
        if ($handle) {
            $size = filesize($file_path);
            $content = fread($handle, $size);
            fclose($handle);

            $entries = explode("\n\n", trim($content));
            $emailCounts = [];

            foreach ($entries as $entry) {
                if (preg_match('/Name: (.*)\s+Email:/', $entry, $matches)) {
                    $name = trim($matches[1]);
                    if (!isset($emailCounts[$name])) {
                        $emailCounts[$name] = 0;
                    }
                    $emailCounts[$name]++;
                }
            }

            $infoHandle = fopen($info_file, 'w');
            foreach ($emailCounts as $name => $count) {
                $dataToWrite = "Name: $name\nEmail Count: $count\n";
                fwrite($infoHandle, $dataToWrite);
            }
            fclose($infoHandle);
        }

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        throw new Exception("Mailer Error: " . $mail->ErrorInfo);
    }
}
?>