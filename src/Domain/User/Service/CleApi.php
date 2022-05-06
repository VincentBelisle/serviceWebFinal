<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\CleApiRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class CleApi
{
	/**
	 * @var CleApiRepository
     */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param CleApiRepository $repository The repository
	 */
	public function __construct(CleApiRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Select api key.
	 *
	 * @param array $data The form data
	 *
	 * @return \App\Domain\User\Repository\select|array|int
	 */
	public function selectCleApi(array $user) : string
	{
		$select = $this->repository->selectCleApi($user);

		return $select;
	}

}


