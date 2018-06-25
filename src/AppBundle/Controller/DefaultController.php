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
        // Display wordpress website name and description
        $api = $this->getResource('/');
        $wordpressName = $api->name;
        $wordpressDescription = $api->description;

        return $this->render('default/index.html.twig', [
            'wordpress_name' => $wordpressName,
            'wordpress_description' => $wordpressDescription,
        ]);
    }

    /**
     * Get data from resource wordpress api
     *
     * @param string $resource api url
     *
     * @return array/object
     *
     */
    protected function getResource($resource)
    {
        $apiUrl = $this->container->getParameter('wordpress_url') . '/wp-json';
        $json = file_get_contents($apiUrl.$resource);
        $result = json_decode($json);
        return $result;
    }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
