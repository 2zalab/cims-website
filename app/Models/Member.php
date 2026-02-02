<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Liste des fonctions disponibles
    public const FONCTIONS = [
        'president' => 'Président',
        'vice_president' => 'Vice-Président',
        'tresorier' => 'Trésorier',
        'vice_tresorier' => 'Vice-Trésorier',
        'secretaire_general' => 'Secrétaire Général',
        'vice_secretaire' => 'Vice-Secrétaire',
        'censeur' => 'Censeur',
        'vice_censeur' => 'Vice-Censeur',
        'commissaire_compte' => 'Commissaire aux Comptes',
        'conseiller' => 'Conseiller',
        'membre' => 'Membre',
        'benevole' => 'Bénévole',
        'volontaire' => 'Volontaire',
    ];

    // Fonctions du bureau exécutif (exclut membre, bénévole, volontaire)
    public const FONCTIONS_BUREAU = [
        'president',
        'vice_president',
        'tresorier',
        'vice_tresorier',
        'secretaire_general',
        'vice_secretaire',
        'censeur',
        'vice_censeur',
        'commissaire_compte',
        'conseiller',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'fonction',
        'photo',
        'email',
        'phone',
        'speciality',
        'bio',
        'village',
        'arrondissement',
        'address',
        'linkedin',
        'facebook',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Obtenir le libellé de la fonction
     */
    public function getFonctionLabelAttribute()
    {
        return self::FONCTIONS[$this->fonction] ?? $this->fonction;
    }

    /**
     * Vérifier si le membre fait partie du bureau exécutif
     */
    public function isBureauExecutif()
    {
        return in_array($this->fonction, self::FONCTIONS_BUREAU);
    }

    /**
     * Scope pour récupérer les membres du bureau exécutif
     */
    public function scopeBureauExecutif($query)
    {
        return $query->whereIn('fonction', self::FONCTIONS_BUREAU)
                     ->where('is_active', true)
                     ->orderBy('order');
    }

    /**
     * Scope pour récupérer le président
     */
    public function scopePresident($query)
    {
        return $query->where('fonction', 'president')
                     ->where('is_active', true);
    }
}
