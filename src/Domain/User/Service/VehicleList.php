<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\VehicleListRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class VehicleList
{
	/**
	 * @var VehicleListRepository
	 */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param VehicleListRepository $repository The repository
	 */
	public function __construct(VehicleListRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Select vehicles
	 *
	 * @param array $data The form data
	 *
	 * @return \App\Domain\User\Repository\select|array|int
	 */
	public function selectVehicles() : array
	{
		$select = $this->repository->selectVehicles();


		return $select;
	}

}


