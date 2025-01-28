<?php
 header('Content-Type: application/json');

 $data = json_decode(file_get_contents("php://input"), true);
print_r($data);exit;
if (isset($data['sname'], $data['sage'], $data['scity'])) {
    $sname = $data['sname'];
    $sage = $data['sage'];
    $scity = $data['scity'];

    $insert = $conn->query("INSERT INTO students (sname, sage, scity) VALUES ('$sname', '$sage', '$scity')");

    if ($insert) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

exit;
?>
