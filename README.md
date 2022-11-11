# Consulta de Stock de Productos a Profit 2k8

### Instalación

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
