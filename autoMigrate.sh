#!/bin/bash

# Display status
php artisan migrate:status

# Count migrations before git pull
migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsBefore=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrations;

git pull 

# Count migrations before git pull
migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsAfter=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrationsAfter;

difference=$(( $countMigrationsBefore - $countMigrationsAfter ))
echo "Difference: "$difference

# Detect rollback
if [ $difference < 0 ]; then
    echo "php artisan migrate:rollback --step="$difference;
    php artisan migrate:rollback --step=$difference
    # Migrate to safety
    php artisan migrate
fi
