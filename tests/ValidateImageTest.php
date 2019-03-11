<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 10.03.2019
 * Time: 01:18
 */


class ValidateImageTest extends PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/2014-09-12_-_Vitali_Klitschko_-_9019.jpg/270px-2014-09-12_-_Vitali_Klitschko_-_9019.jpg';
        $newImage = new ImageDownloader($imageUrl);
        $params = [
            'width' => 1000,
            'height' => 900,
            'type' => ['image/gif', 'image/jpeg', 'image/png']
        ];
        $app = new ImageValidator($params, $newImage->run());
        $this->assertEmpty($app->run());
    }
}
