# Site Web CIMS - Cercle des Ingénieurs de Mayo-Sava

Site web officiel de l'association CIMS (Cercle des Ingénieurs de Mayo-Sava), développé avec Laravel.

**Devise:** Unité - Solidarité - Développement

## 📋 Fonctionnalités

### Partie Publique
- **Page d'accueil** : Présentation de l'association avec les dernières activités et actualités
- **À Propos** : Historique, vision, mission, objectifs et domaines d'intervention
- **Activités** : Liste et détails des activités de l'association
- **Actualités** : Dernières nouvelles et annonces
- **Galerie** : Photos des activités et événements
- **Contact** : Formulaire de contact avec validation

### Back-Office Admin
- **Dashboard** : Vue d'ensemble avec statistiques
- **Gestion des Activités** : Création, modification, suppression (CRUD complet)
- **Gestion des Actualités** : CRUD complet avec images
- **Gestion de la Galerie** : Upload et gestion des photos
- **Messages de Contact** : Consultation des messages reçus
- **Authentification sécurisée** : Laravel Breeze

## 🚀 Installation

### Prérequis
- PHP >= 8.2
- Composer
- MySQL >= 5.7 ou MariaDB
- Node.js & NPM

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone <url-du-repo>
cd cims-website
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Installer les dépendances JavaScript**
```bash
npm install
npm run build
```

4. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurer la base de données**
Éditer le fichier `.env` et configurer la connexion à votre base de données :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cims_website
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

6. **Créer la base de données**
```sql
CREATE DATABASE cims_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

7. **Exécuter les migrations**
```bash
php artisan migrate
```

8. **Créer le lien symbolique pour le stockage**
```bash
php artisan storage:link
```

9. **Créer un utilisateur administrateur**
```bash
php artisan tinker
```
Puis dans le shell Tinker :
```php
\App\Models\User::create([
    'name' => 'Admin CIMS',
    'email' => 'admin@cims.cm',
    'password' => bcrypt('password123')
]);
exit
```

10. **Lancer le serveur de développement**
```bash
php artisan serve
```

Le site sera accessible à l'adresse : http://localhost:8000

## 🔑 Accès Administration

- URL : http://localhost:8000/login
- Email : admin@cims.cm
- Mot de passe : password123

**⚠️ Important :** Changez le mot de passe par défaut après la première connexion !

## 📁 Structure du Projet

```
cims-website/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Contrôleurs admin
│   │   └── ...                 # Contrôleurs publics
│   └── Models/                 # Modèles Eloquent
├── database/
│   └── migrations/             # Migrations de la base de données
├── public/
│   └── storage/                # Stockage public (images, etc.)
├── resources/
│   └── views/
│       ├── admin/              # Vues administration
│       ├── activities/         # Vues activités
│       ├── news/               # Vues actualités
│       ├── gallery/            # Vues galerie
│       ├── contact/            # Vues contact
│       └── layouts/            # Templates
└── routes/
    └── web.php                 # Routes de l'application
```

## 🎨 Technologies Utilisées

- **Backend** : Laravel 12
- **Authentification** : Laravel Breeze
- **Frontend** : Bootstrap 5
- **Icons** : Font Awesome 6
- **Base de données** : MySQL/MariaDB

## 📝 Utilisation

### Gestion du Contenu

1. **Connexion** : Accédez à `/login` et connectez-vous avec vos identifiants admin
2. **Dashboard** : Vue d'ensemble de toutes les données
3. **Créer une activité** : Admin > Activités > Nouvelle Activité
4. **Publier une actualité** : Admin > Actualités > Nouvelle Actualité
5. **Ajouter des photos** : Admin > Galerie > Ajouter une Image

### Upload d'Images

Les images sont automatiquement stockées dans `storage/app/public/`. Assurez-vous que :
- Le lien symbolique est créé (`php artisan storage:link`)
- Les permissions sont correctes sur le dossier `storage/`

## 🔒 Sécurité

- Protection CSRF activée sur tous les formulaires
- Validation des données côté serveur
- Authentification requise pour l'accès admin
- Upload de fichiers sécurisé avec validation

## 🌐 Déploiement en Production

1. **Configurer l'environnement de production**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com
```

2. **Optimiser l'application**
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

3. **Configurer les permissions**
```bash
chmod -R 755 storage bootstrap/cache
```

4. **Configurer le serveur web** (Apache/Nginx) pour pointer vers le dossier `public/`

## 📧 Contact

Pour toute question ou assistance :
- Email : contact@mit.cm
- Téléphone : +237 691 805 321 / +237 672 277 579
- Développé par : [Maroua Innovation Technology (MIT)](https://mit.cm)

## 📄 Licence

© 2024 CIMS - Cercle des Ingénieurs de Mayo-Sava. Tous droits réservés.

---

**Développé avec ❤️ par Maroua Innovation Technology**
