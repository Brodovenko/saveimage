<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 10.03.2019
 * Time: 01:17
 */


class DownloadImageTest extends PHPUnit_Framework_TestCase
{

    public function testRun()
    {
//        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/2014-09-12_-_Vitali_Klitschko_-_9019.jpg/270px-2014-09-12_-_Vitali_Klitschko_-_9019.jpg';
//        $app = new ImageDownloader($imageUrl);
//        $this->assertTrue($app->run());
        $this->assertObjectHasAttribute('getRaw', new stdClass);
    }
}
