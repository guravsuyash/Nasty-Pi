if [ -f dbbackup.sql ]; then
    mv dbbackup.sql init.sql
    echo "File renamed successfully"
else
    echo "dbbackup.sql does not exist!!!"
fi

# Check if .env file exists
if [ -f ".env" ]; then
    # Perform the replacements using sed
    sed -i "s/DB_HOST=.*/DB_HOST='db'/" .env
    sed -i "s/DB_DATABASE=.*/DB_DATABASE='mydb'/" .env
    sed -i "s/DB_USERNAME=.*/DB_USERNAME='admin'/" .env
    sed -i "s/DB_PASSWORD=.*/DB_PASSWORD='admin'/" .env
    echo ".env has been edited."
else
    echo "Warning: .env file not found. Continuing without editing .env."
fi
docker build . -f DockerMysql -t dynamic-mysql
docker build . -f Dockerfile -t dynamic
