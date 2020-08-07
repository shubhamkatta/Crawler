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
###### The project requires two parameters to execute, i.e, Website and Keywords. The inputs can be provided either by either of the following ways:
1. Modifying the text files (```Sites.txt``` and ```Keywords.txt```) in the project directory.
  - ```Sites.txt``` should contain the name of home page of the domain in the following format
      - Eg. If sitename is ```example.com```, the text should contain ```http://example.com```
  - ```Keywords.txt``` should contain 1 keyword in a line.
      - Eg. If there are 5 keywords to be searched, then they should be like:
        - Keyword 1
        - Keyword 2....
        - Keyword N
1. Clone the project to your local repository, or you can directly download and unzip it.
