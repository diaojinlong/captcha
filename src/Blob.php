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

use finfo;

class Blob
{
    /**
     * @var string
     */
    private $raw;

    /**
     * @var string
     */
    private $mimetype;

    public function __construct(string $raw)
    {
        $this->raw = $raw;
        $this->mimetype = (new finfo(FILEINFO_MIME_TYPE))->buffer($raw);
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getMimetype(): string
    {
        return $this->mimetype;
    }

    public function toString(): string
    {
        return $this->raw;
    }

    public function toDataUrl(): string
    {
        return 'data:' . $this->mimetype . ';base64,' . base64_encode($this->raw);
    }
}