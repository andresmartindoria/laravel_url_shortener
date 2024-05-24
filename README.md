# laravel_url_shortener
Tech Challange Spot2

Crear el proyecto y levantar el servidor
```
composer create-project laravel/laravel laravel-url-shortener
cd laravel-url-shortener
php artisan serve
```

Conectarse a la base de datos configurando el archivo .env

Ejecutar la migracion de la base de datos, que crea 9 tablas por defecto para el sistema de laravel
```sh
php artisan migrate
```

Ejecutar el siguiente Comando para crear el model, controller y migration para el manejo de la url short
```sh
php artisan make:model -mrc Url
```

Edit the migration file.
Open the folder database/migrations/<timestamp>_create_urls_table.php then edit like this, and after editing execute the migration with the command :php artisan migrate
```
  Schema::create('urls', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
  });
```
Editar por
```
  Schema::create('urls', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('original_url');
      $table->string('shortener_url');
      $table->timestamps();
  });
```
(En caso de no migrar los nuevos campos, se pueden ejucutar los siguientes comandos para que impacten los cambios, bajar la migracion y volver a subirla
```sh
php artisan migrate:reset
php artisan migrate
```

Editar Archivo Models.
Abrir el archivo model de la carpeta app/Models/Url.php y agregar las siguiente líneas
```sh
  protected $fillable = [
    'title', 'original_url', 'shortener_url'
  ];
```

Agregar función de enrutamiento para short de URL.
También necesitaremos crear URL para nuestro controlador. Podemos hacer esto agregando “rutas”, que se administran en el directorio de rutas de su proyecto.
```sh
// route for get shortener url
Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');
```

Editar UrlController.php.
Abrir el archivo UrlController.php en app/Http/Controllers/UrlController.php, 7 funciones principales fueron creadas en el controlador, namely: index, create, store, edit, update, and destroy.

Pruebas en PHPUnit
El comando para generar nuevas pruebas es:
```sh
php artisan make:test UrlTest
```
Esto crea un archivo en tests/Unit/UrlTest.php. Editarlo para configurar la prueba
```sh
use RefreshDatabase;
/**
 * A basic unit test example.
 */
public function test_create_url(): void
{
    $this->get('/urls')->assertStatus(200);

    // Simulate a user creating a new post through the web interface
    $response = $this->post('url.store', [
        'title' => 'Primera URL',
        'original_url' => 'https://spot2.mx/buscar'
    ]);
}
```

Para correr las pruebas ejecutar
```sh
php artisan test
```

Si todo está bien, deberian ver el siguiente resultado
```sh
PASS  Tests\Unit\UrlTest
✓ create url
```

Crear para el frontend un nuevo proyecto con React
```sh
npx create-react-app my-project
cd my-project
```

Agregar el framwork Tailwindcss para el manejo de estilos
```sh
npm install -D tailwindcss
npx tailwindcss init
```

Configure your template paths
Add the paths to all of your template files in your tailwind.config.js file.
```sh
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Add the Tailwind directives to your CSS
Add the @tailwind directives for each of Tailwind’s layers to your ./src/index.css file.
```sh
@tailwind base;
@tailwind components;
@tailwind utilities;
```

Ver el proyecto en el navegador
```sh
npm run start
```

Editar el Archivo App.js para agregar toda la funcionlidad que se conecta con el backend

Los endpoints del backend, se encuentran bajo las url
```sh
http://127.0.0.1:8000/urls
```
