<?php
include 'db_connect.php';

// Initializing variables
$professorClasses = [];
$gradeCounts = [];
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ssn'])) {
        // Fetch professor's classes
        $ssn = $_POST['ssn'];
        try {
            $sql = 'SELECT c.title, s.classroom, smd.day, s.begin_time, s.end_time
                    FROM professor AS p
                    JOIN section AS s ON p.ssn = s.professor_ssn
                    JOIN course AS c ON s.course_num = c.course_num
                    JOIN section_meeting_days AS smd ON s.id = smd.section_num_id
                    WHERE p.ssn = :ssn';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['ssn' => $ssn]);
            $professorClasses = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $errorMessage = 'Failed to retrieve professor classes.';
        }
    }

    if (isset($_POST['course'], $_POST['section'])) {
        // Fetch grade distribution for a course section
        $course_num = $_POST['course'];
        $section_num = $_POST['section'];
        try {
            $sql = 'SELECT DISTINCT e.grade, COUNT(*) as grade_count
                    FROM enrollement AS e
                    JOIN section AS s ON e.section_num = s.id
                    WHERE s.course_num = :course_num AND s.section_num = :section_num
                    GROUP BY e.grade';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['course_num' => $course_num, 'section_num' => $section_num]);
            $gradeCounts = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $errorMessage = 'Failed to retrieve grade counts.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor and Course Queries</title>
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="text-4xl text-black p-12">Professor and Course Queries</h1>
    <div class="max-w-7xl w-full grid lg:grid-cols-2 gap-x-4 mx-auto mt-24">
        <!-- Professor's classes form -->
        <div class="space-y-4 place-items-center w-full">
            <h2 class=" text-2xl text-center">Professor's Classes</h2>
            <form method="post" class="border-2 p-4 max-w-sm w-full bg-stone-300 border-black rounded-xl flex flex-col justify-center mx-auto">
                    <label for="ssn" class="text-left font-bold">Enter Professor SSN:</label>
                    <input type="text" id="ssn" name="ssn" required class="rounded-sm p-1">
                    <button type="submit" class="w-full p-1 bg-blue-500 mt-2 rounded-xl text-white">Submit</button>
            </form>
            <h2 class="text-center text-2xl">Course Grade Distribution</h2>
            <form method="post" class="border-2 p-4 max-w-sm w-full bg-stone-300 border-black rounded-xl flex flex-col justify-center mx-auto">
                    <label for="course" class="text-left font-bold">Enter Course Number:</label>
                    <input type="text" id="course" name="course" required class="rounded-sm p-1">
                    <label for="section" class="text-left font-bold">Enter Section Number:</label>
                    <input type="text" id="section" name="section" required class="rounded-sm p-1" />
                    <button type="submit" class="w-full p-1 bg-blue-500 mt-2 rounded-xl text-white">Submit</button>
            </form>
            <div>

            </div>
        </div>
        <!-- Course grade count form -->
        <div class="space-y-4">
            <h2 class="text-2xl font-bold">Results</h2>
            <div>
                <?php if (!empty($gradeCounts)) : ?>
                    <table class="blueTable">
                        <thead>
                            <tr>
                                <th>Grade</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gradeCounts as $grade) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($grade['grade']) ?></td>
                                    <td><?= htmlspecialchars($grade['grade_count']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course'], $_POST['section'])) : ?>
                    <p class="error"><?= $errorMessage ?: "No data available for this query." ?></p>
                <?php endif; ?>
                <?php if (!empty($professorClasses)) : ?>
                    <table class="blueTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Classroom</th>
                                <th>Day</th>
                                <th>Begin Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($professorClasses as $class) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($class['title']) ?></td>
                                    <td><?= htmlspecialchars($class['classroom']) ?></td>
                                    <td><?= htmlspecialchars($class['day']) ?></td>
                                    <td><?= htmlspecialchars($class['begin_time']) ?></td>
                                    <td><?= htmlspecialchars($class['end_time']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ssn'])) : ?>
                    <p class="error"><?= $errorMessage ?: "No data available for this query." ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <a href="index.php">Back to portal</a>
</body>

</html>