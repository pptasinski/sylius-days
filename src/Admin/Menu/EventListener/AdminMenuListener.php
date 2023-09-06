<?php

declare(strict_types=1);

namespace App\Admin\Menu\EventListener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: 'sylius.menu.admin.main', method: 'addAdminMenuItems')]
final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        $marketingMenu = $menu->getChild('marketing');

        $marketingMenu
            ->addChild('terms', ['route' => 'app_admin_term_index'])
            ->setLabel('app.ui.terms')
            ->setLabelAttribute('icon', 'star');
    }
}
