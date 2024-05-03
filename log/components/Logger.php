<?php

namespace log\components;

use log\channels\ChannelHelper;
use yii\base\Component;
use yii\base\Exception;

class Logger extends Component implements LoggerInterface
{
    private string $type;
    private array $targets = [];

    /**
     * @param string $message
     * @return void
     * @throws Exception
     */
    public function send(string $message): void
    {
        ChannelHelper::getChannel($this, $this->type)->write($message);
    }

    /**
     * @param string $message
     * @param string $type
     * @return void
     * @throws Exception
     */
    public function sendByLogger(string $message, string $type): void
    {
        ChannelHelper::getChannel($this, $type)->write($message);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param array $targets
     * @return void
     */
    public function setTargets(array $targets): void
    {
        $this->targets = $targets;
    }

    /**
     * @param string $type
     * @return array
     * @throws Exception
     */
    public function getTarget(string $type): array
    {
        $target = $this->targets[$type] ?? [];
        if (!is_array($target)) {
            throw new Exception("Target for type: $type must be an array.");
        }
        return $target;
    }

    /**
     * @return array
     */
    public function getTargetTypesList(): array
    {
        return array_keys($this->targets);
    }
}