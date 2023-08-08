<?php

declare(strict_types=1);
/**
 * This file is part of diaojinlong/captcha.
 *
 * @link     https://github.com/diaojinlong/captcha
 * @contact  diao_jin_long@163.com
 * @license  https://github.com/diaojinlong/captcha/blob/master/LICENSE
 */
namespace Diaojinlong\Captcha;
use \Diaojinlong\Captcha\Command\GenKeyCommand;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
                GenKeyCommand::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for diaojinlong/captcha.',
                    'source' => __DIR__ . '/../publish/captcha.php',
                    'destination' => BASE_PATH . '/config/autoload/captcha.php',
                ],
                [
                    'id' => 'fonts',
                    'description' => 'The fonts for diaojinlong/captcha.',
                    'source' => __DIR__ . '/../publish/fonts',
                    'destination' => BASE_PATH . '/storage/fonts',
                ],
            ],
        ];
    }
}
