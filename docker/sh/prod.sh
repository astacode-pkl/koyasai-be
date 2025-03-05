export APP_PORT=${PROD_APP_PORT}
export PUBLIC_IP=${prod_public_ip}
export DB_DATABASE=${DB_DATABASE_PROD}
export DB_USERNAME=${DB_USERNAME}
export DB_PASSWORD=${DB_PASSWORD}

docker-compose down
docker-compose up -d app_prod webserver_prod mysql_prod
echo "Verifying deployment..."
docker-compose ps

echo "Checking laravel_application health..."
curl -sS http://${PUBLIC_IP}:${APP_PORT} || echo "Warning: Application not running"