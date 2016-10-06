# docker

$docker = new Docker();

$containerService = $docker->getContainerService();

//проверка на существование контейнера
if (!$containerService->hasContainer('postgres')) {
      $container = $containerService->builder()
           ->setImage('postgres:9.4')
           ->build('Dockerfile')
           ->addValue(['/tmp/p1' => '/tmp/p1'])
           ->build();
} 

if (!$containerService->isRunning('postgres')) {
      $containerService->setName('postgres')
      $containerService->daemonStatus(true); 
      $containerService->run();
}

$pdo = $container->getContainerDb('postgres')->getPDO();
           
