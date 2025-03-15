<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TwoFactorAuthController;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/', [HomeController::class, 'welcome'])->name('property.search');
Route::get('/search', [HomeController::class, 'allView'])->name('property.searchAll');
Route::get('/services/all-view', [HomeController::class, 'allView'])->name('services.all-view');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
 
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route pour la soumission du formulaire de connexion avec la validation
Route::post('/login', function (Request $request) {
    // Validation des données du formulaire
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Tentative de connexion de l'utilisateur
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        // Authentification réussie, redirection vers le tableau de bord
        return redirect()->intended('/');
    } else {
        // Authentification échouée, redirection vers la page de connexion avec un message d'erreur
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->withInput();
    }
})->name('login');



Route::get('/lands/image/{fileName}', function ($fileName) {
    $path = 'images/' . $fileName;

    if (Storage::disk('public')->exists($path)) {
        $file = Storage::disk('public')->get($path);
        $type = Storage::disk('public')->mimeType($path);

        return response($file, 200)->header("Content-Type", $type);
    }

    return abort(404);
})->name('land.image');

Route::post('/save-location', [LocationController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('send-two-factor-code', [TwoFactorAuthController::class, 'sendTwoFactorCode'])->name('send-two-factor-code');
    Route::get('two-factor-challenge', [TwoFactorAuthController::class, 'showTwoFactorForm'])->name('two-factor.login');
    Route::post('two-factor-challenge', [TwoFactorAuthController::class, 'verifyTwoFactorCode'])->name('two-factor.verify');
});


Route::resource('agency', AgencyController::class)->except(['show']);
        Route::get('/auth/register-type', [AgencyController::class, 'registerType'])->name('auth.register-type');
        Route::get('/auth/agency-create', [AgencyController::class, 'create'])->name('auth.agency-create');


Route::get('/api/countries', [LocationController::class, 'getCountries']);
Route::get('/api/cities/{countryCode}', [LocationController::class, 'getCities']);


Route::middleware(['auth'])->group(function () {
    
    Route::post('/send-message-to-agent', [ContactController::class, 'sendMessageToAgent'])->name('sendMessageToAgent');
    Route::post('/send-message-to-platform', [ContactController::class, 'sendMessageToPlatform'])->name('sendMessageToPlatform');
    
    Route::get('/subscriptions/{type}/{id}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/api/check-boost-status', [SubscriptionController::class, 'checkBoostStatus']);
    Route::get('/boosted-items', [SubscriptionController::class, 'showBoostedItems'])->name('boosted.items');

    Route::get('/notifications/{id}/redirect', [NotificationController::class, 'markAsReadAndRedirect'])->name('notifications.redirect');

    Route::resource('room', RoomController::class)->except(['show']);

            // Route::get('/houses/{house}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
            Route::get('/rooms/form', [RoomController::class, 'create'])->name('rooms.form');

            // Route::post('/houses/{house}/rooms', [RoomController::class, 'store'])->name('rooms.store');
            Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
            Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
            Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
            Route::get('/services/all-view-rooms', [RoomController::class, 'index'])->name('services.all-view-rooms');



Route::get('services/buy', [PaymentController::class ,'showBuyForm'])->name('services.buy')->middleware('auth');
Route::get('services/rent', [PaymentController::class,'showRentForm'])->name('services.rent')->middleware('auth');
Route::post('/process-purchase', [PaymentController::class,'processPurchase'])->name('process.purchase')->middleware('auth');
Route::post('/process-rent', [PaymentController::class ,'processRent'])->name('process.rent')->middleware('auth');
Route::post('/payment', [PaymentController::class, 'handlePayment'])->name('payment.handle')->middleware('auth');


Route::resource('service', ServiceController::class)->except(['show']);
    Route::get('services/mon-service', [ServiceController::class, 'monService'])->name('services.mon-service')->middleware('auth');
    // Route::put('/services/update-availability', [ServiceController::class, 'updateAvailability'])->name('services.updateAvailability');
    

Route::resource('lands', LandController::class)->except(['show']);
        Route::get('lands/land-add', [LandController::class, 'create'])->name('lands.land-add')->middleware('auth');
        Route::post('lands/land-add', [LandController::class, 'store'])->name('lands.land-add')->middleware('auth');
        Route::get('/land/{land}', [LandController::class, 'showLand'])->name('land.detail-land');
        Route::get('/services/all-view-lands', [LandController::class, 'index'])->name('services.all-view-lands');
        Route::delete('land/{land}/destroy', [LandController::class, 'destroy'])->name('land.destroy');
        Route::put('land/{land}/update-availability', [LandController::class, 'updateAvailability'])->name('land.update-availability');


Route::resource('apartments', ApartmentController::class)->except(['show']);
        Route::get('apartments/form', [ApartmentController::class, 'create'])->name('apartments.form')->middleware('auth');
        Route::get('/apartment/{apartment}', [ApartmentController::class, 'showapartment'])->name('apartment.detail-apartment');
        Route::get('/services/all-view-apartments', [ApartmentController::class, 'index'])->name('services.all-view-apartments');

 });
// Route::resource('houses', HouseController::class)->except(['show']);

Route::resource('agents', AgentController::class)->except(['show']);
        Route::get('/auth/agent-create', [AgentController::class, 'agentCreate'])->name('auth.agent-create');
        Route::get('/auth/profil-complet', [AgentController::class, 'create'])->name('auth.profil-complet')->middleware('auth');
        Route::get('/user/{user}', [AgentController::class, 'profilAgent'])->name('user.agent-profil-view');



Route::post('/admin/approve/{user}', [AdminController::class, 'approve'])->name('admin.approve')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

 Route::resource('property', PropertyController::class)->except(['show']);


        Route::get('get-cities/{country}', [PropertyController::class, 'getCities']);
        Route::get('/fetch-cities/{query}', [PropertyController::class, 'fetchCities']);

        Route::get('/properties/{property}/fichier/{type}', [PropertyController::class, 'accederFichiers'])->name('admin.property.accederFichiers')->middleware('auth');
        Route::get('properties/form', [PropertyController::class, 'create'])->name('properties.form')->middleware('auth');
        Route::get('property/{property}', [PropertyController::class, 'showDetails'])->name('property.details-properties');
        Route::get('/services/all-view-properties', [PropertyController::class, 'index'])->name('services.all-view-properties');

        Route::post('property/{property}/', [PropertyController::class, 'statutProperty'])->name('property.statutProperty');
        Route::delete('property/{property}/destroy', [PropertyController::class, 'destroy'])->name('property.destroy');
        Route::post('property/{property}/affecterService', [PropertyController::class, 'affecterService'])->name('property.affecter-Service');
        Route::put('property/{property}/update-availability', [PropertyController::class, 'updateAvailability'])->name('property.update-availability');
        Route::post('property/{property}/approuver', [PropertyController::class, 'approuver'])->name('property.approuver');
        Route::post('property/{property}/rejeter', [PropertyController::class, 'rejeter'])->name('property.rejeter');
        Route::get('/filter', [PropertyController::class, 'filter']);

   