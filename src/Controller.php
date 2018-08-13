<?php

namespace FcPhp\Controller
{
    use FcPhp\Controller\Interfaces\IController;
    use FcPhp\Controller\Exceptions\ServiceNotFoundException;

    abstract class Controller implements IController
    {
        /**
         * @var array $services List of services
         */
        private $services = [];

        /**
         * Method to configure service
         *
         * @param string $service Name of service
         * @param mixed $instance Instance of service
         * @return void
         */
        public function setService(string $service, $instance) :void
        {
            $this->services[$service] = $instance;
        }

        /**
         * Method to return service
         *
         * @param string $service Name of service
         * @throws FcPhp\Controller\Exceptions\ServiceNotFoundException
         * @return mixed
         */
        public function getService(string $service)
        {
            if($this->hasService($service)) {
                return $this->services[$service];
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
    }
}