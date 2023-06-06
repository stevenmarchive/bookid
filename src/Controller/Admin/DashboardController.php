<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use App\Entity\Autheur;
use App\Entity\Editeur;
use App\Entity\Exemplaire;
use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Stock;
use App\Entity\Usure;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bookid EasyAdmin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Genre', 'fas fa-list', Genre::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-list', Editeur::class);
        yield MenuItem::linkToCrud('Auteur', 'fas fa-list', Autheur::class);
        yield MenuItem::linkToCrud('Usure', 'fas fa-list', Usure::class);
        yield MenuItem::linkToCrud('Stock', 'fas fa-list', Stock::class);
        yield MenuItem::linkToCrud('Livre', 'fas fa-book', Livre::class);
        yield MenuItem::linkToCrud('Exemplaire', 'fas fa-list', Exemplaire::class);
        yield MenuItem::linkToCrud('Adherent', 'fas fa-list', Adherent::class);
    }
}
