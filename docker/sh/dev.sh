export APP_PORT=${DEV_APP_PORT}
export PUBLIC_IP=${dev_public_ip}
export DB_DATABASE=${DB_DATABASE_DEV}
export DB_USERNAME=root
export DB_PASSWORD=${DB_PASSWORD}

# down the dev container
docker-compose down 
docker-compose up -d app_dev webserver_dev mysql_dev
docker-compose ps

# Check app health
echo "Checking laravel_application health..."
curl -sS http://${PUBLIC_IP}:${APP_PORT} || echo "Warning: Application not running"