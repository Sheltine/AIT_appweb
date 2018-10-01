docker stop sti_project
docker rm sti_project
docker run -ti -v /home/nyahon/Documents/HEIG/HEIG-S5/STI/projet/site:/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018
docker exec -u root sti_project service nginx start
docker exec -u root sti_project service php5-fpm start
