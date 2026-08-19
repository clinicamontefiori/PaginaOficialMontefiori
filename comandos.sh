# no realizar se puede eliminar BD
docker compose down -v #y tambien rm -rf src/

docker compose down
docker compose up -d --build

docker ps
docker inspect app_mysql --format='{{json .State.Health}}'
docker logs app_mysql

# para iniciar con todo lo que se tiene ya
docker compose down -v
docker compose up -d

# mysql
docker exec -it app_mysql mysql -u root -p