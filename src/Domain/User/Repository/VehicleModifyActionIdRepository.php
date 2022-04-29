<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class VehicleModifyActionIdRepository
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
     * Modifie ou crée un véhicule.
     *
     *
     *
     */

    public function modifyVehicleById($id, array $vehicle): bool
    {

        $sql_verification = "SELECT EXISTS(SELECT 1 FROM vehicule WHERE id = $id) AS exist;";

        $verif = $this->connection->prepare($sql_verification);

        $verif->execute();

        $tableau = $verif->fetchAll();

        if ($tableau[0]['exist'] == 1) {


            $row = [
                'model' => $vehicle['model'],
                'make' => $vehicle['make'],
                'year' => $vehicle['year']

            ];


            $sql = "UPDATE vehicule SET 
                model=:model,
                make=:make,
                year=:year
                WHERE id = $id;";


            $this->connection->prepare($sql)->execute($row);

            return true;
            
        } else {
            $row = [
                'model' => $vehicle['model'],
                'make' => $vehicle['make'],
                'year' => $vehicle['year']

            ];


            $sql = "INSERT INTO vehicule SET 
                    id = $id,
                    model=:model,
                    make=:make,
                    year=:year;";
                    


            $this->connection->prepare($sql)->execute($row);

            return false;
        }
    }
}
