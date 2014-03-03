This old CakePHP project was a real learning experience for me; I've included it here to show my progress and how I like to think about things. We needed an online portal for our 600+ agents to be able to log in, purchase insurance, and download commission statements. Additionally we were able to quickly brand and publish sites for favoured agents.

The most interesting files might be:

* the overall [app controller](app_controller.php) which sets up and customizes the app for the particular site or user
* [authenticated file browsing](controllers/agent_commissions_controller.php)
* the [user controller](controllers/users_controller.php) and [model](models/user.php) have some password reset functionality
* my homebrewed CMS functionality: [pages_controller.php](controllers/pages_controller.php)

In retrospect the controllers look pretty fat and the models pretty thin, but it's held up better than I anticipated.

