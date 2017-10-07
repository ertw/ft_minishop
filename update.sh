# copy the site data to host
docker-machine --storage-path /tmp/docker scp ./app/* my-docker-machine:/home/docker/ft_minishop
