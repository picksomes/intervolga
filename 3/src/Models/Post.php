<?php

namespace App\Models;

use App\Kernel\Database\DB;
use App\Kernel\Model\Model;

class Post extends Model
{

    public static function insert($name, $text): void
    {
        $db = DB::getConnection();
        $sql = 'INSERT INTO Post(name, text) VALUES(:name, :text)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':text', $text);
        $statement->execute();
    }

    public static function delete(int $id): void
    {
        $db = DB::getConnection();
        $sql = 'DELETE FROM Post WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public static function update(int $id, string $text): void
    {
        $db = DB::getConnection();
        $sql = 'UPDATE Post SET text = :text WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':text', $text);
        $statement->execute();
    }

    public static function selectAll(): array
    {
        $db = DB::getConnection();
        $statement = $db->prepare("SELECT * FROM Post ORDER BY `id` ASC");
        $statement->execute();
        return $statement->fetchAll();
    }

}
