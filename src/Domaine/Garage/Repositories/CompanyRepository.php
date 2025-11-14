<?php

namespace App\Domaine\Garage\Repositories;

use PDO;
use App\Application\AbstractRepository;
use App\Domaine\Garage\Entities\Company;
use App\Domaine\Garage\Entities\Opening;

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
        'updatedAt',
        'openings'
    ];


    public function findCompanyDatas(): ?Company
    {
        $sql = "SELECT c.*, o.id AS opening_id, o.openTime, o.closureTime, o.day FROM companies c LEFT JOIN
            openings o ON c.id = o.company WHERE c.id = 1;";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;


        $openings = [];
        $company = [];


        $company = [];

        $openings = [];
        foreach ($datas as $key => $data) {
            if ($key === 0 && !isset($company['id'])) {
                foreach ($this->fields as $field) {
                    if ($field !== 'openings') {
                        $company[$field] = $data[$field];
                    }
                }
            }
            if ($data["opening_id"] !== null) {
                $openings[] = [
                    'id' => $data['opening_id'],
                    'day' => $data['day'],
                    'openTime' => $data['openTime'],
                    'closureTime' => $data['closureTime']
                ];
            }
        }
        
        $openingDatas = [];
        foreach ($openings as $opening) {
            $openingDatas[] = $this->hydrate($opening, Opening::class);
        }
        
        $company['openings'] = $openingDatas;
        $result = $this->hydrate($company);

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
