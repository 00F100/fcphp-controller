<?php

namespace FcPhp\Controller
{
    use FcPhp\Service\Interfaces\IService;
    use FcPhp\Controller\Interfaces\IController;
    use FcPhp\Controller\Exceptions\ServiceNotFoundException;

    abstract class Controller implements IController
    {
        /**
         * @var array $services List of services
         */
        private $services = [];

        /**
         * @var object $serviceCallback Callback of service
         */
        private $callbackService;

        /**
         * Method to configure service
         *
         * @param string $service Name of service
         * @param FcPhp\Service\Interfaces\IService $instance Instance of service
         * @return void
         */
        public function setService(string $service, IService $instance) :void
        {
            $this->services[$service] = $instance;
        }

        /**
         * Method to return service
         *
         * @param string $service Name of service
         * @throws FcPhp\Controller\Exceptions\ServiceNotFoundException
         * @return FcPhp\Service\Interfaces\IService
         */
        public function getService(string $service) :IService
        {
            if($this->hasService($service)) {
                $serviceInstance = $this->services[$service];
                $this->callbackService($service, $serviceInstance);
                return $serviceInstance;
            }
            throw new ServiceNotFoundException();
        }

        /**
         * Method to verify service exists
         *
         * @param string $service Name of service
         * @return bool
         */
        public function hasService(string $service) :bool
        {
            return array_key_exists($service, $this->services);
        }

        /**
         * Method to configure callback
         *
         * @param string $name Name of callback
         * @param object $callback Callback to execute
         * @return void
         */
        public function callback(string $name, object $callback) :void
        {
            if(property_exists($this, $name)) {
                $this->{$name} = $callback;
            }
        }

        /**
         * Method to configure callback
         *
         * @param string $service Name of service
         * @param mixed $instance Instance of Service
         * @return void
         */
        private function callbackService(string $service, IService $instance) :void
        {
            $callbackService = $this->callbackService;
            if(is_object($callbackService)) {
                $callbackService($service, $instance);
            }
        }
    }
}
