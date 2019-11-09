# PHP Developer assignment

## Task

Your task is to create a PHP application that is a feeds reader. The app can read feed from multiple sources and store them to database. Sample feeds http://www.feedforall.com/sample-feeds.htm.

## Requirements
- As a developer, I want to run a command which help me to setup database easily with one run.
- As a developer, I want to run a command which accepts the feed urls (separated by comma) as argument to grab items from given urls. Duplicate items are accepted.
- As a developer, I want to see output of the command not only in shell but also in pre-defined log file. The log file should be defined as a parameter of the application.
- As a user, I want to see the list of items which were grabbed by running the command line above, via web-based. I also should see the pagination if there are more than one page. The page size is a configurable value.
- As a user, I want to filter items by category name on list of items.
- As a user, I want to create new item manually via a form.
- As a user, I want to update/delete an item

## How to do
1. Fork this repository
2. Start coding. The application must be developed by using a PHP framework and follow coding standard of that framework. Using Symfony or Laravel is a plus.
3. Use git flow to manage branches on your repository
4. Open a pull request to `master` branch after done.
5. The implementation should covered by Unit Test or Functional Test.

## Complete
- To Set Up environment using: docker-composer up -d
- To Set Up Database: run command:
        `
            php artisan migrate
        `
- To Get Feed From urls using command:
    `
        php artisan getfeed "urls_list" --log 
        ex: php artisan getfeed "https://www.feedforall.com/sample.xml,https://www.feedforall.com/sample-feed.xml" --log
    `
    with param --log to using logfile with define on .env [LOG_FILE_URL]
- To Get All Feeds On Database using command:
    `
        php artisan getallfeed --log
    `
    with param --log to save data in file log with define on .env [LOG_FILE_URL]
- To See List Feed on Website: 
    Go to link: http://localhost:8080/feeds
    With pagination config on file .env [PAGINATION_NUMBER]
    With All Button: Edit for update feed, Delete To delete feed
- To Create New Feed go to link:
    http://localhost:8080/feeds/create   