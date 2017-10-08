# copy the site data to host
sh ./update.sh
# print out url
site_ip=$(docker-machine --storage-path /tmp/docker ip my-docker-machine)
RED="\e[0;31m"
GREEN="\e[0;32m"
RESET="\e[0m"
printf "%s\n$GREEN http://%s:8088 $RESET\n" "Site running on URL:" $site_ip
# initialize or update the stack
docker-compose up --build
