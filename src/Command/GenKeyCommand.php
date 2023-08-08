<?php

declare(strict_types=1);
/**
 * This file is part of diaojinlong/captcha.
 *
 * @link     https://github.com/diaojinlong/captcha
 * @contact  diao_jin_long@163.com
 * @license  https://github.com/diaojinlong/captcha/blob/master/LICENSE
 */
namespace Diaojinlong\Captcha\Command;

use Diaojinlong\Captcha\Crypt;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Contract\ConfigInterface;

class GenKeyCommand extends HyperfCommand
{
    /**
     * The repository instance.
     *
     * @var \Hyperf\Contract\ConfigInterface
     */
    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        parent::__construct('gen:key');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Create a secret key or key-pair for diaojinlong/captcha');
    }

    /**
     * Handle the current command.
     */
    public function handle()
    {

        $key = $this->generateRandomKey();

        $this->line('<comment>' . $key . '</comment>');
    }

    /**
     * Generate a random key for the application.
     *
     * @return string
     */
    protected function generateRandomKey()
    {
        $options = $this->config->get("captcha.encryption_options");
        return Crypt::generateKey($options);
    }
}