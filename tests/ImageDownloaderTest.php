<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 10.03.2019
 * Time: 02:04
 */


class ImageDownloaderTest extends \PHPUnit_Framework_TestCase
{

    public function testDownload()
    {
        $this->assertObjectHasAttribute('getRaw', new stdClass);

    }
}
