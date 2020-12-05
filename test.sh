#!/bin/bash
php artisan migrate:status
migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsBefore=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrations;

git pull 

migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsAfter=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrationsAfter;

difference=$(( $countMigrationsBefore - $countMigrationsAfter ))
echo "Difference: "$difference

if [ $difference < 0 ]; then
    echo "php artisan migrate:rollback --step="$difference;
    php artisan migrate:rollback --step=$difference
fi
