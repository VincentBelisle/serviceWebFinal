<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\VehicleModifyActionIdRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class VehicleModifyById
{
	/**
	 * @var VehcleModifyActionIdRepository
	 */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param VehicleModifyActionIdRepository $repository The repository
	 */
	public function __construct(VehicleModifyActionIdRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Modifie ou crée un vehicule.
	 *
	 * @param int $id l'id
	 *
	 *
	 */
	public function modifyVehicleById(int $id,array $vehicle): bool {

		$bool = $this->repository->modifyVehicleById($id,$vehicle);

        return $bool;

	}

}

