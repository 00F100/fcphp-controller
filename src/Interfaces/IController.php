<?php

namespace FcPhp\Controller\Interfaces
{
    use FcPhp\Service\Interfaces\IService;

    interface IController
    {
        /**
         * Method to configure service
         *
         * @param string $service Name of service
         * @param FcPhp\Service\Interfaces\IService $instance Instance of service
         * @return void
         */
        public function setService(string $service, IService $instance) :void;

        /**
         * Method to return service
         *
         * @param string $service Name of service
         * @throws FcPhp\Controller\Exceptions\ServiceNotFoundException
         * @return FcPhp\Service\Interfaces\IService
         */
        public function getService(string $service) :IService;

        /**
         * Method to verify service exists
         *
         * @param string $service Name of service
         * @return bool
         */
        public function hasService(string $service) :bool;
        
        /**
         * Method to configure callback
         *
         * @param string $name Name of callback
         * @param object $callback Callback to execute
         * @return void
         */
        public function callback(string $name, object $callback) :void;
    }
}
