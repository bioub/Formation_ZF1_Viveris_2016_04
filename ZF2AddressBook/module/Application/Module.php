<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Stdlib\ArrayUtils;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        $configContent = scandir(__DIR__ . '/config/');
        $configFiles = array_filter($configContent, function($filename) {
           return preg_match("/\\.config\\.php$/", $filename);
        });
        $config = array();
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include __DIR__ . '/config/' . $configFile);
        }
        return $config;
    }
}
