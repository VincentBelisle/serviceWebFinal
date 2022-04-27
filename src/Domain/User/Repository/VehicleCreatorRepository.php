<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class VehicleCreatorRepository
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
	 * Insert vehicle row.
	 *
	 * @param array $vehicle The vehicle data
	 *
	 * @return int The new ID
	 */
	public function insertVehicle(array $vehicle): int
	{
		$row = [
			'model' => $vehicle['model'],
			'make' => $vehicle['make'],
			'year' => $vehicle['year']

		];


		$sql = "INSERT INTO vehicule SET 
                model=:model,
                make=:make,
				year=:year;";

		$this->connection->prepare($sql)->execute($row);

		return (int)$this->connection->lastInsertId();
	}
}

