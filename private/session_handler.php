<?php
require_once 'database.php';

/**
 * Class MySqlSessionHandler MySqlを用いてセッションを管理するためのクラス
 */
class MySqlSessionHandler implements SessionHandlerInterface {

    /** @var mysqli $connection 接続 */
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function close(): bool
    {
        return $this->connection->close();
    }

    public function destroy($id): bool
    {
        $statement = $this->connection->prepare('DELETE FROM `php_session` WHERE session_id = ?');
        $statement->bind_param('s', $id);
        return $statement->execute();
    }

    public function gc($max_lifetime): int
    {
        $olderTime = (new DateTime())
            ->sub(new DateInterval("PT${max_lifetime}S"))
            ->format('Y-m-d H:i:s');
        $statement = $this->connection->prepare('DELETE FROM `php_session` WHERE updated_at < ?');
        $statement->bind_param('s', $olderTime);
        $statement->execute();
        return $statement->affected_rows;
    }

    public function open($path, $name): bool
    {
        return true;
    }

    public function read($id): string
    {
        $statement = $this->connection->prepare('SELECT * FROM `php_session` WHERE session_id = ?');
        $statement->bind_param('s', $id);
        if($statement->execute() === false) {
            return '';
        }

        $result = $statement->get_result();
        if($result === false) {
            return '';
        }

        $session = $result->fetch_assoc();
        if ($session === false || $session === null) {
            return '';
        }
        return $session['session_data'];
    }

    public function write($id, $data): bool
    {
        $statement = $this->connection->prepare('REPLACE INTO `php_session`(session_id, session_data) VALUE (?, ?)');
        $statement->bind_param('ss', $id, $data);
        return $statement->execute();
    }
}

session_set_save_handler(new MySqlSessionHandler(connectDB()));
