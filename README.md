# Elsan Food

## Base de données

### Modélisation de la bdd


<img width="706" alt="Capture d’écran 2022-07-17 à 19 21 21" src="https://user-images.githubusercontent.com/72305375/179420972-48363be0-73c7-46ee-bebf-b58cb0760fa6.png">


### Commande bdd

```
php artisan make:model ModelName -m
php artisan migrate | php artisan migrate:refresh
```

### Créer des données de test
Il faut créer des factory qui permettent de simuler des données
```
php artisan make:factory NameFactory --model=NameModel
```
À l'intérieur de la fonction define, il faut simuler les données que la table contient
```
public function definition()
    {
        return [
            'name' => fake()->name,
            'address' => fake()->address,
            'latitude' => fake()->randomFloat(20, 0, 99),
            'longitude' => fake()->randomFloat(20,0, 99),
            'rating' => fake()->randomFloat(2,0,5),
            'photo' => fake()->image,
            'description' => fake()->text,
            'categoryId' => fake()->numberBetween(1,5)
        ];
    }
```

Ensuite on peut créer des seeders qui vont permettrent de créer nos données dans la base de données.
```
php artisan make:seeder NameSeeder
```
À l'intérieur de notre seeder, on peut créer le nombre d'object qu'on veut qui vont être générés grâce à nos factory.
```
Restaurant::factory()->count(10)->create();
```

Avant de générer nos données, il faut ajouter nos seeders au fichier de base DatabaseSeeder.php
```
public function run()
    {
        $this->call([
            CategorySeeder::class,
            RestaurantSeeder::class,
        ]);
    }
```

On peut ensuite générer nos données (il est possible de préciser qu'un seul fichier seeder à la fin de la commande):
```
php artisan db:seed
```

### Créer des commandes 

```
php artisan make:command CommandName
```

### Lier le dossier public du storage au dossier public de l'app.

```
php artisan storage:link
```



