<?php

namespace CodexSoft\OperationsSystem\Exception;

use CodexSoft\OperationsSystem\Operation;

final class OperationException extends \Exception
{

    /**
     * @var string
     * Класс операции, в которой произошло исключение
     */
    protected $operationClass;

    /**
     * @var string
     * UUID операции, в которой произошло исключение
     */
    protected $operationId;

    /**
     * @var Operation
     * Экземпляр операции, в которой произошло исключение
     */
    protected $operationInstance;

    /**
     * @var array
     * Дополнительные данные, которые могут быть полезны для обработки исключения
     */
    protected $extraData = [];

    /**
     * @var string
     * @deprecated will be removed
     */
    protected $messagePrefix;

    /**
     * OperationException constructor.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     * @param array $extraData
     */
    public function __construct(string $message = '', int $code = 0, \Throwable $previous = null, array $extraData = [])
    {
        $this->extraData = $extraData;
        parent::__construct($message,$code,$previous);
    }

    /**
     * @param string $operationClass
     *
     * @return static
     */
    public function setOperationClass(string $operationClass): self
    {
        $this->operationClass = $operationClass;
        return $this;
    }

    /**
     * @param int $operationCode
     *
     * @return static
     * @deprecated use setOperationId() instead
     */
    public function setOperationCode(int $operationCode): self
    {
        return $this->setOperationId($operationCode);
    }

    /**
     * @param Operation $operationInstance
     *
     * @return static
     */
    public function setOperationInstance(Operation $operationInstance): self
    {
        $this->operationInstance = $operationInstance;
        return $this;
    }

    /**
     * @return Operation
     * todo: strict return Operation
     */
    public function getOperationInstance(): ?Operation
    {
        return $this->operationInstance;
    }

    /**
     * @param array $extraData
     *
     * @return static
     */
    public function setExtraData(array $extraData): self
    {
        $this->extraData = $extraData;
        return $this;
    }

    /**
     * @param string $operationId
     *
     * @return OperationException
     */
    public function setOperationId(string $operationId): OperationException
    {
        $this->operationId = $operationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperationId(): string
    {
        return $this->operationId;
    }

    /**
     * @return string
     * @deprecated use getCode() instead
     */
    public function getErrorCode(): string
    {
        return $this->getCode();
    }

    /**
     * @param string $errorCode
     *
     * @return static
     * @deprecated use setCode() instead
     */
    public function setErrorCode(string $errorCode): self
    {
        throw new \RuntimeException('setErrorCode is deprecated. use constructor $code argument instead');
    }

    /**
     * @param string $messagePrefix
     *
     * @return static
     * @deprecated will be removed
     */
    public function setMessagePrefix(string $messagePrefix): self
    {
        $this->messagePrefix = $messagePrefix;
        return $this;
    }

}