# set up the docker-machine
docker-machine --storage-path /tmp/docker create --driver virtualbox my-docker-machine
# set up the environment
eval $(docker-machine -s /tmp/docker env my-docker-machine)
# make swarm
docker-machine --storage-path /tmp/docker ssh my-docker-machine \
	"docker swarm init --advertise-addr \
	$(docker-machine --storage-path /tmp/docker ip my-docker-machine):2377"
# initialize the stack
docker stack deploy -c stack.yml ft_minishop
