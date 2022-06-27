<?php

namespace App\Controller;

use App\Service\GeoAPImanager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressAjaxController extends AbstractController
{
    public function address_autocomplete(Request $request){
        $return = []; //our variable to fill with data to return to autocomplete result

      //  $search_string = \Drupal::request()->request->get('name_startsWith');
        $search_string = $request->get('name_startsWith');
        $type = "housenumber"; // can be housenumber, street, locality or municipality.

        $geoApi = new GeoAPImanager();
        $return = $geoApi->searchPlace($geoApi->buildOptionsSearchAutocomplete($search_string, $type, 10));

        return new JsonResponse(json_encode($return['features']), 200, [], true);
    }
}