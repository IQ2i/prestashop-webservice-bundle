PrestaShop Web Service Bundle
==================================

This version of the bundle requires Symfony 2.1+.

## Installation

#### Step 1: Add dependency via Composer

```composer require iq2i/prestashop-webservice-bundle```

#### Step 2: Active in app/AppKernel.php

``` php
public function registerBundles()
{
    $bundles = array(
        // ...
        new IQ2i\PrestaShopWebServiceBundle\IQ2iPrestaShopWebServiceBundle(),
    );
}
```

##### Step 3: Add configuration in app/config/config.yml

``` yaml
# app/config/config.yml
iq2i_prestashop_web_service:
    connections:
        my_prestashop_1:
            url: http://my-prestashop-1.com/
            key: G5U3GCMX88EF9SFYKN82PBRYJAQQ3Z2G
            debug: false
        my_prestashop_2:
            url: http://my-prestashop-1.com/
            key: G5U3GCMX88EF9SFYKN82PBRYJAQQ3Z2G
            debug: false
```

## Use in your application

``` php
<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        
        $presta = $this->container->get('iq2i_prestashop_web_service')->getInstance('my_prestashop_1');
        $result = $presta->get(array(
            "resource" => "orders"
        ));
        var_dump($result);
        die();
    }
}
```