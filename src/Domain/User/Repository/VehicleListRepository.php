<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class VehicleListRepository
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
	 * Get all vehicles.
	 */
	public function selectVehicles(): array
	{

		$sql = "SELECT id,make,model,year FROM vehicule;";

		$tab = $this->connection->prepare($sql);

		$tab->execute();

		$tableau = $tab->fetchAll();

		return $tableau;
	}
}

