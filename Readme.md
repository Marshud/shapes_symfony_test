## Shapes Symfony Test
Made for TekJuice Interview
### Instructions to Run
- On the assumption that [PHP](https://www.php.net/) and [Composer](https://getcomposer.org/) are installed and working well
- After cloning the repo, run  ```composer install``` to install all the necessary dependencies
- Then after that run ```php bin/console debug:router``` to see the available routes but mainly two i.e `/cicle/{radius}` and `/triangle/{a}/{b}/{c}`
- Run `symfony server:start` to start the application
- In a different terminal you can run the unit tests using `php bin/phpunit` (But lookout for the URL in the Tests)
- Or if you have docker available Run `docker-compose up --build` and the application should be accessible at http://localhost:8080 or at the appropriate URL at port `8080`