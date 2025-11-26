<?php

namespace App\Domaine\CarAds;

use Throwable;
use App\Application\AbstractController;
use App\Domaine\CarAds\UseCases\CompanyDatasDTO;
use App\Domaine\CarAds\UseCases\UpdateOpeningsDTO;
use App\Domaine\CarAds\UseCases\UpdateOpeningsInterface;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;
use App\Domaine\UserManagement\UseCases\CreateEmployeeDTO;
use App\Domaine\CarAds\UseCases\UpdateCompanyDatasInterface;
use App\Domaine\CarAds\UseCases\UpdateServicesDTO;
use App\Domaine\CarAds\UseCases\UpdateServicesInterface;
use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;
use App\Domaine\Contact\Repositories\MessageRepositoryInterface;
use App\Domaine\Garage\Repositories\ServiceRepository;
use App\Domaine\Garage\Repositories\ServiceRepositoryInterface;
use App\Domaine\UserManagement\UseCases\CreateEmployeeInterface;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;

final class AdminController extends AbstractController
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepo,
        private readonly MessageRepositoryInterface $messageRepo,
        // private readonly CommentRepositoryInterface $commentRepo,
    ) {}


    /**
     * display admin dashboard
     */
    public function index(
        CreateEmployeeInterface $createEmployee,
        CompanyRepositoryInterface $companyRepo,
        UpdateCompanyDatasInterface $updateCompanyDatas,
        UpdateOpeningsInterface $updateOpenings,
        ServiceRepositoryInterface $serviceRepo,
        UpdateServicesInterface $updateServices
    ) {
        $company = $companyRepo->findOneById(1);
        $company = $companyRepo->findCompanyDatas();
        $services = $serviceRepo->findAll();


        if (isset($_POST['new_employee'])) {
            try {
                $employee = new CreateEmployeeDTO(
                    $_POST['employee_first_name'],
                    $_POST['employee_last_name'],
                    $_POST['employee_phone'] !== "" ? $_POST['employee_phone'] : null
                );

                $user = $createEmployee($employee);


                $this->addFlash('success', 'Compte employé créé avec succès.');
            } catch (Throwable $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        if (isset($_POST['admin_company_informations'])) {
            $datas = [
                'company_name' => $_POST['company_name'],
                'company_address' => $_POST['company_address'],
                'company_zip_code' => $_POST['company_zip_code'],
                'company_phone' => $_POST['company_phone'],
                'company_email' => $_POST['company_email'],
            ];


            $companyDTO = new CompanyDatasDTO(
                $datas['company_name'],
                $datas['company_address'],
                $datas['company_zip_code'],
                $datas['company_phone'],
                $datas['company_email'],
                $_POST['company_city']

            );


            $company = $updateCompanyDatas($companyDTO);
            $this->addFlash('success', 'Les informations de l\'entreprise ont été mises à jour avec succès.');
        }


        if (isset($_POST['admin_company_openings'])) {
            $datas = isset($_POST['company_openings']) ? new UpdateOpeningsDTO($_POST['company_openings']) : new UpdateOpeningsDTO([]);
            $company->setOpenings($updateOpenings($datas));
            $this->addFlash('success', 'Les horaires d\'ouverture ont été mises à jour avec succès.');
        }


        if (isset($_POST['admin_company_services'])) {
            $serviceDTO = new UpdateServicesDTO($_POST['company_services']);
            $services = $updateServices($serviceDTO);


            $this->addFlash('success', 'Les services de l\'entreprise ont été mis à jour avec succès.');
        }

        $employees = $this->userRepo->findAllEmployees();
        $messages = $this->messageRepo->findAllMessages();

        $content = __DIR__ . "/templates/admin.php";

        return $this->render([
            'content' => $content,
            'messages' => $messages,
            'employees' => $employees,
            'company' => $company,
            'services' => $services ?? []
        ]);
    }

    /**
     * display admin panel for car management
     */
    public function cars()
    {
        $content = __DIR__ . "/templates/admin.php";

        return $this->render([
            'content' => $content
        ]);
    }

    /**
     * display admin panel for car edit
     */
    public function car(
        CarRepositoryInterface $carRepo,
        ?int $id
    ) {
        $car = $carRepo->findOneById($id) ?? null;

        if (!$car) {
            return $this->redirectToUri("/404");
        }

        $content = __DIR__ . "/templates/admin.php";

        return $this->render([
            'content' => $content
        ]);
    }

    /**
     * display admin panel for car edit
     */
    public function users(
        UserRepositoryInterface $userRepo
    ) {
        $users = $userRepo->findAll();

        $content = __DIR__ . "/templates/admin.php";

        return $this->render([
            'content' => $content,
            'users' => $users
        ]);
    }
}
