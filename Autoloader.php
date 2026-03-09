<?php 
declare(strict_types=1);

echo "--- [TESTE AUTOLOADER PHP]: VALIDAÇÃO DE NAMESPACES E CARREGAMENTO AUTOMÁTICO. ---\n ";


spl_autoload_register(function ($class) {
    $prefix = "App\\";
    $baseDir = "src/";

    if (strpos($class, $prefix) !==0) {
        return;
    }


     $relativeClass = substr($class, strlen($prefix));
     $directoryPath = str_replace('\\', '/', $relativeClass);
     
     $filePath = $baseDir . $directoryPath . '.php';


     if (file_exists($filePath)) {
        require $filePath;
     }
});

  interface DataProvider {
    public function fetch(): string;
  }

  interface CacheInterface {
    public function set(string $key, $value): void;
  }


  class Logger {
    private static ?Logger $instance = null;
    private function __construct() {}
    public static function getInstance(): Logger {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
  }

  class Database {
    private array $config;
    public function __construct(array $config) {
        $this->config = $config;
        echo "[AUTOLOADER]: CONEXÃO ESTABELECIDA COM SUCESSO!\n";
    }
  }

  abstract class AutoloaderPHP {
    protected array $config;
    public function __construct(array $config) {
        $this->config = $config;
    }
    abstract public function connect(): void;
  }

  class MySQL extends AutoloaderPHP {
    public function connect(): void {
        echo "Conectando ao banco de dados MySQL..." . $this->config['host'] . "\n";
    }
  }

  class RawDatabase implements DataProvider {
    public function fetch(): string {
        return "Busca completa dos dados brutos do banco de dados!";
    }
  }    

  class CachedProvider implements DataProvider {
    private DataProvider $source;
    public function __construct(DataProvider $source) {
        $this->source = $source;
    }
    public function fetch(): string {
        echo "[BANCO DE DADOS]: Buscando dados do banco de dados...\n";
        return $this->source->fetch();
    }
  }
  

   class Container {
    private array $services = [];
    public function set(string $name, callable $resolver): void {
        $this->services[$name] = $resolver;
    }
    public function get(string $name) {
        if (!isset($this->services[$name])) {
            throw new Exception("Serviço [$name] não foi encontrado.");
        }
        return $this->services[$name]($this);
        }
    }

    try {
        $app = new Container();

        $app->set('config', fn() => [
            'host' => 'localhost',
            'user' => 'user_admin'
        ]);

        $app->set('db', function($sc) {
            return new Database($sc->get('config'));
        });


        $db = $app->get('db');

        $service = new CachedProvider(new RawDatabase());
        echo $service->fetch() . "\n";
    } catch (Exception $e) {
        echo "Erro no motor: " . $e->getMessage();
    }
   
































































