<h1>docker</h1>
<pre>
 - запуск контейнеров из PHP. 
 Восзможное использование в тестах
 </pre>
<pre>
$docker = Docker::getInstace();
$docker->factory([
    'postgres' => function(ContainerService $service) {
         $compose =  $service->buildComposer('./docker-compose.yml');
         return $compose->getContainerDb();
    }
]);


/** @var ContainerDb */
$postgres = $docker->get('postgres');
$pdo = $postgres->getPDO();

$postgres->status(): bool;
$postgres->start();
$postgres->stop();
$postgres->restart();


</pre>           
