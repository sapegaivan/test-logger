<?php

namespace log\channels;

use log\components\LoggerInterface;
use yii\base\Exception;

class ChannelHelper
{
    public static function getChannel(LoggerInterface $logger, string $type): ChannelInterface
    {
        $channel = $logger->getTarget($type);
        if (empty($channel)) {
            throw new Exception("Undefined channel type: $type");
        }
        if (empty($channel['class'])) {
            throw new Exception("Class not set for channel type: $type");
        }

        $class = new $channel['class']($type);
        if (!($class instanceof ChannelInterface)) {
            throw new Exception("Channel class for type: $type not implement ChannelInterface.");
        }

        unset($channel['class']);
        \Yii::configure($class, $channel);

        return $class;
    }
}