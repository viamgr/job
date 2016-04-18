<?php

class Employment
{

    const LIKE_VALUE = 10;

    private $developer = null;

    private $requirements = [
        'english language',
        'expert in PHP 5.4+',
        'object oriented programming & design patterns',
        'expert in one of relational databases such as mysql',
        'able and eager to learn new technologies',
    ];

    /**
     * this is a list of what our company is interested in a developer
     * @var array
     */
    private $companyInterestList = [
        'Source Control (git is preferred)',
        'Full stack developer (js, html, css)',
        'Yii Framework experience or any modern MVC frameworks',
        'Solid Principles',
        'Test Driven Development',
        'Agile Software Development (scrum is preferred)',
        'NodeJs Experience (Hapi Framework is a plus)',
        'Restful Api experience (know the difference between post, put and patch!)',
        'front-end js frameworks',
        'linux server administration skills',
    ];

    function __construct($person)
    {

        foreach ($this->requirements as $item) {

            if (!in_array($item, $person->skillSet)) {
                throw new Exception('Minimum requirement does not match!', 410);
            }
        }

        $this->developer = $person;
    }

    public function howMuchWeLikeDeveloper()
    {

        $point = self::LIKE_VALUE;
        foreach ($this->companyInterestList as $like) {

            if (in_array($like, $this->developer->skillSet)) {
                $point += self::LIKE_VALUE;
            }
        }

        return $point;
    }
}
