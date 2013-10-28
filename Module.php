<?php
namespace BillyctContactus;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array('factories' => array(
            'BillyctContactus\Mongo'           => function ($services) {
                $config = $services->get('config');
                $config = $config['billyct-contact-us']['mongo'];
                return new \Mongo($config['server']);
            },
            'BillyctContactus\MongoDB'           => function ($services) {
                $config = $services->get('config');
                $config = $config['billyct-contact-us']['mongo'];
                return new \MongoDB($services->get('BillyctContactus\Mongo'), $config['db']);
            },
            'BillyctContactus\MongoColletion'           => function ($services) {
                $config = $services->get('config');
                $config = $config['billyct-contact-us']['mongo'];
                return new \MongoCollection($services->get('BillyctContactus\MongoDB'), $config['collection']);
            },
            // and so on //
        ));
    }
}
