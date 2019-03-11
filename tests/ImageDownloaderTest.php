<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 10.03.2019
 * Time: 02:04
 */
use PHPUnit\Framework\TestCase;

class ImageDownloaderTest extends TestCase
{

    public function testDownload()
    {
        $this->assertObjectHasAttribute('raw', new stdClass());

    }
}
