# Excel Bulk Uploader

By using this project, the user can mass/bulk upload Employee details of all types: simple, configurable, grouped, bundle, downloadable.

It packs in lots of demanding features that allows your business to scale in no time:

- Employee details can be upload by XLS files.
- Data profile creation feature for admin.
- Each attribute has a different column.
- 
- If there is any error in the XLS file, then employee details will not be uploaded and hence user/admin will come to know about the error.

## Requirements:

- **Laravel**: v10.0.2
- **PHP**: v8.1 and above
## Installation with git :
- Run the following command
```
git clone https://github.com/Awes-Khan/ExcelBulkUpload.git
```


- Run these commands below to complete the setup
```
composer install
composer dump-autoload
```

```
php artisan migrate
php artisan route:cache
php artisan config:cache
php artisan serve
```
```
npm install
npm run dev
```

## Installation with zip

- Unzip the respective downloaded zip using below command

```
unzip ExcelBulkUpload-main.zip -d ExcelBulkUpload
```

- Run these commands below to complete the setup

```
composer install
composer dump-autoload
```
```
php artisan migrate
php artisan route:cache
php artisan config:cache
php artisan serve
```
```
npm install
npm run dev
```

> That's it, now just browse to [localhost](http://127.0.0.1:8000/) the project on your local Machine.