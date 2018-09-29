<?php
namespace Controller;

use Hanson\Vbot\Message\Emoticon;
use Hanson\Vbot\Message\File;
use Hanson\Vbot\Message\Image;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Video;
use Hanson\Vbot\Message\Voice;

class BeanCollector
{
    /**
     * 文本消息
     * @param $user
     * @param $msg
     */
    public function SendText($user , $msg)
    {
        Text::send($user, $msg);
    }

    /**
     * 语音消息
     * @param $user
     * @param $voice
     */
    public function SendVoice($user , $voice)
    {
        Voice::send($user, $voice);
    }

    /**
     * 图片消息
     * @param $user
     * @param $image
     */
    public function SendImage($user , $image)
    {
        Image::send($user, $image);
    }

    /**
     * 视频消息
     * @param $user
     * @param $video
     */
    public function SendVideo($user , $video)
    {
        Video::send($user, $video);
    }

    /**
     * 表情消息
     * @param $user
     * @param $emo
     */
    public function SendEmoticon($user , $emo)
    {
        Emoticon::send($user, $emo);
    }

    /**
     * 文件消息
     * @param $user
     * @param $file
     */
    public function SendFile($user , $file)
    {
        File::send($user, $file);
    }

    /**
     * 位置消息
     * @param $user
     * @param $msg
     */
    public function SendLocation($user , $msg)
    {
        Text::send($user, $msg);
    }
}