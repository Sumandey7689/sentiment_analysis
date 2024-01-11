<?php
include 'connection.php';

$positiveCount = 0;
$neutralCount = 0;
$negativeCount = 0;

$username = $_GET['username'];

$result = mysqli_query($conn, "SELECT * FROM `tbl_analysis_data` WHERE username='$username'");
$countSentiment = ['Neutral' => 0, 'Positive' => 0, 'Negative' => 0];
$counter = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $value = $row['value'];
        $labels[] = "";

        if ($value == 0) {
            $countSentiment['Neutral']++;
            $columnValues[$counter] = $countSentiment['Neutral'];
        } elseif ($value == 1) {
            $countSentiment['Positive']++;
            $columnValues[$counter] = $countSentiment['Positive'] - $countSentiment['Negative'] + $countSentiment['Neutral'];
        } elseif ($value == -1) {
            $countSentiment['Negative']++;
            $columnValues[$counter] = $countSentiment['Positive'] - $countSentiment['Negative'] +  $countSentiment['Neutral'];
        }

        $counter++;
    }

    $countData = [
        'columnValues' => $columnValues,
        'countSentiment' => $countSentiment,
        'labels' => $labels
    ];

    $jsonResponse = json_encode($countData);

    echo $jsonResponse;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
