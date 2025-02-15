<?php
header("Content-Type: application/json");
include "connection.php";


// Get all students
function get_students($conn) {
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode($students);
}

// Get a student by ID from url
function get_student($conn, $id) {
    $sql = "SELECT * FROM student WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows >0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "Student not found"]);
    }
}

// Insert new student into database
function insert_student($conn) {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!is_array($data)) {
        echo json_encode(["error" => "Invalid JSON data"]);
        return;
    }

    if (isset($data['student_name'], $data['student_number'], $data['student_age'])) {
        $sql = "INSERT INTO student (student_name, student_number, student_age) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $data['student_name'], $data['student_number'], $data['student_age']);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Student data inserted "]);
        } else {
            echo json_encode(["error" => "Failed to insert student record"]);
        }
    } else {
        echo json_encode(["error" => "Invalid data"]);
    }
}

$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "GET") {
    if (isset($_GET["id"])) {
        get_student($conn, intval($_GET["id"]));
    } else {
        get_students($conn);
    }
} elseif ($request_method == "POST") {
    insert_student($conn);
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$conn->close();

?>