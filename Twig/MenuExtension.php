<?php

namespace Prodigious\Sonata\MenuBundle\Twig;

use Prodigious\Sonata\MenuBundle\Entity\Menu;
use Prodigious\Sonata\MenuBundle\Manager\MenuManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MenuExtension extends AbstractExtension
{
    protected MenuManager $MenuManager;

    public function __construct(MenuManager $menuManager)
    {
        $this->menuManager = $menuManager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_menu', [$this, 'getMenu']),
        ];
    }

    public function getMenu(string $alias): ?Menu
    {
        if ($menu = $this->menuManager->loadByAlias($alias)) {
            return $menu;
        }

        return null;
    }
}
