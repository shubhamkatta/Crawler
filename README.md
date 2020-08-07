# Crawler
###### A Console Application for crawling website, match the pages against a certain set of keywords, and write the JSON output on a file.
## Project Summary
###### The project is developed in PHP 7.3, and requires command prompt or terminal to run the program. However, the project can be customised and hosted seperately over a linux environment and extra layers to add UI/UX as per anyone's need.
## Project Technical Specification
- **CLI** -> Symfony console component
- **Project Architecture** -> N-tier
- **Design Pattern** -> Repository Pattern
- **Dependency Manager** -> Composer
- **Unit Testing Framework** -> PHPUnit 7.0
## Configuring and running the project
###### The project requires two parameters to execute, i.e, Website and Keywords. The inputs can be provided either by modifying the files mentioned in the Step 2, or by passing the arguments in the command line:
1. Clone the project to your local repository, or you can directly download and unzip it.
2. Modifying the text files (```Sites.txt``` and ```Keywords.txt```) in the project directory.
  - ```Sites.txt```, located under ```Crawler/src/crawler/Websites/Sites.txt``` should contain the name of home page of the domain in the following format
      - Eg. If sitename is ```example.com```, the text should contain ```http://example.com```
  - ```Keywords.txt```, located under ```Crawler/src/crawler/Keywords/Keywords.txt``` should contain 1 keyword in a line.
      - Eg. If there are 5 keywords to be searched, then they should be in separate line:
        - Keyword 1
        - Keyword 2 
        - Keyword 3
        - Keyword N
3. Running the program using the command prompt
  - There are two ways in which this program can be invoked:
    1. Passing parameters with command line
    Eg. ```php crawler.php crawl http://example.com keyword1,keyword2```
    - **php** - ```to run``` the php executable
    - **crawler.php** - ```the main executable file``` which triggers the program
    - **crawl** - ```command name``` to run the crawler command
    - **http://example.com** - ```website home URL``` that has to be crawled
    - ***abc,def,fgi,123*** - ```comma separated keywords``` without any space
    
    2. Using the ```text files``` to provide the input
    Eg. ```php crawler.php crawl```
