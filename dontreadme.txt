// commande pour ajouter un utilisateur :) 

php artisan tinker
DB::table('users')->insert(['name'=>'math','email'=>'mathieu1duch@gmail.com','password'=>Hash::make('123456')])

// Route pour login >>> renvoie un token a garder et mettre en cookie 
http://127.0.0.1:8000/oauth/token

// Route vérifier quel utilisateur on est : (on met le Token du cookie pour vérifier notre identité)
http://127.0.0.1:8000/api/user

// Route appel Google: (marche pas encore)
http://127.0.0.1:8000/auth/google

// a mettre dans ton point env. pour te connecter à Railway : 

DB_CONNECTION=mysql
DB_HOST=containers-us-west-155.railway.app
DB_PORT=6400
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=me7LsfVai9zZvLXMqYcr

// A mettre dans ton point env pour te connecter à Google : 
GOOGLE_CLIENT_ID="68592581293-hmr96651ml0o2qo1b4mdmbguhsmvnish.apps.googleusercontent.com"
GOOGLE_CLIENT_SECRET="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"

// Une simplification a été fait pour le Register en venant désactiver le CSRF sur tout le back dans le fichier VerifyCsrfToken
// a modifier du coup 