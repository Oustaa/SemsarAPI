<?php
class Like
{
    private $conn;

    function __construct($db)
    {
        $this->conn = $db;
    }

    public function likeItem($ItemId, $userId)
    {

        $query = "INSERT INTO favorite VALUES(?,?)";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([$userId, $ItemId]);
    }

    public function dislikeItem($ItemId, $userId)
    {
        $query = "DELETE FROM favorite WHERE userId = ? AND ItemId =  ?";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([$userId, $ItemId]);
    }

    public function getFavorite($userId)
    {
        $query = "select * FROM item i
            WHERE i.id IN (
                SELECT ItemId FROM favorite
                WHERE userId = 3
            );";
    }
}
