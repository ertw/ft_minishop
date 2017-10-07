# set up the docker-machine
docker-machine --storage-path /tmp/docker create --driver virtualbox my-docker-machine
# set up the environment
eval $(docker-machine -s /tmp/docker env my-docker-machine)
## make swarm
#docker-machine --storage-path /tmp/docker ssh my-docker-machine \
#	"docker swarm init --advertise-addr \
#	$(docker-machine --storage-path /tmp/docker ip my-docker-machine):2377"
## build the php image
#docker build . --tag minishop
# create the app directory on docker-machine
docker-machine --storage-path /tmp/docker ssh my-docker-machine mkdir /home/docker/ft_minishop
