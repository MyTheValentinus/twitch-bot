<?php

/**
 * Class Responder
 */
class Responder
{

    use \TwitchBot\Module {
        \TwitchBot\Module::__construct as private moduleConstructor;
    }

    /**
     * Responder constructor.
     * @param array $infos
     * @param \TwitchBot\IrcConnect $client
     */
    public function __construct(array $infos, $client)
    {
        $this->moduleConstructor($infos, $client);
    }

    public function onConnect()
    {
        if ($this->getInfo('connect_message')) {
            $this->getClient()->sendMessage('Responder Plugin activated !');
        }
    }

    /**
     * @param \TwitchBot\Message $message
     */
    public function onPing($message)
    {
        $this->getClient()->sendMessage('You ping me @' . $message->getUsername(true) . ' ?! What do you want ?');
    }
}
