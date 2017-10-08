# run this with `source`
# set up the docker-machine
docker-machine --storage-path /tmp/docker create --driver virtualbox my-docker-machine
# set up the environment
eval $(docker-machine -s /tmp/docker env my-docker-machine)
# create the app directory on docker-machine
docker-machine --storage-path /tmp/docker ssh my-docker-machine mkdir /home/docker/ft_minishop
