<?php

class PTCWebDepartmentEmployment
{
    const LIKE_VALUE = 10;
    const RESUME_URL = 'http://www.ptc.co.ir/software-2/';

    /**
     * this is an instance of WebGuyInterface
     * @var WebGuyInterface|null
     */
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
        'Agile Software Development (scrum is preferred)',
        'Source Control (git is preferred)',
        'Full stack developer (js, html, css)',
        'front-end js frameworks',
        'Yii Framework experience or any modern MVC frameworks',
        'Solid Principles',
        'Test Driven Development',
        'NodeJs Experience (Hapi Framework is a plus)',
        'Restful Api experience (know the difference between post, put and patch!)',
        'UX/UI expert',
        'linux server administration skills',
    ];

    function __construct($person)
    {
        if (!$person instanceof WebGuyInterface) {
            throw new Exception('Sorry! this Job is for web developers or Linux server admins.', 410);
        }

        // determine if the person meets minimum required skill set
        foreach ($this->requirements as $item) {

            if (!in_array($item, $person->skillSet)) {
                throw new Exception('Minimum requirement does not match!', 410);
            }
        }

        $this->developer = $person;
    }

    public function howMuchWeLikeDeveloper()
    {
        // before starting to check, we still like developer, but we can like more!
        $point = self::LIKE_VALUE;
        foreach ($this->companyInterestList as $like) {

            if (in_array($like, $this->developer->skillSet)) {
                $point += self::LIKE_VALUE;
            }
        }

        // now we know for sure how much we like
        return $point;
    }

    public function submitResume()
    {
        // WebGuyInterface has a method for submitting his/hers resume!
        $this->developer->submitResume(self::RESUME_URL);
    }
}
