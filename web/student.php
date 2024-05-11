<?php
include 'db_connect.php';

$campusID = '';
$courses = [];
$courseNumber = '';
$sections = [];
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course'])) {
  $courseNumber = $_POST['course'];
  try {
    $sql = 'SELECT 
              s.section_num,
              s.classroom,
              GROUP_CONCAT(DISTINCT smd.day ORDER BY smd.day SEPARATOR \', \') AS meeting_days,
              s.begin_time,
              s.end_time,
              COUNT(e.student_id) AS enrolled_students
          FROM 
              section AS s
          JOIN 
              section_meeting_days AS smd ON s.id = smd.section_num_id
          LEFT JOIN 
              enrollement AS e ON s.id = e.section_num
          WHERE 
              s.course_num = :course_num
          GROUP BY 
              s.id, s.classroom, s.begin_time, s.end_time
          ORDER BY 
              s.section_num';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':course_num', $courseNumber, PDO::PARAM_STR);
    $stmt->execute();
    $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($sections)) {
      $errorMessage = "No sections found for the provided course number.";
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    $errorMessage = 'Failed to retrieve section details. Error: ' . $e->getMessage();
  }
}

// Process the student ID form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['campusID'])) {
  $campusID = $_POST['campusID'];
  try {
    $sql = 'SELECT 
                c.title AS course_title,
                e.grade
            FROM 
                enrollement AS e
            JOIN 
                section AS s ON e.section_num = s.id
            JOIN 
                course AS c ON s.course_num = c.course_num
            WHERE 
                e.student_id = :campus_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':campus_id', $campusID, PDO::PARAM_STR);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($courses)) {
      $errorMessage = "No courses found for the provided student ID.";
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    $errorMessage = 'Failed to retrieve courses. Error: ' . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Queries</title>
  <link rel="stylesheet" href="css/styles.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <h1 class="text-4xl text-black p-12">Student Queries</h1>
  <div class="max-w-7xl w-full grid lg:grid-cols-2 gap-x-4 mx-auto mt-24">
    <div class="space-y-4 place-items-center w-full">
      <h2 class=" text-2xl text-center">Courses</h2>
      <form method="post" class="border-2 p-4 max-w-sm w-full bg-stone-300 border-black rounded-xl flex flex-col justify-center mx-auto">
        <label for="course" class="text-left font-bold">Enter Course Number:</label>
        <input type="text" id="course" name="course" required class="rounded-sm p-1">
        <button type="submit" class="w-full p-1 bg-blue-500 mt-2 rounded-xl text-white">Submit</button>
      </form>
      <h2 class="text-center text-2xl">Student</h2>
      <form method="post" class="border-2 p-4 max-w-sm w-full bg-stone-300 border-black rounded-xl flex flex-col justify-center mx-auto">
        <label for="campusID" class="text-left font-bold">Enter campus wide ID:</label>
        <input type="text" id="campusID" name="campusID" required class="rounded-sm p-1">
        <button type="submit" class="w-full p-1 bg-blue-500 mt-2 rounded-xl text-white">Submit</button>
      </form>
      <div>
      </div>
    </div>
    <div class="space-y-4">
      <h2 class="text-2xl font-bold">Results</h2>
      <div>
        <?php if (!empty($courses)) : ?>
          <table class="blueTable">
            <thead>
              <tr>
                <th>Course Title</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($courses as $course) : ?>
                <tr>
                  <td><?= htmlspecialchars($course['course_title']) ?></td>
                  <td><?= htmlspecialchars($course['grade']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['campusID'])) : ?>
          <p class="error"><?= $errorMessage ?: "No data available for this query." ?></p>
        <?php endif; ?>
        <?php if (!empty($sections)) : ?>
          <table class="blueTable">
            <thead>
              <tr>
                <th>Section Number</th>
                <th>Classroom</th>
                <th>Meeting Days</th>
                <th>Begin Time</th>
                <th>End Time</th>
                <th>Enrolled Students</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sections as $section) : ?>
                <tr>
                  <td><?= htmlspecialchars($section['section_num']) ?></td>
                  <td><?= htmlspecialchars($section['classroom']) ?></td>
                  <td><?= htmlspecialchars($section['meeting_days']) ?></td>
                  <td><?= htmlspecialchars($section['begin_time']) ?></td>
                  <td><?= htmlspecialchars($section['end_time']) ?></td>
                  <td><?= htmlspecialchars($section['enrolled_students']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course'])) : ?>
          <p class="error"><?= $errorMessage ?: "No data available for this query." ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <a href="index.php">Back to portal</a>
</body>

</html>