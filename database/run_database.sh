docker-compose up --build -d ; \
sleep 20 ; \
docker exec -i mysql mysql -uroot -ppassword rei_do_ovo < schema.sql