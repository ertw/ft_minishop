# copy the site data to host
docker-machine --storage-path /tmp/docker scp ./app/* my-docker-machine:/home/docker/ft_minishop
# initialize or update the stack
docker stack deploy -c stack.yml ft_minishop
# print out url
site_ip=$(docker-machine --storage-path /tmp/docker ip my-docker-machine)
RED="\e[0;31m"
GREEN="\e[0;32m"
RESET="\e[0m"
printf "%s\n$GREEN http://%s:8088 $RESET\n" "Site running on URL:" $site_ip
