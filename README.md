## ft_minishop

This is a toy PHP application for learning. 

##### Requirements:

* Data management: You need to implement, either your own data management (creation, modification and removal of data) in the format you want (ex: CSV), or using mysql. The data management is a key element to the design of your site.
* User management: You must be able to create and delete a user account. The login to your site is essential before one can validate your basket, however, it can be possible to fill it before being identified. To do that, look at PHP sessions.
* A basket: It must contain the list of products that your client wants to buy, the price and the quantity of each article, as well as the total cost. It must have a validation button to archive the order.
* Categories and associated products: As for any e-commerce website, it requires to be able to organize the products by categories. So, one category can contain multiple products, but one article can belong to multiple categories. It’s up to you to conceptualize your data base before your start.
* A landing page: That page is the showcase of your website, it must be attractive and intuitive so that your clients will want to buy. For that, the page can contain the connection section, the account creation, the basket and a preview of a few articles and categories. The organization of your modules will improve the user experience.
* Administrative section: In this section, we are asking come up with a way to give an exclusive access to some users. Those users will be able to manage the content of your site (add, modify, remove articles, categories and users)..

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

`fswatch app/ ./update.sh`
