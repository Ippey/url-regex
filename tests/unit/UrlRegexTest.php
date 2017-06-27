<?php


/**
 * Class UrlRegexTest
 */
class UrlRegexTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /** @var array */
    public $validStrs = [
        'http://www.google.co.jp' => [
            'http://www.google.co.jp'
        ],
        'https://www.google.co.jp/' => [
            'https://www.google.co.jp/'
        ],
        'ftp://www.google.co.jp' => [
            'ftp://www.google.co.jp'
        ],
        'it is url, https://www.google.com/?q=hoge' => [
            'https://www.google.com/?q=hoge'
        ],
        'URL : http://www.yahoo.co.jp?hoge=123 it is url. it is too url, https://www.google.co.jp/' => [
            'http://www.yahoo.co.jp?hoge=123',
            'https://www.google.co.jp/',
        ],
        '<a href="http://www.yahoo.co.jp?hoge=123&foo=456">it is link.</a>' => [
            'http://www.yahoo.co.jp?hoge=123&foo=456'
        ],
    ];

    /** @var array */
    public $invalidStrs = [
        'hoge',
        'https:///www.yahoo.co.jp/',
        'ftp:www.google.co.jp',
        'it is not url http://',
    ];

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    /**
     * test isMatch()
     */
    public function testIsMatch()
    {
        foreach ($this->validStrs as $str => $urls) {
            $this->assertTrue(Ippey\UrlRegex::isMatch($str));
        }
        foreach ($this->invalidStrs as $str) {
            $this->assertFalse(Ippey\UrlRegex::isMatch($str));
        }
    }

    /**
     * test match()
     */
    public function testMatch()
    {
        foreach ($this->validStrs as $str => $urls) {
            $result = Ippey\UrlRegex::match($str);
            $this->assertEquals(count($urls), count($result));
            foreach ($urls as $url) {
                $this->assertContains($url, $result);
            }
        }
        foreach ($this->invalidStrs as $str) {
            $result = Ippey\UrlRegex::match($str);
            $this->assertEquals(0, count($result));
        }
    }
}