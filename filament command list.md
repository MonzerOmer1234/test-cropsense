### Adding Relations
php artisan make:filament-relation-manager FarmResource sensors type
### Adding View To Exist
php artisan make:filament-page ViewUser --resource=UserResource --type=ViewRecord
### Create Resource including View 
php artisan make:filament-resource User --view



php artisan make:filament-resource Sensors/Tds --view 
php artisan make:filament-resource Sensors/Light --view 
php artisan make:filament-resource Sensors/Temperature --view 
php artisan make:filament-resource Sensors/SoilMoisture --view 
php artisan make:filament-resource Sensors/Humidity --view





php artisan make:filament-relation-manager FarmResource tdsSensors type


tdsSensors
lightSensors
temepratureSensors
moistureSensors
humiditySensors


php artisan make:filament-relation-manager TaskResource worker name

php artisan make:filament-relation-manager WorkerResource tasks name



php artisan make:filament-widget LightChart --chart
php artisan make:filament-widget TdsChart --chart
php artisan make:filament-widget TempChart --chart
php artisan make:filament-widget MoistureChart --chart
php artisan make:filament-widget HumidityChart --chart


php artisan make:filament-widget FarmOverView --resource=FarmResource
