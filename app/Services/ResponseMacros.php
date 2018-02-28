<?php
namespace App\Services;

use Illuminate\Routing\ResponseFactory;

class ResponseMacros
{
    /**
     * response macros
     * @var array
     */
    protected $macros = [
        'success',
        'error',
        'errorBadRequest',
        'errorUnauthorized',
        'errorForbidden',
        'errorNotFound',
        'errorInternal',
    ];

    /**
     * ResponseMacros construct
     *
     * ResponseMacros constructor.
     * @param ResponseFactory $factory
     */
    public function __construct(ResponseFactory $factory)
    {
        $this->factory = $factory;

        $this->bindMacros();
    }

    /**
     * bind macros
     */
    public function bindMacros()
    {
        foreach ($this->macros as $macro) {
            $this->$macro($this->factory);
        }
    }

    /**
     * success macro
     *
     * @param $factory
     */
    public function success($factory)
    {
        $factory->macro(__FUNCTION__, function ($data = null, $message = 'success', $status = 200) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ], $status);
        });
    }

    /**
     * error macro
     *
     * @param $factory
     */
    public function error($factory)
    {
        $factory->macro(__FUNCTION__, function ($status, $message = 'error', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }

    /**
     * errorBadRequest
     *
     * @param $factory
     */
    public function errorBadRequest($factory)
    {
        $factory->macro(__FUNCTION__, function ($status = 400, $message = 'Bad Request', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }

    /**
     * errorUnauthorized
     *
     * @param $factory
     */
    public function errorUnauthorized($factory)
    {
        $factory->macro(__FUNCTION__, function ($status = 401, $message = 'Unauthorized', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }

    /**
     * errorForbidden
     *
     * @param $factory
     */
    public function errorForbidden($factory)
    {
        $factory->macro(__FUNCTION__, function ($status = 403, $message = 'Forbidden', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }

    /**
     * errorNotFound
     *
     * @param $factory
     */
    public function errorNotFound($factory)
    {
        $factory->macro(__FUNCTION__, function ($status = 404, $message = 'Not Found', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }

    /**
     * errorInternal
     *
     * @param $factory
     */
    public function errorInternal($factory)
    {
        $factory->macro(__FUNCTION__, function ($status = 500, $message = 'Internal Error', $data = null) use ($factory) {
            return $factory->make([
                'status'  => $status,
                'message' => $message,
                'data'    => $data,
            ]);
        });
    }
}