<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class UserCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return int The new ID
     */
    public function insertUser(array $user): string
    {
        $row = [
            'username' => $user['username'],
	        'password' => password_hash($user['password'], PASSWORD_DEFAULT),
            'api_key' => bin2hex(random_bytes(5)),
        ];

        $username = $user['username'];

        $sql_verification = "SELECT EXISTS(SELECT 1 FROM users WHERE username = '$username') AS exist;";

        $tab = $this->connection->prepare($sql_verification);

        $tab->execute();

        $tableau = $tab->fetchAll();

        if ($tableau[0]['exist'] == 0) 
        {

        $api_key = $row['api_key'];

	    $sql = "INSERT INTO users SET 
                username=:username, 
                password=:password,
                api_key=:api_key;";

        $this->connection->prepare($sql)->execute($row);

        // return api_key
        return $api_key;
        }
        else 
        {
            return "";
        }
    }
}

