<?php
namespace App;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class ImageOptimizer
{
    private const MAX_WIDTH = 200;
    private const MAX_HEIGHT = 150;

    private $imagine;



    public function __construct()
    {
        $this->imagine = new Imagine();
    }
//$filename = '/uploads/articles/'.$newFilename;
//$percent = 0.5;
//header('Content-Type: image/jpg');
//list($width, $height) = getimagesize(AbstractController::getParameter('kernel.project_dir').'\public\uploads\articles'.'\bunny-62ab28059b75c.jpg');
//$newwidth = $width * $percent;
//$newheight = $height * $percent;
//$thumb = imagecreatetruecolor($newwidth, $newheight);
//$source = imagecreatefromjpeg();
//imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//imagejpeg($thumb,'new.jpeg')->move($destination,'new.jpeg');

    public function resize(string $filename): void
    {
        list($iwidth, $iheight) = getimagesize($filename);
        $ratio = $iwidth / $iheight;
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;
        if ($width / $height > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        $photo = $this->imagine->open($filename);
        $photo->resize(new Box($width, $height))->save($filename);
    }
}