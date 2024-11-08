<?php
// Correct answers array for Chemistry quiz
$correct_answers = array(
    "q1" => "A",  // H₂O
    "q2" => "A",  // Sulfuric Acid
    "q3" => "B",  // pH 7
    "q4" => "A",  // Nitrous Oxide
    "q5" => "A",  // Atomic number of Carbon = 6
    "q6" => "A",  // Helium
    "q7" => "A",  // NaCl
    "q8" => "B",  // Silver
    "q9" => "B",  // Nitrogen
    "q10" => "A"  // Molar mass of water is 18 g/mol
);

$total_questions = count($correct_answers);

$score = 0;

foreach ($correct_answers as $question => $correct_answer) {
    if (isset($_POST[$question])) {
        $user_answer = $_POST[$question];
        if ($user_answer == $correct_answer) {
            $score++;
        }
    }
}

$percentage_score = ($score / $total_questions) * 100;

session_start();
$_SESSION['score'] = $score;
$_SESSION['percentage_score'] = $percentage_score;
 
if ($percentage_score >= 60) {
    ?>
 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Submit Your Details</title>
        <link rel="stylesheet" href="evaluate.css">
    </head>
    <body style="background-color: rgb(198, 225, 243);">
    
    <div class="background">    
    <figure style="text-align:center;">
   <img src="congratulation.jpg"  style="width:340px;height:180px;"  ><br><br>
   </figure>

        <h2 style="text-align:center;"> You scored <?php echo round($percentage_score, 2); ?>%. Please provide your details:</h2>
        <form action="processResult.php" method="POST" style="text-align:center;">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
 
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id" required><br><br>
 
            <input type="submit" value="Submit">
        </form>
     </div>    
    </body>
    </html>
 
    <?php
} 
else {

    ?>
 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Result</title>
    </head>
    <body>
        <h2>Sorry, you scored below 60%. You answered <?php echo $score; ?> out of <?php echo $total_questions; ?> questions correctly.</h2>
        <p>Your score: <?php echo round($percentage_score, 2); ?>%</p>
        <p>Keep practicing! Better luck next time.</p>
        <a href="mcqTest.html">Retake Quiz</a>
    </body>
    </html>
 
    <?php
}
?>