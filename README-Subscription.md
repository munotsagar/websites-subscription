php artisan make:migration create_websites_table

php artisan make:seeder WebsitesSeeder

php artisan make:seeder UserSeeder

php artisan make:factory WebsitesFactory

php artisan make:factory UserFactory

php artisan make:model Websites

php artisan db:seed --class=WebsitesSeeder

php artisan db:seed --class=UserSeeder

php artisan migrate

php artisan migrate:fresh --seed


php artisan make:migration create_subscription_table


php artisan make:model Subscription


php artisan make:migration create_posts_table

php artisan migrate

composer create-project laravel/laravel subscribe

APIs

1 Subscription Api user to website

php artisan make:controller SubscriptionController

2 add post tital, description, user_id, website_id

php artisan make:controller PostsController

php artisan make:model Posts

3 email Jobs

php artisan queue:table
php artisan migrate

php artisan make:job EmailPosts

