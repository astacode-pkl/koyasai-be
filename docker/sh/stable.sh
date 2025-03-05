export APP_PORT=${STABLE_APP_PORT}
export PUBLIC_IP=${stable_public_ip}
export DB_DATABASE=${DB_DATABASE_STABLE}
export DB_USERNAME=root
export DB_PASSWORD=${DB_PASSWORD}

docker-compose down
docker-compose up -d app_stable webserver_stable mysql_stable
echo "Verifying deployment..."
docker-compose ps

# Check app health
echo "Checking laravel_application health..."
curl -sS http://${PUBLIC_IP}:${APP_PORT} || echo "Warning: Application not running"