<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class CleApiRepository
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
	 * Get api key.
	 */
	public function selectCleApi($user): string
	{

        $row = [

            'username' => $user['username'],
            'password' => $user['password'],

        ];

        $username = $user['username'];


		$sql = "SELECT api_key,password FROM users WHERE username = '$username';";

		$tab = $this->connection->prepare($sql);

		$tab->execute();

		$tableau = $tab->fetchAll();

        if(password_verify($row['password'], $tableau[0]['password']))
        {
            return $tableau[0]['api_key'];
        }
        else
        {
            return "";
        }
	}
}

