<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
    	/*
    	 * TwigFunction : permet de créer une fonction dans Twig
    	 * 3 paramètres
    	 *    nom de la fonction à utiliser dans Twig
    	 *    méthode PHP reliée à la fonction
    	 *    options
    	 */
        return [
            new TwigFunction('show_map', [$this, 'showMap'], [
            	'is_safe' => [ 'html' ]
            ]),
        ];
    }

    public function showMap():string
    {
        $code = "<iframe width='500' height='400'
			frameborder='0'
			src='https://www.bing.com/maps/embed?h=400&w=500&cp=48.80589311464396~2.4167734832754295&lvl=9'
			scrolling='no'>
            </iframe>"
        ;
        return $code;
    }
}
