result=${PWD##*/}
res=${PWD}
docker kill $(docker ps -q)
docker rm $result
docker run -d -p 80:8000  \
    --name $result \
    -v $res:/app \
cadotinfo/docker-php7.4-apache-yarn-composer-symfony5
