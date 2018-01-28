<?php

namespace AdminBundle\Controller;

use Shop\Domain\Model\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/users", name="admin_user_list")
     */
    public function userListAction(Request $request)
    {
        // set sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get users
        $users = $this->get('doctrine_mongodb')
            ->getRepository('Shop:User')
            ->getUsers(array(), $orderBy);

        // configure paginator
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $users,
            $request->query->getInt('page', 1),
            20
        );

        // render template
        return $this->render(
            'AdminBundle:user:user_list.html.twig',
            array(
                'users' => $pagination
            )
        );
    }
}
