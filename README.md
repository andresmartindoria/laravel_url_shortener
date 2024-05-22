# laravel_url_shortener
Tech Challange Spot2

Crear el proyecto y levantar el servidor
composer create-project laravel/laravel laravel-url-shortener
cd laravel-url-shortener
php artisan serve

Conectarse a la base de datos configurando el archivo .env

Ejecutar la migracion de la base de datos, que crea 9 tablas por defecto para el sistema de laravel
php artisan migrate

Ejecutar el siguiente Comando para crear el model, controller y migration para el manejo de la url short
php artisan make:model -mrc Url

Edit the migration file.
Open the folder database/migrations/<timestamp>_create_urls_table.php then edit like this, and after editing execute the migration with the command :php artisan migrate
  Schema::create('urls', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
  });
Editar por
  Schema::create('urls', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('original_url');
      $table->string('shortener_url');
      $table->timestamps();
  });
(En caso de no migrar los nuevos campos, se pueden ejucutar los siguientes comandos para que impacten los cambios, bajar la migracion y volver a subirla
php artisan migrate:reset
php artisan migrate

Edit File Models.
Open the file model in the folder app/Models/Url.php y agregar las siguiente líneas
  protected $fillable = [
    'title', 'original_url', 'shortener_url'
  ];

Add Routing for URL shortener feature.
We will also need to create URLs for our controller. We can do this by adding “routes”, which are managed in the routes directory of your project.
// route for get shortener url
Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

Edit UrlController.php.
Open the UrlController.php file in the app/Http/Controllers/UrlController.php folder, 7 main functions have been created in the controller, namely: index, create, store, edit, update, and destroy.
