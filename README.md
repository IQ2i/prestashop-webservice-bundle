PrestaShop Web Service Bundle
==================================

This version of the bundle requires Symfony 2.1+.

## Installation

#### Step 1: Add bundle in composer.json

```js
{
    "require": {
        "iq2i/prestashop-webservice-bundle": "dev-master"
    }
}
```

#### Step 2: Active in app/AppKernel.php

``` php
public function registerBundles()
{
    $bundles = array(
        // ...
        new \IQ2i\PrestaShopWebServiceBundle\IQ2iPrestaShopWebServiceBundle(),
    );
}
```

##### Step 3: Add configuration in app/config/config.yml

``` yaml
# app/config/config.yml
iq2i_prestashop_web_service:
    url: http://yourprestashop.com/
    key: G5U3GCMX88EF9SFYKN82PBRYJAQQ3Z2G
    debug: false
    json: true
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
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        
        $presta = $this->container->get('iq2i_prestashop_web_service')->getInstance();
        $result = $presta->get(array(
            "resource" => "orders",
            /* fetch all available informations instead of only ID's */
            "display" => "full"
        ));
        dump($result);
        return $this->render('default/index.html.twig');
    }
}
```
## Additional resources

[Web service reference](http://doc.prestashop.com/display/PS16/Web+service+reference)