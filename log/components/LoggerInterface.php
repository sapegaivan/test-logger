<?php

namespace log\components;

interface LoggerInterface
{
    public function send(string $message): void;

    public function sendByLogger(string $message, string $type): void;

    public function getType(): string;

    public function setType(string $type): void;

    public function setTargets(array $targets): void;

    public function getTarget(string $type): array;

    public function getTargetTypesList(): array;
}