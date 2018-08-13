<?php

namespace FcPhp\Controller\Interfaces
{
    interface IController
    {
        /**
         * Method to configure service
         *
         * @param string $service Name of service
         * @param mixed $instance Instance of service
         * @return void
         */
        public function setService(string $service, $instance) :void;

        /**
         * Method to return service
         *
         * @param string $service Name of service
         * @throws FcPhp\Controller\Exceptions\ServiceNotFoundException
         * @return mixed
         */
        public function getService(string $service);

        /**
         * Method to verify service exists
         *
         * @param string $service Name of service
         * @return bool
         */
        public function hasService(string $service) :bool;
    }
}