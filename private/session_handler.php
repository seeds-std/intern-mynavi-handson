<?php
require_once 'database.php';

/**
 * @var PDO $dbh データベースハンドラ
 */

/**
 * Class MySqlSessionHandler
 */
class MySqlSessionHandler implements SessionHandlerInterface {

    /**
     * @var PDO データベースハンドラ
     */
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function close()
    {
        return true;
    }

    public function destroy($session_id)
    {
        $statement = $this->dbh->prepare('DELETE FROM `php_session` WHERE session_id = :session_id');
        return $statement->execute(['session_id' => $session_id]);
    }

    public function gc($maxlifetime)
    {
        $statement = $this->dbh->prepare('DELETE FROM `php_session` WHERE last_activity < :last_activity');
        return $statement->execute(['last_activity' => time() - $maxlifetime]);
    }

    public function open($save_path, $name)
    {
        return true;
    }

    public function read($session_id)
    {
        $statement = $this->dbh->prepare('SELECT * FROM `php_session` WHERE session_id = :session_id');
        if($statement->execute(['session_id' => $session_id]) === false) {
            return '';
        }
        $result = $statement->fetch();
        if(empty($result)) {
            return '';
        }

        return $result['session_data'];
    }

    public function write($session_id, $session_data)
    {
        $statement = $this->dbh->prepare('REPLACE INTO `php_session`(session_id, session_data, last_activity) VALUE (:session_key, :session_value, :last_activity)');
        return $statement->execute(['session_key' => $session_id, 'session_value' => $session_data, 'last_activity' => time()]);
    }
}

session_set_save_handler(new MySqlSessionHandler($dbh));
