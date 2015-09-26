<?php

# 1. connection
$pdo = new PDO('sqlite:chinook.sqlite3');
$artistId = 21;
$sql = "select * from Album where ArtistId = :artistId";

#2. statement
$stmt = $pdo->prepare($sql);

#3. execute
$stmt->bindParam(':artistId', $artistId);
$stmt->execute();

#4. fetch data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);