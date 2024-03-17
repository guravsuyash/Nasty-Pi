mv dbbackup.sql init.sql
docker build . -f DockerMysql -t dynamic-mysql
docker build . -f Dockerfile -t dynamic