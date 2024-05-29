<?php
$filename = 'forma.txt'; // Emri i fajllit ku janë ruajtur formularët
$infoFile = 'info.txt'; // Fajlli ku do të ruhen informacionet për numrin e emailave të dërguar

// Kontrollojmë nëse fajlli ekziston për të parandaluar gabime leximi
if (!file_exists($filename)) {
    die("Fajlli '$filename' nuk u gjet.");
}

// Hapim fajllin për lexim
$handle = fopen($filename, 'r');
$content = fread($handle, filesize($filename)); // Lexojmë gjithë përmbajtjen e fajllit
fclose($handle); // Mbyllim fajllin

// Ndajmë përmbajtjen e fajllit në blloqe të ndara për çdo formular të dërguar
$entries = explode("\n\n", $content);

// Përpunimi i të dhënave për të gjetur numrin e emailave për çdo person
$emailCounts = [];

foreach ($entries as $entry) {
    if (preg_match('/Name: (.*)\s+Email: (.*)/', $entry, $matches)) {
        $name = trim($matches[1]);
        if (!isset($emailCounts[$name])) {
            $emailCounts[$name] = 0;
        }
        $emailCounts[$name]++;
    }
}

// Shkruajmë numrin e emailave për çdo person në fajllin info
$infoHandle = fopen($infoFile, 'w'); // Hapim fajllin për shkrim
foreach ($emailCounts as $name => $count) {
    $dataToWrite = "$name ka dërguar $count email(a).\n";
    fwrite($infoHandle, $dataToWrite);
}
fclose($infoHandle);

echo "Informacioni u ruajt në '$infoFile'.";
?>
