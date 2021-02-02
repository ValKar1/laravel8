#!/bin/bash

# Display status
php artisan migrate:status

# Count migrations before git pull
migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsBefore=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`

### Create artifact
### Copy artifacts (rsync database/migrations/ database/artifact_migrations/)

git pull 

# Count migrations after git pull
migrationsStatus=$(php artisan migrate:status)
ran="| Yes  |";
countMigrationsAfter=`grep -o "$Ran" <<< "$migrationsStatus" | wc -l`

# Get difference
difference=$(( $countMigrationsBefore - $countMigrationsAfter ))
echo "migrationsBefore - migrationsAfter = difference"
echo $countMigrationsBefore" - "$countMigrationsAfter" = "$difference

# Detect rollback
if [ $difference < 0 ]; then

    ### Copy artifact in migrations: (rsync database/artifact_migrations/ database/migrations/)
    echo "php artisan migrate:rollback --step="${difference#-}
    php artisan migrate:rollback --step=$difference
    # Migrate to safety
    php artisan migrate

    ### Delete changes from database/migrations/: (git reset --hard)
fi
