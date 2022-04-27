<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\VehicleCreatorRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class VehicleCreator
{
    /**
     * @var VehicleCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param VehicleCreatorRepository $repository The repository
     */
    public function __construct(VehicleCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     *
     * @return int The new vehicle ID
     */
    public function createVehicle(array $data): int
    {
        // Insert vehicle
        $vehicleId = $this->repository->insertVehicle($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $vehicleId;
    }

    // /**
    //  * Input validation.
    //  *
    //  * @param array $data The form data
    //  *
    //  * @throws ValidationException
    //  *
    //  * @return void
    //  */
    // private function validateNewUser(array $data): void
    // {
    //     $errors = [];

    //     // Here you can also use your preferred validation library

    //     if (empty($data['username'])) {
    //         $errors['username'] = 'Input required';
    //     }

	//     if (empty($data['password'])) {
	// 	    $errors['password'] = 'Input required';
	//     }

    //     if (empty($data['email'])) {
    //         $errors['email'] = 'Input required';
    //     } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    //         $errors['email'] = 'Invalid email address';
    //     }

    //     if ($errors) {
    //         throw new ValidationException('Please check your input', $errors);
    //     }
    // }
}
