<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['q'].'&APPID=c4d64189685c30187df7546364d23e5b';
        $obj = json_decode(file_get_contents($url), true);

        return $this->render('default/index.html.twig', [
                'wind_speed' => $obj['wind']['speed'],
		'temp' => $obj['main']['temp'],degree
		'pressure' => $obj['main']['pressure'],degree
		'temp_min' => $obj['main']['temp_min'],
		'temp_max' => $obj['main']['temp_max'],
		'country' => $obj['sys']['country'],
		'sunrise' => $obj['sys']['sunrise'],
		'sunset' => $obj['sys']['sunset'],

            // 'temperature': TODO
            // 'humidity': TODO
            // etc..
        ]);
    }
}
