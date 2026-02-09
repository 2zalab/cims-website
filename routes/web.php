<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityPublicController;
use App\Http\Controllers\NewsPublicController;
use App\Http\Controllers\GalleryPublicController;
use App\Http\Controllers\ContactPublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectPublicController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
Route::get('/activites', [ActivityPublicController::class, 'index'])->name('activities.index');
Route::get('/activites/{activity}', [ActivityPublicController::class, 'show'])->name('activities.show');
Route::get('/actualites', [NewsPublicController::class, 'index'])->name('news.index');
Route::get('/actualites/{news}', [NewsPublicController::class, 'show'])->name('news.show');
Route::get('/galerie', [GalleryPublicController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactPublicController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactPublicController::class, 'store'])->name('contact.store');
Route::get('/membres', [MemberController::class, 'index'])->name('members.index');
Route::get('/membres/{member}', [MemberController::class, 'show'])->name('members.show');
Route::get('/projets', [ProjectPublicController::class, 'index'])->name('projects.index');
Route::get('/projets/{project}', [ProjectPublicController::class, 'show'])->name('projects.show');

// Routes d'administration (protégées par authentification)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion des activités
    Route::resource('activities', AdminActivityController::class);

    // Gestion des actualités
    Route::resource('news', AdminNewsController::class);

    // Gestion de la galerie
    Route::resource('galleries', AdminGalleryController::class);

    // Gestion des contacts
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.mark-read');

    // Gestion des partenaires
    Route::resource('partners', AdminPartnerController::class);

    // Gestion des membres
    Route::resource('members', AdminMemberController::class);

    // Gestion des projets
    Route::resource('projects', AdminProjectController::class);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
