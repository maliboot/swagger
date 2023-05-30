<?php

declare(strict_types=1);

namespace MaliBoot\Swagger;

use Doctrine\Common\Annotations\AnnotationReader;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Di\ReflectionManager;

class ApiAnnotation
{
    public static function methodMetadata($className, $methodName)
    {
        $reflectMethod = ReflectionManager::reflectMethod($className, $methodName);
        $reader = new AnnotationReader();

        return $reader->getMethodAnnotations($reflectMethod);
    }

    public static function classMetadata($className)
    {
        return AnnotationCollector::list()[$className]['_c'] ?? [];
    }

    public static function propertyMetadata($className)
    {
        return AnnotationCollector::list()[$className]['_p'] ?? [];
    }
}
