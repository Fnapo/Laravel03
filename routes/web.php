<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

App::setlocale('es'); // Para avisos en castellano.
// Muestra las consultas SQL ejecutadas.
/*
DB::listen(function ($consulta) {
echo "<pre> $consulta->sql </pre>";
});
 */
/*
$usuario = App\User::find(1);
$usuario->bcifrado = encrypt('12345');
$usuario->password = bcrypt('12345');
$usuario->save();
/*
$usuario = App\User::find(2);
$usuario->bcifrado = encrypt('12345');
$usuario->save();
$usuario = App\User::find(3);
$usuario->bcifrado = encrypt('12345');
$usuario->save();
 */
/*
App\User::create([
'name' => 'Francisco Sola',
'email' => 'fransopo63@gmail.com',
'password' => bcrypt('12345'),
]); // Crea un usuario.
 */
/*
Comentada para usar las rutas creadas propias.
Route::get('/', function () {
return view('welcome');
})->name('inicio');
 */

/*
Existen también routas:
post -> para formularios ...
put ->
patch ->
delete ->

Si queremos pasar parámetros (o variables).
Route::get(/saludo/{nombre}), function($nombre) {

};
 */
/*
Si quiero que se responda a laravel.test/users/ creo la ruta siguiente.

Route::get('/users', function () {
$nombres = ['Jorge', 'Luis', 'Pedro', 'Juan'];
$apellidos = ['Luz Luna']; // Variables PHP.

return view('propia', compact('nombres', 'apellidos')); // Variables HTML.
})->name('usuarios');

Llamada por nombre:
route('usuarios')
 */

// Route::view('/', 'propia', ['nombres' => $nombre]); // No le veo sentido si hay parámetros,
// mejor con un controlador. Puede servir como pequeños test.
// Route::view('/', 'welcome')->name('inicio'); // Así sí.

// Rutas creadas para el tutorial.
Route::view('/', 'home', ['nombre' => 'Paco'])->name('home');
Route::view('/about', 'about')->name('about');
// Route::view('/portafolios', 'portafolio')->name('portafolios'); // ¿Singular o Plural en el nombre del resource?
// Parece que también funciona Route::view('URI', 'viewName'), pero con los parámetros cambiados Route::view('viewName', 'URI'),
// no veo otra explicación para que se active un link en el primer parámetro y no en el segundo. Es una ilusión, no funcina ... la prueba
// al usarlo con home ... 'home', '/' da un error de vista no encontrada.
Route::view('/contacto', 'contacto')->name('contacto');

/*
Usando controladores.
Route::get('/potafolios', 'PortafoliosController')->name('portafolios');
O mejor ...
Route::resource('portafolios', 'PortafoliosController'); // De nuevo ¿Singular o Plural en el nombre del resource?
Parece mejor plural pues utiliza el método index.
Pues crea todas las rutas asociadas al PortafoliosController.
Como de momento sólo utilizo el método index (mostrar todos los proyectos) ...
Al final usaré todos, por eso elimino el ->only('index');
 */
Route::resource('proyectos', 'ProyectoController'); // El nombre del controlador en singular.
Route::middleware(['auth', 'roles'])->group(function () {
    Route::resource('usuarios', 'UserController'); // UserController para refernciar a la clase User de Laravel.
    Route::resource('roles', 'RoleController');
});
/*
Para tratar (validar) el form creo un nuevo controlador. De momento sólo con store.
 */
Route::resource('contacto', 'ContactoController')->only('store');

// Las siguiente rutas son creadas para/por la autentificación.
Auth::routes(['register' => true]);

// Route::get('/home', 'HomeController@index')->name('home'); // Esta se puede ignorar. No es necesario borrar el controller asociado,
// pero sí modificar los controllers login y register con: $redirecTo='/';
// con 'register' => false se impide el acceso a ciertas rutas sin estar autentificado.

/*
Route::get('roles', function(){
return \App\Modelos\Role::with('user')->get();
});
 */
// Ruta de prueba para ver el uso de hasOne y hasMany
// Formato --- Modelo::with('submodelo')->get(); incluso paginate()
// O $modelo->submodelo;

// Para crear una relación muchos a muchos creo dos modelos: Libro y Autor y sus migraciones.
// Y el modelo pivot AutorLibro, aunque no sea necesario.
// php ... make:model Modelos\Libro -m
// php ... make:model Modelos\AutorLibro -mp
// Pequeño test para la relación autor-libro, del tipo muchos a muchos.
// De paso también para la acción group.

Route::middleware(['auth', 'biblio'])->group(function () {
    /*
    // Uso el singular por comodidad. Pero es mejor en plural ... /libros y /autores.
    Route::get('/libro/{id}', function ($id) {
    $libro = \App\Modelos\Libro::findOrFail($id);

    return view('libros/libroShow', compact('libro'));
    });

    Route::get('/autor/{id}', function ($id) {
    $autor = \App\Modelos\Autor::findOrFail($id);

    return view('autores/autorShow', compact('autor'));
    });
     */
    Route::resource('libros', 'LibroController');
    Route::resource('autores', 'AutorController')->parameters(['autores' => 'autor']);
    // Necesario pues de autores ---> autore.
    Route::delete('/autorlibro/{autor}{libro}', 'AutorLibroController@destroy')->name('autorlibro.destroy');
    Route::post('/autorlibro/{autor}{libro}', 'AutorLibroController@store')->name('autorlibro.store');
});

// Test superado.
