<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class VehicleDeleteActionIdRepository
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
	 * Delete a vehicle.
	 *
	 *
	 *
     */
	 
	public function deleteVehicleById($id)
	{

		$sql = "DELETE FROM vehicule where id = $id;";

		$tab = $this->connection->prepare($sql);

		$tab->execute();

	}
}


