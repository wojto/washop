<?php

namespace Admin\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Shop\Infrastructure\Repository\Doctrine\UserRepository;
use Knp\Component\Pager\PaginatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="admin_user_list")
     */
    public function userListAction(Request $request, UserRepository $userRepository, PaginatorInterface $paginator)
    {
        // set sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get users
        $users = $userRepository->getUsers(array(), $orderBy);

        // configure paginator
        $pagination = $paginator->paginate(
            $users,
            $request->query->getInt('page', 1),
            20
        );

        // render template
        return $this->render(
            'Admin/user/user_list.html.twig',
            array(
                'users' => $pagination
            )
        );
    }
}
