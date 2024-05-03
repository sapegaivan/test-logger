<?php

namespace log\channels;

interface ChannelInterface
{
    public function __construct(string $type);

    public function write(string $message): void;

    public function getType(): string;
}