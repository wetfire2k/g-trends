<?php

namespace GoogleTest;

use Google\GTrends;
use PHPUnit\Framework\TestCase;

class GTrendsTest extends TestCase
{
    /* @var $gt GTrends */
    public $gt;

    public function setUp()
    {
        $this->gt = new GTrends();
    }

    public function testThatWeCanGetTheOptions()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $options = [
            'hl' => 'en-US',
            'tz' => 360,
            'geo' => 'US',
        ];
        $gt->setOptions($options);

        $assertOptions = [
            'hl' => 'en-US',
            'tz' => 360,
            'geo' => 'US',
        ];
        $this->assertEquals($options, $assertOptions);
    }

    public function testIfOptionsHasValidNumberOfKeys()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $this->expectExceptionMessage('Invalid number of options provided');

        $options = [
            0 => 'US',
            'hll' => 'en-US',
            'tz' => 360,
            'geo' => 'US',
        ];
        $gt->setOptions($options);
    }

    public function testIfOptionsHasValidKeys()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $this->expectExceptionMessage('Invalid keys provided');

        $options = [
            'hll' => 'en-US',
            'tz' => 360,
            'geo' => 'US',
        ];
        $gt->setOptions($options);
    }

    public function testIfOptionsHasValidValues()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $this->expectExceptionMessage('Invalid type values provided');

        $options = [
            'hl' => 'en-US',
            'tz' => 'sd',
            'geo' => 6546,
        ];
        $gt->setOptions($options);
    }

    public function testIfRelatedQueriesReturnsArray()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $relatedQueries = $gt->relatedQueries(['Barcelona']);

        $this->assertEquals(is_array($relatedQueries), true);
    }

    public function testIfInterestOverTimeReturnsArray()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $interestOverTime = $gt->interestOverTime('Barcelona');

        $this->assertEquals(is_array($interestOverTime), true);
    }

    public function testIfTrendingSearchesReturnsArray()
    {
        /* @var $gt GTrends */
        $gt = $this->gt;

        $trendingSearches = $gt->trendingSearches('p54', date('Ymd'));

        $this->assertEquals(is_array($trendingSearches), true);
    }
}