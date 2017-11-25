<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Menu class
 *
 * @package AppBundle\Menu
 */
class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(
        FactoryInterface $factory,
        AuthorizationCheckerInterface $authorizationChecker,
        RequestStack $requestStack
    ) {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
        $this->requestStack = $requestStack;
    }

    /**
     * Creating admin menu
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createAdminMenu()
    {
        $menu = $this->factory->createItem('root');

        // menu positions for authoried user
        if ($this->authorizationChecker->isGranted('ROLE_USER')) {
            $menu
                ->addChild(
                    'Produkty',
                    array(
                        'route' => 'admin_product_list',
                        'extras' => array(
                            'routes' => array(
                                'admin_product_add'
                            )
                        )
                    )
                )
                ->setAttribute('icon', 'fa fa-building fa-fw');
            $menu['Produkty']->addChild(
                'dodaj nowy produkt',
                array(
                    'route' => 'admin_product_add'
                )
            );

            $menu
                ->addChild(
                    'Użytkownicy',
                    array(
                        'route' => 'admin_user_list'
                    )
                )
                ->setAttribute('icon', 'fa fa-user fa-fw');
        } else {
            // menu positions for unauthorized users
            $menu
                ->addChild('Logowanie', array('route' => 'admin_homepage'))
                ->setAttribute('icon', 'fa fa-home fa-fw');
        }

        return $menu;
    }
}
