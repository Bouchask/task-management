<?php
require_once 'DB.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $db = DB::getInstance();
    $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

header('Location: index.php');
exit;
