#CMI Comment API/Service

#Setup

1. In /comment_api/ create a .env with a DATABASE_URL variable connecting to
a running SQL database.

2. Run from /comment_api/
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console schema:update --force

3. To launch the server, run from /comment_api/
$ symfony server:start

#Usage

Once the application runs on a server, access [url:port]/api to
reach the Swagger UI
Run [url:port]/comment/new to test the bast implementation of the
comment manager service

#Codemap

API was defined using symfony api
Comment Entity is in src/Entity
Comment base service implementation is in src/Service

#Notes

On project structure :
Initially the goal was to have two seperated projects for the 
API and the Front using the API. This is why the folder is such as:
cmi_exercise (expected full app)
->comment_api (strictly API)
->(front project not started)