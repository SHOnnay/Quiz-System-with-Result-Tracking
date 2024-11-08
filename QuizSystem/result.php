<?php
session_start();
 
// Retrieve the score and percentage from the session
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$percentage_score = isset($_SESSION['percentage_score']) ? $_SESSION['percentage_score'] : 0;
$total_questions = 10;
 
// Get the name and ID submitted by the user
$name = $_POST['name'];
$id = $_POST['id'];
 
// Display the result
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
</head>
<body>
    <h1>Quiz Result for <?php echo htmlspecialchars($name); ?> (ID: <?php echo htmlspecialchars($id); ?>)</h1>
    <p>You answered <strong><?php echo $score; ?></strong> out of <strong><?php echo $total_questions; ?></strong> questions correctly.</p>
    <p>Your score: <strong><?php echo round($percentage_score, 2); ?>%</strong></p>
 
    <?php if ($percentage_score == 100): ?>
        <p>Excellent! You got all the answers correct!</p>
    <?php elseif ($percentage_score >= 70): ?>
        <p>Good job! You passed the quiz.</p>
    <?php else: ?>
        <p>Keep practicing. Better luck next time!</p>
    <?php endif; ?>
 
    <a href="index.html">Retake Quiz</a>
</body>
</html>
 