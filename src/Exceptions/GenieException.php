<?php

namespace Lnk7\Genie\Exceptions;

use Exception;
use JsonSerializable;
use Lnk7\Genie\Traits\HasData;
use Throwable;

/**
 * Class GenieException
 *
 * @package Lnk7\Genie\Exceptions
 * @property $attributes
 * @property $backtrace
 */
class GenieException extends Exception implements JsonSerializable
{


    use HasData;

    function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        do_action('genie_exception', $this);
    }


    /**
     * Static constructor
     *
     * @param $message
     *
     * @return static
     */
    public static function withMessage($message)
    {
        return new static($message);
    }


    /**
     * Set the code for this Exception
     *
     * @param $code
     *
     * @return $this
     */
    public function withCode($code)
    {
        $this->code = $code;
        return $this;
    }


    /**
     * Add data to this exception
     *
     * @param $data
     *
     * @return $this
     */
    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }


    public function jsonSerialize()
    {
        return [
            'message' => $this->getMessage(),
            'code'    => $this->getCode(),
            'data'    => $this->getData(),
        ];
    }
}