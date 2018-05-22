1.	O que é o Composer <br>
  1.1.	Composer é um gerenciador de dependências no qual evita o trabalho de baixar componentes para o processo do software.
  1.2.	Ele trabalha com autoload.
  1.3.	Exemplo
    1.3.1.	PHPMailer, não é mais necessário baixar toda a biblioteca. Com os comandos do Composer, esse processo já será feito sem muito esforço do programador.
    1.3.2.	Com somente uma chamada já pode baixar um framework como por exemplo, o Laravel.
2.	Download
  2.1.	https://getcomposer.org
    2.1.1.	Nesse link contém a explicação de como baixar para cada sistema operacional.
    2.1.2.	Para que o Composer funcione globalmente, tem um comando para rodar que fica em https://getcomposer.org/doc/00-intro.md#globally
3.	Exemplo de arquivo json
{
	"require": {
		"phpmailer/phpmailer": "^5.2"
	}
}
4.	Autoload
  4.1.	O Composer não necessita de require nas classes, no caso é só chamar o autoload do Composer: require 'vendor/autoload.php';
5.	Pacote de dependências
  5.1.	Para baixar todas as dependências, é só ir em https://packagist.org/
6.	Criar o próprio Composer
  6.1.	Para criar o próprio Composer use o comando composer init
7.	Composer update
  7.1.	Comando composer update atualiza todos os pacotes inseridos no arquivo composer.json
  7.2.	As dependências do pacote serão baixadas juntas.
8.	Composer Require
  8.1.	Com o comando composer require, irá dar a opção de buscar o pacote. Digitando o pacote irá aparecer as opções deste. Quando aparecer a opção de buscar, use o exemplo de swiftmailer ou ratchet.
9.	minimum-stability
  9.1.	O minimum-stability é um atributo definido dentro do composer.json como por exemplo:
{
	"minimum-stability": "stable",
}
Este atributo baixará o pacote com a última versão estável, depois que for dado o comando composer update
  9.2.	As opções são:
    9.2.1.	dev
    9.2.2.	alpha
    9.2.3.	beta
    9.2.4.	RC
    9.2.5.	Stable
    9.3.	Maiores detalhes em https://getcomposer.org/doc/04-schema.md#minimum-stability
10.	Versionamento de pacote - Caret Version Range (^)
  10.1.	O Caret Version Range, irá definir o limite de versão do pacote que será baixado.
  10.2.	Exemplo:
    10.2.1.	Irei definir no require do arquivo composer.json a versão 5.2.16 do phpmailer, sendo assim, quando for atualizado o Composer, irá baixar a versão 5.2.26 (a última da versão 5), pois tem que ser menor que a versão 6 (já disponibilizada). Exemplo abaixo:
{
require: {
“phpmailer/phpmailer”: “^5.2.16”
}
}
    10.2.2.	Caso tire o Caret Version Range (^), para que atualize a versão inserida no require, como de "phpmailer/phpmailer": "^5.2.16", para "phpmailer/phpmailer": "5.2.16", terá que ser dado o comando sudo composer update no Terminal. Nesse exemplo irá atualizar da versão 5.2.26 para 5.2.16.
11.	composer.lock
  11.1.	É um arquivo que mantém o histórico do que já foi feito no Composer.
12.	Psr 4 – Padronizar o autoload
  12.1.	Para padronizar o autoload, existe um site que exemplifica isso em https://www.php-fig.org/psr/psr-4/examples/
  12.2.	No link acima contém o código do autoload padrão para copiar.
  12.3.	No caso será trabalhado namespaces. Exemplo logo abaixo:
  12.4.	namespace app\models;
class Produto {
	public function create() {
		return 'create';
	}
}
$email = new app\models\Produto;
echo $email->create();
13.	Autoload do Composer
  13.1.	O autoload pode ser definido dentro do arquivo composer.json, no caso definirá o padrão psr-4, definindo o namespace com prefixo seguido da localização (pasta). Exemplo logo abaixo:
Composer.json
"autoload": {
    	"psr-4": {
    		"app\\": "app",
    		"asw\\": ["services", "jobs"]
    	}
    }

jobs/Register.php
namespace asw\jobs;
class Register {
	public function register()	{
		return 'register';
	}
}

Index.php
$register = new asw\jobs\Register;
echo $register->register();
13.2.	Feito isso, terá que ser executado o comando composer dump-autoload -o no Terminal. Esse –o ¬no final do comando, significa que irá otimizar o autoload.
13.3.	O autoload serve também para chamar arquivos. Logo abaixo o exemplo de como definir no arquivo composer.json.
“autoload”: {
"files": ["functions/helpers.php"]
}
14.	Arquivos gerados
  14.1.	Os arquivos gerados do Composer estão dentro de vendor/composer.
