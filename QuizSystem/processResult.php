<?php
session_start();

$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$percentage_score = isset($_SESSION['percentage_score']) ? $_SESSION['percentage_score'] : 0;
$total_questions = 10;

$name = $_POST['name'];
$user_id = $_POST['id'];

$conn = new mysqli("localhost","root", "", "student_info");
 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
if ($percentage_score >= 60) {
    $sql = "INSERT INTO result (name, id, result) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
 
    $stmt->bind_param("ssd", $name, $user_id, $percentage_score);
 
    if ($stmt->execute()) {
        echo "<h1>Data saved successfully!</h1>";
    } else {
        echo "<h1>Error: " . $stmt->error . "</h1>";
    }
 
    $stmt->close();
} else {
    echo "<h1>Your score is below 60%. No data will be saved.</h1>";
}

$conn->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz Result</title>
</head>
<body>
<h1>Quiz Result for <?php echo htmlspecialchars($name); ?> (ID: <?php echo htmlspecialchars($user_id); ?>)</h1>
<p>You answered <strong><?php echo $score; ?></strong> out of <strong><?php echo $total_questions; ?></strong> questions correctly.</p>
<p>Your score: <strong><?php echo round($percentage_score, 2); ?>%</strong></p>
 
    <?php if ($percentage_score == 100): ?>
<p>Excellent! You got all the answers correct!</p>
<?php elseif ($percentage_score >= 70): ?>
<p>Good job! You passed the quiz.</p>
<?php else: ?>
<p>Keep practicing. Better luck next time!</p>
<?php endif; ?>
 
    <a href="showAllResult.php">All Student Result</a>
</body>
</html>