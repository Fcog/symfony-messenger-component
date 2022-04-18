<?php

namespace App\MessageHandler\Command;

use App\Message\Command\LogEmoji;
use Psr\Log\LoggerInterface;

class LogEmojiHandler
{
    private static $emojis = [
        '🚀',
        '💩',
        '👻',
        '👾',
    ];

    private $logger;

    public function __construct(LoggerInterface $logger)
    {

        $this->logger = $logger;
    }


    public function __invoke(LogEmoji $logEmoji)
    {
        $index = $logEmoji->getEmojiIndex();

        $emoji = self::$emojis[$index] ?? self::$emojis[0];

        $this->logger->info('Important message!' . $emoji);
    }
}