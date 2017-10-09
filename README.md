## ft_minishop

This is a toy PHP application for learning. It was a two-day project that we started saturday morning and finished Sunday around midnight.

##### Tools:
* Docker, docker-machine, docker-compose, Alpine Linux
* PostgreSQL, PHP 5.6, shell scripts

##### Requirements:

* Data management
* User management
* A cart
* Product categories
* A landing page
* Administrative section
* Not allowed to use PDO

##### Authors:

[Erik](https://github.com/ertw) & [Terri](https://github.com/xterri)

## Development setup
Make sure you have the requisite programs:

`brew install docker docker-machine docker-compose fswatch`

Clone the repo:

`git clone`

Initialize the docker machine:

`source init.sh`

Run the database, php, and adminer containers:

`./run.sh`

Watch the directory for changes to automatically update the site:

`fswatch -o app | xargs -n1 -I{} ./update.sh &`
