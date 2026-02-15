<?php



use App\Models\Commune;
use App\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
///  return view('welcome');
//});

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index'); // Accueil
    Route::get('/frontend.login', 'loginForm')->name('frontend.login');
    Route::post('/frontend.login', 'loginSubmit')->name('login.submit');
    Route::get('/frontend.logout', 'logout')->name('frontend.logout');

    // Register
    Route::get('/frontend.register', 'registerForm')->name('frontend.register');
    Route::post('/frontend.register', 'registerSubmit')->name('register.submit');
});
Route::get('/communes/by-departement/{id}', function ($id) {
    return response()->json(
        Commune::where('departement_id', $id)
            ->orderBy('nom')
            ->get()
    );
})->name('communes.byDepartement');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Afficher le formulaire
Route::get('/recrutement', [App\Http\Controllers\Frontend\FrontendController::class, 'recrutementForm'])
    ->name('frontend.recrutementForm');

// Soumettre le formulaire
Route::post('/recrutement', [App\Http\Controllers\Frontend\FrontendController::class, 'recrutementSubmit'])
    ->name('frontend.recrutementSubmit');


Route::get('/recrutement/merci/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'recrutementMerci'])
    ->name('recrutement.merci');


Route::group([
    "middleware" => ["auth", "auth.administrateur"],
    'as' => 'administrateur.'
], function () {
    // Dashboard Admin
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group([
        "prefix" => "gestutilisateurs",
        "as" => "gestutilisateurs."
    ], function () {
        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");
        // Route::get('/rolesetpermition', [App\Http\Controllers\UserController::class, 'index'])->name('rolespermissions.index');
    });

    Route::group([
        "prefix" => "gestparametres",
        'as' => 'gestparametres.'
    ], function () {
        Route::get('/', [App\Http\Controllers\ParametreController::class, 'index'])->name('parametres.index');
        Route::post('parametres', [App\Http\Controllers\ParametreController::class, 'store'])->name('parametres.store');
    });



    
});



Route::group([
    "middleware" => ["auth", "auth.employer"],
    'as' => 'employer.'
], function () {

    
     Route::group([
        "prefix" => "gestinscriptions",
     'as' => 'gestinscriptions.'
    ], function () {
        
Route::get('/', [App\Http\Controllers\InscriptionController::class, 'index'])->name('inscriptions.index');
        Route::get('/create', [App\Http\Controllers\InscriptionController::class, 'create'])->name('inscriptions.create');
        Route::post('/store', [App\Http\Controllers\InscriptionController::class, 'store'])->name('inscriptions.store');
        Route::get('/{inscription}/edit', [App\Http\Controllers\InscriptionController::class, 'edit'])->name('inscriptions.edit');
        Route::put('/{inscription}', [App\Http\Controllers\InscriptionController::class, 'update'])->name('inscriptions.update');
        Route::delete('/{inscription}', [App\Http\Controllers\InscriptionController::class, 'destroy'])->name('inscriptions.destroy');

        Route::post('/inscriptions/{id}/accepter', [App\Http\Controllers\InscriptionController::class, 'accepter'])->name('inscriptions.accepter');
        Route::post('/inscriptions/{id}/refuser', [App\Http\Controllers\InscriptionController::class, 'refuser'])->name('inscriptions.refuser');

        Route::get('/inscriptions/pdf-alpha', [App\Http\Controllers\InscriptionController::class, 'pdfAcceptesAlpha'])
            ->name('inscriptions.pdfAlpha');

        Route::get('/inscriptions/pdf-departement', [App\Http\Controllers\InscriptionController::class, 'pdfAcceptesDepartement'])
            ->name('inscriptions.pdfDepartement');

        Route::get('/inscriptions/pdf-commune', [App\Http\Controllers\InscriptionController::class, 'pdfAcceptesCommune'])
            ->name('inscriptions.pdfCommune');
// 👇 AJOUTE CETTE ROUTE ICI
        Route::get('/pdf/specialite/{id}', 
            [App\Http\Controllers\InscriptionController::class, 'pdfAcceptesSpecialite']
        )->name('inscriptions.pdfSpecialite');
        
    });

    Route::group([
        "prefix" => "gestspecialites",
        'as' => 'gestspecialites.'
    ], function () {
      Route::get('/', [App\Http\Controllers\SpecialiteController::class, 'index'])->name('specialites.index');
        Route::get('/create', [App\Http\Controllers\SpecialiteController::class, 'create'])->name('specialites.create');
        Route::post('/store', [App\Http\Controllers\SpecialiteController::class, 'store'])->name('specialites.store');
        Route::get('/{specialite}/edit', [App\Http\Controllers\SpecialiteController::class, 'edit'])->name('specialites.edit');
        Route::put('/{specialite}', [App\Http\Controllers\SpecialiteController::class, 'update'])->name('specialites.update');
        Route::delete('/{specialite}', [App\Http\Controllers\SpecialiteController::class, 'destroy'])->name('specialites.destroy');

        Route::post('/{specialite}/toggle-statut', [App\Http\Controllers\SpecialiteController::class, 'toggleStatut'])
            ->name('specialites.toggleStatut'); 

    });
    


});

































































































