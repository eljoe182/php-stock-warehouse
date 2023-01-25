# Consulta de Stock de Productos a Profit 2k8

## Pre-requisitos

- Disponer del servicio REST integrador de Consultores GREB licenciado

## Instalación

1. Clonar el repositorio

```bash
git clone https://github.com/eljoe182/php-stock-warehouse.git stock
```

2. Instalar dependencias

```bash
cd stock
composer install
```

3. Configurar el archivo .env

```bash
cp .env.example .env
```

3.1 Configurar los datos de autenticación al api de Profit

```bash
HOST_API=http://[IP_SERVIDOR]:4000
USERNAME=[username]
PASSWORD=[password]
DATABASE=[database]
```

> **Nota:** las credenciales de acceso al api de Profit deben ser las mismas que se utilizan en el archivo appsettings.json en la key *"TokenCredentials"*.

4. El archivo index.php es el ejemplo de uso de la librería.

## Ejemplo de uso

### Autenticación

Para todas las consultas se debe obtener el token de acceso al api de Profit, para esto se debe instanciar la clase `Authentication` y llamar al método `getToken()`.

```php
require 'app/index.php';

use Warehouse\Application\Authentication;

$auth = new Authentication();
$token = $auth->getToken();
```

El token de acceso es requerido para todos los endpoints del api, por lo que se debe almacenar en una variable para su posterior uso. Este token tiene una duración de 1 hora, luego de este tiempo se debe volver a obtener un nuevo token.

### Consulta de Stock

Si deseas realizar una consulta de stock de todo el inventario, debes instanciar la clase `GetStockWarehouse` y pasarle como parámetro el código del producto y el almacen usando el metodo `getStockWarehouse()`.

```php
require 'app/index.php';

use Warehouse\Application\GetStockWarehouse;

...

$stock = new GetStockWarehouse();
$stock->token = "Bearer $token"; // token de acceso
$result = $stock->getStockWarehouse('CCS');

...
```

Si deseas realizar una consulta de stock de un producto en un almacen especifico, debes instanciar la clase `GetStockProduct` y pasarle como parámetro el código del producto y el almacen usando el metodo `getStockProduct()`.

```php
require 'app/index.php';

use Warehouse\Application\GetStockProduct;

...

$stockProduct = new GetStockProduct();
$stockProduct->token = "Bearer $token";
$result = $stockProduct->getStockProduct('3003023', 'CCS');

...
```

### Actualización de Stock

Para actualizar el stock de un producto, debes instanciar la clase `UpdateStockProduct` y pasarle como parámetro el código del producto, el almacen y la cantidad a actualizar usando el metodo `updateStockProduct()`.

```php
require 'app/index.php';

use Warehouse\Application\UpdateStockProduct;

...

$updateStockProduct = new UpdateStockProduct();
$updateStockProduct->token = "Bearer $token";
$result = $updateStockProduct->updateStockProduct('3003023', 'CCS', 45);

...
```