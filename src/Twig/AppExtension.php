<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

// GlobalsInterface permet de créer des variables globales accessibles par tout template twig
class AppExtension extends AbstractExtension implements GlobalsInterface
{
	public function getGlobals(): array
	{
		// doit retourner un tableau associatif
		return [
			'code_GA' => 'XXXX-XXXX-XX'
		];
	}


	public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            //new TwigFilter('filter_name', [$this, 'doSomething']),
            new TwigFilter('phone_intl_format', [$this, 'phoneIntlFormat']),
        ];
    }

    // les méthodes des filtres reçoivent obligatoirement un paramètre qui représente la donnée à filtrer
	public function phoneIntlFormat(string $value):string
	{
		// 0123456789 > +33 1 23 45 67 89
		return preg_replace(
			'#\d(\d)(\d{2})(\d{2})(\d{2})(\d{2})#',
			'+33 $1 $2 $3 $4 $5',
			$value
		);
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

    public function showMap(array $options):string
    {
    	//dd($options);
        $code = "<iframe width='500' height='400'
			frameborder='0'
			src='https://www.bing.com/maps/embed?h=400&w=500&cp={$options['lat']}~{$options['long']}&lvl={$options['zoom']}'
			scrolling='no'>
            </iframe>"
        ;
        return $code;
    }
}
