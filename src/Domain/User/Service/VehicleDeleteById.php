<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\VehicleDeleteActionIdRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class VehicleDeleteById
{
	/**
	 * @var VehcleDeleteActionIdRepository
	 */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param VehicleDeleteActionIdRepository $repository The repository
	 */
	public function __construct(VehicleDeleteActionIdRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Delete a vehicle.
	 *
	 * @param int $id The id
	 *
	 *
	 */
	public function deleteVehicleById(int $id) {

		$this->repository->deleteVehicleById($id);


	}

}

