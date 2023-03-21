<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 9/24/20
 * Time: 7:44 PM
 */
namespace PHPZlc\PHPZlc\Bundle\Safety;

use Doctrine\Persistence\ObjectManager;
use Psr\Container\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ActionLoad implements EventSubscriberInterface
{
    /**
     * @var ContainerInterface
     */
    public static $globalContainer;

    /**
     * @var ObjectManager
     */
    public static $globalDoctrine;

    /**
     * @var ParameterBagInterface
     */
    public static $parameterBag;

    public function __construct(ContainerInterface $container,  ParameterBagInterface $parameterBag)
    {
        self::$globalContainer = $container;
        self::$globalDoctrine = $container->get('doctrine');
        self::$parameterBag = $parameterBag;
    }

    public function onKernelController(ControllerEvent $event)
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}