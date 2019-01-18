<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\Request;

use Sylius\ShopApiPlugin\Command\SendVerificationToken;
use Symfony\Component\HttpFoundation\Request;

class ResendVerificationTokenRequest implements CommandRequestInterface
{
    /** @var string */
    protected $email;

    /** @var string */
    protected $channelCode;

    public function populateData(Request $request): void
    {
        $this->email = $request->request->get('email');
        $this->channelCode = $request->attributes->get('channelCode');
    }

    public function getCommand(): object
    {
        return new SendVerificationToken($this->email, $this->channelCode);
    }
}
