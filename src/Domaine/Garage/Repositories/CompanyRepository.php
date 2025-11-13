<?php

namespace App\Domaine\Garage\Repositories;

use PDO;
use App\Application\AbstractRepository;
use App\Domaine\Garage\Entities\Company;

final class CompanyRepository extends AbstractRepository implements CompanyRepositoryInterface
{
    protected string $entity = Company::class;
    protected string $table = 'companies';
    protected array $fields = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'siret',
        'city',
        'zipCode',
        'createdAt',
        'updatedAt'
    ];


    public function findCompanyDatas(): ?Company
    {
        // $sql = "SELECT c.*, o.id AS opening_id, o.openTime, o.closureTime, o.day FROM companies c JOIN
        //     openings o ON c.id = o.company WHERE c.id = 1;";
        $sql = "SELECT c.*, o.day, o.openTime, o.closureTime, o.id AS opening_id FROM companies c 
        LEFT JOIN openings o ON c.id = o.company WHERE c.id = 1;";
        $sql = "SELECT * FROM companies WHERE id = 1;";

        $stmt = $this->pdo->prepare($sql);

        // $stmt->bindValue(':id', 1, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;

        $result = $this->hydrate($data);

        return $result;
    }



    public function save(Company $company): bool
    {
        $sql = "UPDATE companies c SET c.name = :name,
        c.phone = :phone,
        c.email = :email,
        c.address = :address,
        c.city = :city,
        c.zipCode = :zipCode
        WHERE c.id = 1;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $company->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':phone', $company->getPhone(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $company->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':address', $company->getAddress(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $company->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':zipCode', $company->getZipCode(), PDO::PARAM_INT);

        $result = $stmt->execute();
        $stmt = null;

        return $result;
    }
}
