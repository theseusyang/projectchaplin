<?php
class Chaplin_Service_AVConv_API
{
    const THUMBNAIL_DEFAULT_TIME = 10;
    
    const CMD_CONVERT_FILE = 'avconv -i "%s" "%s"';
    const CMD_GET_THUMBNAIL = 'avconv -i "%s" -f image2 -vframes 1 -ss %s "%s"'; 
    
    private $_ffmpeg;
    
    public function __construct()
    {
    }
    
    public function convertFile($strFile, $strOut, $ret)
    {
        //TODO: stream status
        $strCommand = sprintf(
            self::CMD_CONVERT_FILE,
            $strFile,
            $strOut
        );
        return system($strCommand, $ret);
    }
    
    public function getThumbnail($strFile, $strOut, $ret)
    {
        $strCommand = sprintf(
            self::CMD_GET_THUMBNAIL,
            $strFile,
            self::THUMBNAIL_DEFAULT_TIME,
            $strOut
        );
        return system($strCommand, $ret);
    }
}
