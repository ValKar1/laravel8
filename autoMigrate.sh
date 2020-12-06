#!/bin/bash

# Display status
php artisan migrate:status

ran="| Yes  |";

# Count migrations before git pull
migrationsStatus=$(php artisan migrate:status)
countMigrationsBefore=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrations;

git pull 

# Count migrations after git pull
migrationsStatus=$(php artisan migrate:status)
countMigrationsAfter=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`
echo "Ran migrations: "$countMigrationsAfter;

# Get difference
difference=$(( $countMigrationsBefore - $countMigrationsAfter ))
echo "Difference: "$difference

# Detect rollback
if [ $difference < 0 ]; then
    echo "php artisan migrate:rollback --step="$difference;
    php artisan migrate:rollback --step=$difference
    # Migrate to safety
    php artisan migrate
fi
